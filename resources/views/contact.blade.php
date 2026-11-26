@extends('layouts.app')

@section('title', 'Habitation of Winners Ministry Inc.')
@section('content')


 <!-- Hero Start -->
 <div class="container-fluid hero-header">
  <div class="container">
   <div class="row">
    <div class="col-lg-7">
     <div class="hero-header-inner animated zoomIn">
      <h1 class="display-1 text-dark">Contact</h1>
      <ol class="breadcrumb mb-0">
       <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
       {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
       <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
      </ol>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Hero End -->




 <!-- Contact Start -->
 <div class="container-fluid contact ">
  <div class="container py-5">
   <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
    <p class="fs-5 text-uppercase text-primary">Get In Touch</p>

   </div>
   <div class="row">
    <div class="col-md-4">
     <h2><i class="fas fa-address-card"></i> Address</h2>
     <p>His Glory Cathedral, Winners Avenue, After The WAEC Office Along Crusher Road, Lokoja Kogi State</p>
    </div>
    <div class="col-md-4">
     <h2><i class="fas fa-mobile-alt"></i> Mobile</h2>
     <p>+2347019161846 </p>

    </div>
    <div class="col-md-4">
     <h2><i class="fas fa-envelope"></i> Email</h2>
     <p>info@howmworldwide.org</p>
     <p>habitationofwinnersworldwide@gmail.com</p>
    </div>
   </div>

   <div class="row py-5">
    <div class="">
     <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
      <h3 class="display">Our Social Media</h3>
      <a class="text-dark px-2" href="https://www.facebook.com/share/1BocxjmXas/"><i class="fab fa-facebook-f fa-2x"></i></a>
      <a class="text-dark px-2" href=""><i class="fab fa-twitter fa-2x"></i></a>
      <a class="text-dark px-2" href="https://t.me/+UbRRvw5m2mYfITVV"><i class="fab fa-telegram fa-2x"></i></a>
      <a class="text-dark px-2" href="https://www.instagram.com/official_howm?igsh=M2Z0bGVsMHJ5dzZj"><i
        class="fab fa-instagram fa-2x"></i></a>
     </div>
    </div>
   </div>
   <div class="row py-5">
    <div class="col-md-12">
     <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" >
      <h3 class="display">Our Location</h3>
      <iframe
       src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d617.6665454194812!2d6.683889497132732!3d7.820912435803324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sng!4v1763646836865!5m2!1sen!2sng" width="100%" height="450"
        style="border:0;" allowfullscreen="" loading="lazy"
       referrerpolicy="no-referrer-when-downgrade"></iframe>
     </div>
    </div>
   </div>


  </div>
  <div class="container py-5">
   <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
    <p class="fs-5 text-uppercase text-primary">Get In Touch</p>
    <h1 class="display-3">Contact For Any Queries</h1>
    <p class="mb-0">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP
     in a few minutes. Just copy and paste the files, add a little code and you're done. <a
      href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
   </div>
   <div class="row g-4 wow fadeIn" data-wow-delay="0.3s">
    <div class="col-sm-6">
     <input type="text" class="form-control bg-transparent p-3" placeholder="Your Name">
    </div>
    <div class="col-sm-6">
     <input type="email" class="form-control bg-transparent p-3" placeholder="Your Email">
    </div>
    <div class="col-12">
     <input type="text" class="form-control bg-transparent p-3" placeholder="Subject">
    </div>
    <div class="col-12">
     <textarea class="w-100 form-control bg-transparent p-3" rows="6" cols="10" placeholder="Your Message"></textarea>
    </div>
    <div class="col-12 text-center">
     <button class="btn btn-primary border-0 py-3 px-5" type="button">Send Message</button>
    </div>
   </div>
  </div>
 </div>
 <!-- Contact Start -->


@endsection
