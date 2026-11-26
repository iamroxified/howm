@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')

<div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Gallery Details</h3>
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
      <a href="{{ route('gallery.index') }}">All Gallery</a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('gallery.show', $gallery->id) }}">Gallery Details</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">{{ $gallery->gal_name }}</div>
      </div>
      <div class="card-body">

       <div class="row mb-4">
        <div class="col-md-6">
         <h5>Gallery Information</h5>
         <table class="table table-bordered">
          <tr>
           <th>Title:</th>
           <td>{{ $gallery->gal_name }}</td>
          </tr>
          <tr>
           <th>Category:</th>
           <td>{{ $gallery->gal_cat ?? 'N/A' }}</td>
          </tr>
          <tr>
           <th>Date:</th>
           <td>{{ $gallery->gal_date ?? 'N/A' }}</td>
          </tr>
          <tr>
           <th>Created:</th>
           <td>{{ $gallery->created_at->format('d M Y H:i') }}</td>
          </tr>
          <tr>
           <th>Description:</th>
           <td>{{ $gallery->gal_desc ?? 'N/A' }}</td>
          </tr>
         </table>
        </div>
       </div>

       <div class="row">
        <div class="col-md-12">
         <h5>Gallery Images ({{ $gallery->gal_img && is_array($gallery->gal_img) ? count($gallery->gal_img) : 0 }} images)</h5>
         @if($gallery->gal_img && is_array($gallery->gal_img) && count($gallery->gal_img) > 0)
          <div class="row">
           @foreach($gallery->gal_img as $index => $img)
            <div class="col-md-3 mb-4">
             <div class="card">
              <img src="{{ asset('storage/' . $img) }}" alt="Gallery Image {{ $index + 1 }}" class="card-img-top" style="height: 200px; object-fit: cover;">
              <div class="card-body">
               <small class="text-muted d-block">Image {{ $index + 1 }}</small>
               <small class="text-muted">{{ basename($img) }}</small>
              </div>
             </div>
            </div>
           @endforeach
          </div>
         @else
          <div class="alert alert-info">No images found in this gallery.</div>
         @endif
        </div>
       </div>

       <div class="card-action mt-4">
        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Back to Gallery</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

@endsection
