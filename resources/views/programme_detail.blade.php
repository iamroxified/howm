@extends('layouts.app')

@section('title', $programme['prg_title'])
@section('content')
 <!-- Hero Start -->
 <div class="container-fluid hero-header">
  <div class="container">
   <div class="row">
    <div class="col-lg-7">
     <div class="hero-header-inner animated zoomIn">
      <h1 class="display text-dark">Programmes</h1>
      <ol class="breadcrumb mb-0">
       <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
       <li class="breadcrumb-item"><a href="{{ route('programme.index') }}">Programmes</a></li>

       <li class="breadcrumb-item text-dark" aria-current="page">{{ $programme['prg_title'] }}</li>
      </ol>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Hero End -->

 <div class="container py-5">
  <div class="row ">
   <div class="col-md-9">
    <!-- Events Start -->
    <div class="container-fluid event py-5">
     <div class="container py-5">
      <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s"> <span
        class="text-primary">{{ $programme['prg_title'] }}</span></h1>

      <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
       <div class="col-3 col-lg-2 pe-0">
        <div class="text-center border-bottom border-dark py-3 px-2">
         <h6>{{ $programme['prg_start'] }} to {{ $programme['prg_end'] }}</h6>
         <p class="mb-0">{{ $programme['prg_time'] }}</p>
        </div>
       </div>
       <div class="col-9 col-lg-6 border-start border-dark pb-5">
        <div class="ms-3">
         <h4 class="mb-3">{{ $programme['prg_title'] }}</h4>
         <p class="mb-4">{{ $programme['prg_desc'] }}</p>
        </div>
       </div>
       <div class="col-12 col-lg-4">
        <div class="overflow-hidden mb-5">
         <img src="{{ asset('storage/' . $programme['prg_img']) }}" class="img-fluid w-100" alt="">
        </div>
       </div>
      </div>

     </div>
    </div>
    <!-- Events End -->
   </div>
   <!-- Sidebar Start -->
   <div class="col-md-3">
    <div class="card">
     <div class="card-header">
      <h4 class="card-title">Upcoming Programmes</h4>
     </div>
     <div class="card-body">
      @foreach ($programmes as $p)

      <div class="overflow-hidden mb-5">
         <a href="{{ route('programme.show', $p['id']) }}">
       {{ $p['prg_title'] }}</a>
       </div>
      @endforeach

     </div>
    </div>
   </div>
   <!-- Sidebar End -->


  </div>

 </div>



@endsection
