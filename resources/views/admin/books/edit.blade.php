@extends('admin.layout.app')

@section('title', 'Edit Book')

@section('content')
    <div class="container-fluid">
        <div class="page-inner">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Edit Book</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="bk_title" class="form-label">Book Title</label>
                                    <input type="text" class="form-control" id="bk_title" name="bk_title" value="{{ $book->bk_title }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="bk_desc" class="form-label">Description</label>
                                    <textarea class="form-control" id="bk_desc" name="bk_desc" rows="5">{{ $book->bk_desc }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="bk_amount" class="form-label">Amount</label>
                                    <input type="number" step="0.01" class="form-control" id="bk_amount" name="bk_amount" value="{{ $book->bk_amount }}" placeholder="0.00">
                                </div>
                                <div class="mb-3">
                                    <label for="bk_link" class="form-label">Book File</label>
                                    <input type="file" class="form-control" id="bk_link" name="bk_link">
                                    @if($book->bk_link)
                                        <p class="mt-2">Current file: <a href="{{ asset('books/files/' . $book->bk_link) }}" target="_blank">{{ $book->bk_link }}</a></p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="bk_img" class="form-label">Book Image</label>
                                    <input class="form-control" type="file" id="bk_img" name="bk_img">
                                    @if($book->bk_img)
                                        <img src="{{ asset('books/' . $book->bk_img) }}" alt="{{ $book->bk_title }}" class="img-thumbnail mt-2" width="150">
                                    @endif
                                </div>
                                 <div class="mb-3">
                                    <label for="bk_stat" class="form-label">Status</label>
                                    <select class="form-select" name="bk_stat" id="bk_stat">
                                        <option value="1" {{ $book->bk_stat ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$book->bk_stat ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update Book</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection