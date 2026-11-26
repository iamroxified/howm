<!-- Topbar start -->
<div class="container-fluid fixed-top">
 <div class="container topbar d-none d-lg-block">
  <div class="topbar-inner">
   <div class="row gx-0">
    <div class="col-lg-7 text-start">
     <div class="h-100 d-inline-flex align-items-center me-4">
      <span class="fa fa-phone-alt me-2 text-dark"></span>
      <a href="tel:+2347019161846" class="text-secondary"><span>+2347019161846 </span></a>
     </div>
     <div class="h-100 d-inline-flex align-items-center">
      <span class="far fa-envelope me-2 text-dark"></span>
      <a href="mailto:info@howmworldwide.org" class="text-secondary"><span>info@howmworldwide.org</span></a>
     </div>
    </div>
    <div class="col-lg-5 text-end">
     <div class="h-100 d-inline-flex align-items-center">
      <span class="text-body">Follow Us:</span>
      <a class="text-dark px-2" href="https://www.facebook.com/share/1BocxjmXas/"><i class="fab fa-facebook-f"></i></a>
      <a class="text-dark px-2" href=""><i class="fab fa-twitter"></i></a>
      <a class="text-dark px-2" href="https://t.me/+UbRRvw5m2mYfITVV"><i class="fab fa-telegram"></i></a>
      <a class="text-dark px-2" href="https://www.instagram.com/official_howm?igsh=M2Z0bGVsMHJ5dzZj"><i class="fab fa-instagram"></i></a>

     </div>
    </div>
   </div>
  </div>
 </div>
 <div class="container">
  <nav class="navbar navbar-light navbar-expand-lg py-3">
   <a href="{{ '/' }}" class="navbar-brand">
    <h1 class="mb-0"><img src="{{ asset('assets/img/images.png') }}" style="width: 20%"><span
      class="text-primary">HOWM</span> </h1>
   </a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="fa fa-bars text-primary"></span>
   </button>
   <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
    <div class="navbar-nav ms-lg-auto mx-xl-auto">
     <a href="{{ '/' }}" class="nav-item nav-link active">Home</a>
     <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
        <div class="dropdown-menu m-0 rounded-0">
         <a href="{{ '/about' }}" class="dropdown-item">HOWM</a>
         <a href="{{ '/leadership' }}" class="dropdown-item">Leadership</a>
         <a href="#" class="dropdown-item">Our Vission</a>
         <a href="#" class="dropdown-item">Our Mission</a>
         <a href="#" class="dropdown-item">The Genesis</a>
        </div>
       </div>
     {{-- <a href="{{ '/programme' }}" class="nav-item nav-link">Programmes</a> --}}
     <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Events</a>
        <div class="dropdown-menu m-0 rounded-0">
         <a href="{{ '/programme' }}" class="dropdown-item">Programmes</a>
         <a href="{{ '/events' }}" class="dropdown-item">Events</a>

        </div>
       </div>
     {{-- <a href="{{ '/event' }}" class="nav-item nav-link">Events</a> --}}
     <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Media</a>
      <div class="dropdown-menu m-0 rounded-0">
       <a href="{{ '/sermon' }}" class="dropdown-item">Sermons</a>
       <a href="{{ '/gallery' }}" class="dropdown-item">Gallery</a>

      </div>
     </div>
     <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Resources</a>
      <div class="dropdown-menu m-0 rounded-0">
       <a href="{{ route('resources.dcg') }}" class="dropdown-item">DCG</a>
       <a href="#" class="dropdown-item">Hour of Destiny</a>
       <a href="#" class="dropdown-item">Testimonies</a>
      <a href="{{ route('books.index') }}" class="dropdown-item">Buy Books</a>
      </div>
     </div>
     <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Ministry</a>
      <div class="dropdown-menu m-0 rounded-0">
        @foreach($ministries as $ministry)
       <a href="{{ route('ministry.show', $ministry['id']) }}" class="dropdown-item">{{ $ministry['min_name'] }}</a>

       @endforeach
      </div>
     </div>
     <a href="{{ '/contact' }}" class="nav-item nav-link">Contact</a>
    </div>
    <a href="{{ '/give' }}" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block">Give</a>
   </div>
  </nav>
 </div>
</div>
<!-- Topbar End -->
