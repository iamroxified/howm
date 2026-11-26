@extends('admin.layout.app')

@section('title', 'Manage DCG')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header d-flex justify-content-between align-items-center">
                <h3 class="fw-bold mb-3">Daily Communion with God</h3>
                <a href="{{ route('admin.dcg.create') }}" class="btn btn-primary">Add DCG entry</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($entries as $entry)
                                    <tr>
                                        <td>{{ $entry->date->format('F j, Y') }}</td>
                                        <td>{{ $entry->title }}</td>
                                        <td>{{ ucfirst($entry->type) }}</td>
                                        <td class="text-nowrap">
                                            <a href="{{ route('admin.dcg.edit', $entry) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('admin.dcg.destroy', $entry) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No DCG entries yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $entries->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
