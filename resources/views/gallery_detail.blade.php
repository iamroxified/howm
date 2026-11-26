@extends('layouts.app')

@section('title', 'HOWM Events.')
@section('content')
 <!-- Hero Start -->
 <div class="container-fluid hero-header">
  <div class="container">
   <div class="row">
    <div class="col-lg-7">
     <div class="hero-header-inner animated zoomIn">
      <h1 class="display-1 text-dark">Gallery Detail</h1>
      <ol class="breadcrumb mb-0">
       <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
       <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">Gallery</a></li>
       <li class="breadcrumb-item text-dark" aria-current="page">{{ $gallery->gal_name }}</li>
      </ol>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Hero End -->

 <!-- Gallery Detail Start -->
 <div class="container-fluid event py-5">
  <div class="container py-5">
   <div class="row">
    <div class="col-lg-8">
     <div class="mb-5">
      <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">{{ $gallery->gal_name }}</h1>
      <p class="wow fadeIn" data-wow-delay="0.2s">{{ $gallery->gal_desc }}</p>
     </div>
     <div class="row">
      @foreach ($gallery->gal_img as $image)
       <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
        <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal" data-img-src="{{ asset('storage/' . $image) }}">
            <div class="overflow-hidden mb-5">
                <img src="{{ asset('storage/' . $image) }}" class="img-fluid w-100" alt="">
            </div>
        </a>
       </div>
      @endforeach
     </div>
    </div>
    <div class="col-lg-4">
     <div class="card">
      <div class="card-header bg-dark text-white">
       <h4 class="card-title mb-0">Other Galleries</h4>
      </div>
      <div class="card-body">
       @foreach ($other_galleries as $item)
       <div class="d-flex mb-3">
        @if ($item->gal_img && is_array($item->gal_img) && count($item->gal_img) > 0)
        <img src="{{ asset('storage/' . $item->gal_img[0]) }}" alt="{{ $item->gal_name }}"
         style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
       @else
        <div style="width: 60px; height: 60px; background-color: #f0f0f0; border-radius: 4px;"></div>
       @endif
        <div class="ms-3">
         <h5 class="mb-1"><a href="{{ route('gallery.show', $item->id) }}"
           class="text-decoration-none">{{ $item->gal_name }}</a></h5>
         <p class="mb-0 text-muted">{{ Str::limit($item->gal_desc, 50) }}</p>
        </div>
       </div>
       @endforeach
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Gallery Detail End -->

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body p-0">
        <img src="" id="modalImage" class="img-fluid w-100">
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var imageModal = document.getElementById('imageModal');
    imageModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var imgSrc = button.getAttribute('data-img-src');
        var modalImage = imageModal.querySelector('#modalImage');
        modalImage.setAttribute('src', imgSrc);
    });
});
</script>

@endsection
