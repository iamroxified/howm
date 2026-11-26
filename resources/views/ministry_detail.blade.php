@extends('layouts.app')

@section('title', $ministry['min_name'])
@section('content')
 <!-- Hero Start -->
 <div class="container-fluid hero-header">
  <div class="container">
   <div class="row">
    <div class="col-lg-7">
     <div class="hero-header-inner animated zoomIn">
      <h1 class="display text-dark">Ministry</h1>
      <ol class="breadcrumb mb-0">
       <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
       <li class="breadcrumb-item"><a href="{{ route('ministry.index') }}">Ministry</a></li>
       <li class="breadcrumb-item text-dark" aria-current="page">{{ $ministry['min_name'] }}</li>
      </ol>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Hero End -->

 <div class="container">
  <div class="row ">
   <div class="col-md-9">
    <!-- Events Start -->
    <div class="container-fluid event">
     <div class="container">
      <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s"> <span
        class="text-primary">{{ $ministry['min_name'] }}</span></h1>
      <div class="col-12 col-md-6">
       <div class="overflow-hidden mb-5">
        <img src="{{ asset('storage/' . $ministry['min_img']) }}" class="img-fluid w-100" alt="">
       </div>
      </div>
      <div>
       <h3>
        Description
       </h3>
       <p>{{ $ministry['min_desc'] }}</p>
      </div>
      <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
       <div class="col-6 col-lg-6 col-md-6 pe-0">
        <div class="text-center border-bottom border-dark py-3 px-2">
         <h3>Vision</h3>
         <p class="mb-0">{{ $ministry['min_vis'] }}</p>
        </div>
       </div>
       <div class="col-6 col-lg-6 col-md-6 pe-0">
        <div class="text-center border-bottom border-dark py-3 px-2">
         <h3>Mission</h3>
         <p class="mb-0">{{ $ministry['min_mis'] }}</p>
        </div>
       </div>

      </div>
      <div>
       <h3>
        Executives
       </h3>
      </div>
      <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
       <div class="card col-12 col-lg-4 col-md-6 pe-0">
        <div class="card-body">
         <div class="text-center border-bottom border-dark py-3 px-2">
          <h3>Position</h3>
          <img src="" alt="image">
          <p class="mb-0">name</p>
         </div>
        </div>
       </div>

      </div>

     </div>
     <div class="container">
      <h2>Upcoming Events</h2>
      <div class="row " >
       @foreach ($programmes as $programme)
        <div class="card col-12 col-lg-4 col-md-6 ">
         <div class="card-body">
          <div class="text-center border-bottom border-dark py-3 px-2">
           <h5>{{ $programme['prg_title'] }}</h5>
              <img src="{{ asset('storage/' . $programme['prg_img']) }}" alt="image" class="img img-fluid">
           <p class="mb-0">name</p>
          </div>
         </div>
        </div>
       @endforeach
      </div>

     </div>


    </div>
    <!-- Events End -->
   </div>
   <!-- Sidebar Start -->
   <div class="col-md-3">
    <div class="card">
     <div class="card-header">
      <h4 class="card-title">Other Ministry</h4>
     </div>
     <div class="card-body">
      @foreach ($ministries as $p)
       <div class="overflow-hidden mb-5">
        <a href="{{ route('ministry.show', $p['id']) }}">
         {{ $p['min_name'] }}</a>
       </div>
      @endforeach

     </div>
    </div>
   </div>
   <!-- Sidebar End -->


  </div>

 </div>



@endsection
