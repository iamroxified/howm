@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')


 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Add Image</h3>
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
      <a href="{{ route('admin.gallery.index') }}">All Images</a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('admin.gallery.create') }}">Add Image</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">Add Image</div>
      </div>
      <div class="card-body">
       <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
        @csrf


        <div class="row">
         <div class="form-group col-md-6 col-lg-4">
          <label for="galName">Image Title</label>
          <input type="text" class="form-control" id="galName" name="gal_name"
           placeholder="Enter Image Title" required />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="galImg">Images <small>(Select multiple)</small></label>
          <input type="file" class="form-control" id="galImg" name="gal_img[]" placeholder="" accept="image/*" multiple required />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="galDate">Date</label>
          <input type="date" class="form-control" id="galDate" name="gal_date" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="galCat">Image Category</label>
          <select class="form-control" id="galCat" name="gal_cat" required>
            <option value="" disabled selected>Select Category</option>
            <option value="General">General</option>
            @foreach($ministries as $ministry)
            <option value="{{ $ministry->min_cat }}">{{ $ministry->min_name }}</option>
            @endforeach
          </select>
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="galDesc">Image Description</label>
          <textarea class="form-control" id="galDesc" name="gal_desc" rows="5"></textarea>
         </div>
        </div>
        <div class="card-action">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('gallery.index') }}" class="btn btn-danger">Cancel</a>
           </div>
       </form>

      </div>

     </div>
    </div>
   </div>
  </div>
 </div>

@endsection
