@extends('layouts.app')

@section('title', 'HOWM Events.')
@section('content')
 <!-- Hero Start -->
 <div class="container-fluid hero-header">
  <div class="container">
   <div class="row">
    <div class="col-lg-7">
     <div class="hero-header-inner animated zoomIn">
      <h1 class="display-1 text-dark">Gallery</h1>
      <ol class="breadcrumb mb-0">
       <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>

       <li class="breadcrumb-item text-dark" aria-current="page">Gallery</li>
      </ol>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Hero End -->


 <!-- Events Start -->
 <div class="container-fluid event ">
  <div class="container ">
   <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">All <span class="text-primary"></span></h1>
   <div class="row">
    @foreach ($galleries as $gallery)
    <div class="col-md-3 mb-4 border-dark">
     <a href="{{ route('gallery.show', $gallery['id']) }}" class="text-decoration-none">

    <h2>{{ $gallery['gal_name'] }}</h2>
    @if ($gallery->gal_img && is_array($gallery->gal_img) && count($gallery->gal_img) > 0)
    <img src="{{ asset('storage/' . $gallery->gal_img[0]) }}" alt="{{ $gallery->gal_name }}"
     style="max-width: 100px; height: auto; border-radius: 4px;">
   @else
    <span class="text-muted">No image</span>
   @endif
</a>
</div>

    @endforeach

   </div>
   {{ $galleries->links() }}
  </div>
 </div>
 <!-- Events End -->

@endsection
