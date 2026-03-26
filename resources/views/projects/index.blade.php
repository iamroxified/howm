@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
    <h1>Projects</h1>
    <a href="{{ route('projects.export') }}" class="btn btn-primary mb-3">Export Projects</a>

    <h2>Assigned Projects</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <th>Student</th>
                <th>Topic</th>
                <th>Status</th>
                <th>Balance</th>
                <th>Supervisor Balance</th>
                <th>Developer Balance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $totalProjects = 0;
            $totalPending = 0;
            $totalInProgress = 0;
            $totalCompleted = 0;
            @endphp
            @forelse ($projects as $project)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $project->student->fullname }}</td>
                    <td>{{ $project->topic->topic }}</td>
                    <td>{{ $project->project_status }}</td>
                    <td>{{ $project->balance }}</td>
                    <td>{{ ($project->supervisor_fee ?? 0) - ($project->amt_paid_to_supervisor ?? 0) }}</td>
                    <td>{{ ($project->developer_fee ?? 0) - ($project->amt_paid_to_developer ?? 0) }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">De-assign</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No projects assigned yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <hr>

    <h2>Available Topics</h2>
    <a href="{{ route('topics.create') }}" class="btn btn-primary mb-3">Add Topic</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Topic</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($availableTopics as $topic)
                <tr>
                    <td>{{ $topic->topic }}</td>
                    <td>
                        <a href="{{ route('projects.create', ['topic_id' => $topic->id]) }}" class="btn btn-primary btn-sm">Assign</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No more topics available for assignment.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
