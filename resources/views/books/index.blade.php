@extends('layouts.app')

@section('title', 'Our Bookstore')

@section('content')
 <!-- Hero Start -->
 <div class="container-fluid hero-header">
  <div class="container">
   <div class="row">
    <div class="col-lg-7">
     <div class="hero-header-inner animated zoomIn">
      <h1 class="display-1 text-dark">Books</h1>
      <ol class="breadcrumb mb-0">
       <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
       <li class="breadcrumb-item text-dark" aria-current="page">Books</li>
      </ol>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Hero End -->

 <!-- Books Start -->
 <div class="container-fluid event py-5">
  <div class="container">
   <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Our <span class="text-primary">Books</span></h1>
   <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
   @forelse($books as $book)

     <div class="col-md-6">
      <div class="card card-body border-0 shadow-sm p-4">
       <div class="row g-4">
        <div class="col-md-4">
         <div class="overflow-hidden mb-5">
          <img src="{{ asset('books/' . $book->bk_img) }}" class="img-fluid w-100" alt="{{ $book->bk_title }}">
         </div>
        </div>
        <div class="col-md-8">
         <div class="ms-3">
          <h4 class="mb-3">{{ $book->bk_title }}</h4>
          <p class="mb-4">{{ $book->bk_desc }}</p>
          <h5 class="mb-3">{{ $book->bk_amount > 0 ? 'N' . number_format($book->bk_amount, 2) : 'Free' }}</h5>
          <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary px-3">View Details & Order</a>
         </div>
        </div>
       </div>
       </div>
     </div>

      @empty
       <div class="col-12">
        <p class="text-center">No books available at the moment.</p>
       </div>
   @endforelse
    </div>
   {{-- Assuming you might want pagination in the future --}}
   {{-- {{ $books->links() }} --}}
  </div>
 </div>
 <!-- Books End -->
@endsection
