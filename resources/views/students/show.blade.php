@extends('layouts.admin')

@section('title', 'View Student')

@section('content')
    <h1>{{ $student->name }}</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Student Details</h5>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>Major:</strong> {{ $student->major }}</p>
        </div>
    </div>

    <h2 class="mt-4">Projects</h2>
    @if ($student->projects->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Topic</th>
                    <th>Status</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student->projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->topic->title }}</td>
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->payment_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>This student has no projects.</p>
    @endif

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back to Students</a>
@endsection
