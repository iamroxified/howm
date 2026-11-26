@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">All Books</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="/admin/index">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.books.index') }}">All Books</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">All Books</h4>
                        <a href="{{ route('admin.books.create') }}" class="btn btn-primary btn-sm float-end">Add New Book</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->bk_title }}</td>
                                            <td>{{ $book->bk_amount }}</td>
                                            <td>
                                                <a href="{{ route('admin.books.show', $book) }}" class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('admin.books.destroy', $book) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
