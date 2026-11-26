@extends('layouts.app')

@section('title', $event['evn_title'])
@section('content')
 <!-- Hero Start -->
 <div class="container-fluid hero-header">
  <div class="container">
   <div class="row">
    <div class="col-lg-7">
     <div class="hero-header-inner animated zoomIn">
      <h1 class="display text-dark">Events</h1>
      <ol class="breadcrumb mb-0">
       <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
       <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>

       <li class="breadcrumb-item text-dark" aria-current="page">{{ $event['evn_title'] }}</li>
      </ol>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Hero End -->

 <div class="container ">
  <div class="row ">
   <div class="col-md-9">
    <!-- Events Start -->
    <div class="container-fluid event ">
     <div class="container ">
      <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s"> <span
        class="text-primary">{{ $event['evn_title'] }}</span></h1>
      <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
       <div class="col-12 col-lg-12">
        <div class="overflow-hidden border-start border-dark pb-5">
         <div class="ms-3">
          <h4 class="mb-3">{{ $event['evn_title'] }}</h4>
          <h6><i class="fas fa-calendar-alt"></i> Date: {{ $event['evn_start'] }} to {{ $event['evn_end'] }}</h6>
          <h6 class="mb-0"><i class="fas fa-clock"></i> Time: {{ $event['evn_time'] }}</h6>

          <hr>
          <p class="mb-4">{{ $event['evn_desc'] }}</p>
         </div>
        </div>
        <div class="col-12 col-lg-4">
         <div class="overflow-hidden mb-5">
          <img src="{{ asset('storage/' . $event['evn_img']) }}" class="img-fluid w-100" alt="">
         </div>
        </div>
        <a href="{{ route('event_registration', $event->id) }}" class="btn btn-primary">Register</a>
       </div>
      </div>
     </div>
    </div>
    <!-- Events End -->
   </div>
   <!-- Sidebar Start -->
   <div class="col-md-3 py-5">
    <div class="card">
     <div class="card-header">
      <h4 class="card-title">Upcoming Events</h4>
     </div>
     <div class="card-body">
      @foreach ($events as $p)
       <div class="overflow-hidden mb-5">
        <a href="{{ route('events.show', $p->id) }}">
         {{ $p->evn_title }}</a>
       </div>
      @endforeach
     </div>
    </div>
   </div>
   <!-- Sidebar End -->


  </div>

 </div>



@endsection
