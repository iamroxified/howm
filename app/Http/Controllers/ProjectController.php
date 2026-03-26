<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Student;
use App\Models\Topic;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with(['student', 'topic'])->get();
        $allTopics = Topic::all();
        $assignedTopicIds = $projects->pluck('topic.id')->toArray();
        $availableTopics = $allTopics->whereNotIn('id', $assignedTopicIds);

        return view('projects.index', compact('projects', 'availableTopics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $students = Student::all();
        $assignedTopicIds = Project::pluck('topic_id')->whereNotNull()->toArray();
        $topics = Topic::whereNotIn('id', $assignedTopicIds)->get();
        $selectedTopic = $request->get('topic_id');
        return view('projects.create', compact('students', 'topics', 'selectedTopic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $data['developer_fee'] = ($data['project_cost'] ?? 0) - ($data['supervisor_fee'] ?? 0);
        $data['balance'] = ($data['project_cost'] ?? 0) - ($data['amount_paid'] ?? 0);
        Project::create($data);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $students = Student::all();
        // Get IDs of all assigned topics, EXCLUDING the current project's topic
        $assignedTopicIds = Project::where('id', '!=', $project->id)
            ->pluck('topic_id')
            ->whereNotNull()
            ->toArray();

        // Get all topics that are not in the list of other assigned topics
        $topics = Topic::whereNotIn('id', $assignedTopicIds)->get();

        return view('projects.edit', compact('project', 'students', 'topics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        
        $projectCost = $data['project_cost'] ?? $project->project_cost;
        $supervisorFee = $data['supervisor_fee'] ?? $project->supervisor_fee;
        $amountPaid = $data['amount_paid'] ?? $project->amount_paid;

        $data['developer_fee'] = $projectCost - $supervisorFee;
        $data['balance'] = $projectCost - $amountPaid;
        
        $project->update($data);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    public function export()
    {
        $projects = Project::with(['student', 'topic'])->get();
        $fileName = 'projects.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = ['SN', 'Student', 'Topic', 'Project Cost', 'Supervisor Fee', 'Developer Fee', 'Amount Paid', 'Balance', 'Amount Paid to Supervisor', 'Amount Paid to Developer'];

        $callback = function() use($projects, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($projects as $key => $project) {
                $row['SN']  = $key + 1;
                $row['Student']    = $project->student->fullname;
                $row['Topic']    = $project->topic->topic;
                $row['Project Cost']  = $project->project_cost;
                $row['Supervisor Fee'] = $project->supervisor_fee;
                $row['Developer Fee'] = $project->developer_fee;
                $row['Amount Paid'] = $project->amount_paid;
                $row['Balance'] = $project->balance;
                $row['Amount Paid to Supervisor'] = $project->amt_paid_to_supervisor;
                $row['Amount Paid to Developer'] = $project->amt_paid_to_developer;

                fputcsv($file, array(
                    $row['SN'],
                    $row['Student'],
                    $row['Topic'],
                    $row['Project Cost'],
                    $row['Supervisor Fee'],
                    $row['Developer Fee'],
                    $row['Amount Paid'],
                    $row['Balance'],
                    $row['Amount Paid to Supervisor'],
                    $row['Amount Paid to Developer']
                ));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
