@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')

<div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Edit Gallery</h3>
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
      <a href="{{ route('admin.gallery.edit', $gallery->id) }}">Edit Gallery</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">Edit {{ $gallery->gal_name }}</div>
      </div>
      <div class="card-body">
       <form method="POST" action="{{ route('admin.gallery.update', $gallery->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">
         <div class="form-group col-md-6 col-lg-4">
          <label for="galName">Gallery Title</label>
          <input type="text" class="form-control" id="galName" name="gal_name" value="{{ $gallery->gal_name }}"
           placeholder="Enter Gallery Title" required />
         </div>

         <div class="form-group col-md-6 col-lg-4">
          <label for="galImg">Images <small>(Select multiple to replace all)</small></label>
          <input type="file" class="form-control" id="galImg" name="gal_img[]" placeholder="" accept="image/*" multiple />
         </div>

         <div class="form-group col-md-6 col-lg-4">
          <label for="galDate">Date</label>
          <input type="date" class="form-control" id="galDate" name="gal_date" value="{{ $gallery->gal_date }}" />
         </div>

         <div class="form-group col-md-6 col-lg-4">
          <label for="galCat">Image Category</label>
          <select class="form-control" id="galCat" name="gal_cat" required>
            <option value="" disabled>Select Category</option>
            <option value="General" @selected($gallery->gal_cat === 'General')>General</option>
            @foreach($ministries as $ministry)
            <option value="{{ $ministry->min_cat }}" @selected($gallery->gal_cat === $ministry->min_cat)>{{ $ministry->min_name }}</option>
            @endforeach
          </select>
         </div>

         <div class="form-group col-md-6 col-lg-4">
          <label for="galDesc">Description</label>
          <textarea class="form-control" id="galDesc" name="gal_desc" rows="5">{{ $gallery->gal_desc }}</textarea>
         </div>
        </div>

        @if($gallery->gal_img && is_array($gallery->gal_img) && count($gallery->gal_img) > 0)
        <div class="row mt-3">
         <div class="col-md-12">
          <label>Current Images:</label>
          <div class="row">
           @foreach($gallery->gal_img as $index => $img)
            <div class="col-md-3 mb-3">
             <img src="{{ asset('storage/' . $img) }}" alt="Gallery Image" class="img-thumbnail" style="width: 100%; height: auto;">
             <small class="text-muted d-block mt-1">{{ basename($img) }}</small>
            </div>
           @endforeach
          </div>
          <p class="text-info"><small>Upload new images to replace all existing images</small></p>
         </div>
        </div>
        @endif

        <div class="card-action">
            <button type="submit" class="btn btn-success">Update</button>
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
