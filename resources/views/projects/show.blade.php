@extends('layouts.admin')

@section('title', 'Project Details')

@section('content')
    <h1>Project Details</h1>

    <div class="card">
        <div class="card-header">
            Project #{{ $project->id }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Student:</strong> {{ $project->student->fullname }}</p>
                    <p><strong>Matric No:</strong> {{ $project->student->matric_no }}</p>
                    <p><strong>Topic:</strong> {{ $project->topic->topic }}</p>
                    <p><strong>Status:</strong> <span class="badge bg-primary">{{ $project->project_status }}</span></p>
                </div>
            </div>

            <hr>

            <h4>Financial Summary</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">Overall Project</div>
                        <div class="card-body">
                            <p><strong>Total Project Fee:</strong> ${{ number_format($project->project_cost, 2) }}</p>
                            <p><strong>Amount Paid:</strong> ${{ number_format($project->amount_paid, 2) }}</p>
                            <p><strong>Balance:</strong> ${{ number_format($project->balance, 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">Supervisor</div>
                        <div class="card-body">
                            <p><strong>Fee:</strong> ${{ number_format($project->supervisor_fee, 2) }}</p>
                            <p><strong>Amount Paid:</strong> ${{ number_format($project->amt_paid_to_supervisor, 2) }}</p>
                            <p><strong>Balance:</strong> ${{ number_format($project->supervisor_fee - $project->amt_paid_to_supervisor, 2) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header">Developer</div>
                        <div class="card-body">
                            <p><strong>Fee:</strong> ${{ number_format($project->developer_fee, 2) }}</p>
                            <p><strong>Amount Paid:</strong> ${{ number_format($project->amt_paid_to_developer, 2) }}</p>
                            <p><strong>Balance:</strong> ${{ number_format($project->developer_fee - $project->amt_paid_to_developer, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit Project</a>
        </div>
    </div>
@endsection
