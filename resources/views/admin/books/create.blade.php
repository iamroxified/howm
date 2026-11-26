@extends('admin.layout.app')

@section('title', 'Add New Book')

@section('content')
 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Add Books</h3>
    <ul class="breadcrumbs mb-3">
     <li class="nav-home">
      <a href="{{ route('admin.index') }}">
       <i class="icon-home"></i>
      </a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('admin.books.index') }}">All Books</a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('admin.books.create') }}">Add Book</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">Add Book</div>
      </div>
      <div class="card-body">
       <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
         <label for="bk_title" class="form-label">Book Title</label>
         <input type="text" class="form-control" id="bk_title" name="bk_title" required>
        </div>
        <div class="mb-3">
         <label for="bk_desc" class="form-label">Description</label>
         <textarea class="form-control" id="bk_desc" name="bk_desc" rows="5"></textarea>
        </div>
        <div class="mb-3">
         <label for="bk_amount" class="form-label">Amount</label>
         <input type="number" step="0.01" class="form-control" id="bk_amount" name="bk_amount" placeholder="0.00">
        </div>
                                        <div class="mb-3">
                                            <label for="bk_link" class="form-label">Book File</label>
                                            <input type="file" class="form-control" id="bk_link" name="bk_link">
                                        </div>        <div class="mb-3">
         <label for="bk_img" class="form-label">Book Image</label>
         <input class="form-control" type="file" id="bk_img" name="bk_img">
        </div>
        <div class="mb-3">
         <label for="bk_stat" class="form-label">Status</label>
         <select class="form-select" name="bk_stat" id="bk_stat">
          <option value="1">Active</option>
          <option value="0">Inactive</option>
         </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
       </form>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
@endsection
