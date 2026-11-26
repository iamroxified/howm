@extends('layouts.app')

@section('title', 'Habitation of Winners Ministry Inc.')
@section('content')


 <!-- Hero Start -->
 <div class="container-fluid hero-header">
  <div class="container">
   <div class="row">
    <div class="col-lg-7">
     <div class="hero-header-inner animated zoomIn">
      <h1 class="display-1 text-dark">About HOWM</h1>
      <ol class="breadcrumb mb-0">
       <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
       {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
       <li class="breadcrumb-item text-dark" aria-current="page">About HOWM</li>
      </ol>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Hero End -->


 <!-- About Satrt -->
 <div class="container-fluid about py-5">
  <div class="container ">
   <div class="row g-5 mb-5">

    <div class="col-xl-12 wow fadeIn" data-wow-delay="0.5s">
     <p class="fs-5 text-uppercase text-primary">About HOWM</p>
     <h1 class="display-5 pb-4 m-0">Habitation of Winners Ministry Inc.</h1>
     <p class="pb-4">
      Habitation of Winners Ministries (HOWM) is a global Christian movement dedicated to raising Kingdom-driven
      believers who walk in purpose, power, and spiritual maturity. Rooted in the teachings of Christ and led by the Holy
      Spirit, HOWM exists to build a thriving community where faith, love, and transformation flourish.
     </p>
     <p class="pb-4">
      From our headquarters at His Glory Cathedral in Lokoja, Nigeria, to our growing network across the United States
      and beyond, we are committed to nurturing lives through sound biblical teaching, heartfelt worship, impactful
      outreach, and practical empowerment. Our ministries touch every aspect of life — spiritual growth, family, health,
      education, business, youth development, and community service.
     </p>
     <p class="pb-4">
      At HOWM, every member is valued, every gift is needed, and every life is important. We believe in unity,
      discipleship, and the power of God to change destinies. Whether you are seeking a deeper relationship with God, a
      place to serve, or a spiritual family to grow with, you are welcome here.
     </p>
     <p class="pb-4">
      Together, we grow. Together, we thrive. Together, we worship.
     </p>
     <div class="row g-4 mb-4">
      <div class="col-md-6">
       <div class="ps-3 d-flex align-items-center justify-content-start">
        <span class="bg-primary btn-md-square rounded-circle mt-4 me-2"><i
          class="fa fa-eye text-dark fa-4x mb-5 pb-2"></i></span>
        <div class="ms-4">
         <h5>Our Vision</h5>
         <p>Our mission is rooted in the Word of God and guided by the Holy Spirit. We are called to build a united
          community that reflects the love of Christ, supports one another in every area of life, and celebrates our
          divine heritage.</p>
        </div>
       </div>
      </div>
      <div class="col-md-6">
       <div class="ps-3 d-flex align-items-center justify-content-start">
        <span class="bg-primary btn-md-square rounded-circle mt-4 me-2"><i
          class="fa fa-flag text-dark fa-4x mb-5 pb-2"></i></span>
        <div class="ms-4">
         <h5>Our Mission</h5>
         <p>Our mission is rooted in the Word of God and guided by the Holy Spirit. We are called to build a united
          community that reflects the love of Christ, supports one another in every area of life, and celebrates our
          divine heritage.</p>
        </div>
       </div>
      </div>
     </div>
     {{-- <div class="bg-light p-3 mb-4">
                                <div class="row align-items-center justify-content-center">
                                 <div class="col-3">
                                  <img src="img/about-child.jpg" class="img-fluid rounded-circle" alt="">
                                 </div>
                                 <div class="col-6">
                                  <p class="mb-0">Lorem ipsum dolor sit amet elit. Donec tempus eros vel dolor mattis aliquam. Etiam quis mauris
                                   justo.</p>
                                 </div>
                                 <div class="col-3">
                                  <h2 class="mb-0 text-primary text-center">$20,46</h2>
                                  <h5 class="mb-0 text-center">Raised</h5>
                                 </div>
                                </div>
                               </div> --}}
     <div class="row g-2">
      <div class="col-md-6">
       <p class="mb-2"><i class="fa fa-check text-primary me-3"></i>Outreaches</p>
       <p class="mb-0"><i class="fa fa-check text-primary me-3"></i>Hour of Destiny</p>
      </div>
      <div class="col-md-6">
       <p class="mb-2"><i class="fa fa-check text-primary me-3"></i>Daily Communion with God</p>
       <p class="mb-0"><i class="fa fa-check text-primary me-3"></i>Winning Women</p>
      </div>
     </div>
    </div>
   </div>

  </div>
 </div>
 <div class="container text-center bg-primary py-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="row g-4 align-items-center">
   <div class="col-lg-2">
    <i class="fa fa-church fa-5x text-white"></i>
   </div>
   <div class="col-lg-7 text-center text-lg-start">
    <h1 class="mb-0">At the core of HOWM is a deep commitment to spiritual growth, fellowship, and service. </h1>
   </div>
   <div class="col-lg-3">
    <a href="{{ '/about' }}" class="btn btn-light py-2 px-4">Learn More</a>
   </div>
  </div>
 </div>
 </div>
 </div>
 <!-- About End -->

@endsection
