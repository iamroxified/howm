@extends('layouts.admin')

@section('title', 'Topics')

@section('content')
    <h1>Topics</h1>

    <div class="card my-4">
        <div class="card-header">
            Search Topics
        </div>
        <div class="card-body">
            <form action="{{ route('topics.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by topic name..." value="{{ $searchTerm ?? '' }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>

    <a href="{{ route('topics.create') }}" class="btn btn-primary mb-3">Add Topic</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Topic</th>
                <th>Department</th>
                <th>Level</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($topics as $topic)
                <tr>
                    <td>{{ $topic->id }}</td>
                    <td>{{ $topic->topic }}</td>
                    <td>{{ $topic->department }}</td>
                    <td>{{ $topic->level }}</td>
                    <td>
                        @if($topic->projects->isNotEmpty())
                            <span class="badge bg-warning text-dark">Assigned</span>
                        @else
                            <span class="badge bg-success">Available</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('topics.edit', $topic) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('topics.destroy', $topic) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this topic?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No topics found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $topics->appends(['search' => $searchTerm])->links() }}
    </div>

@endsection
