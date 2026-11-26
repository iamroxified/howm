@extends('layouts.app')

@section('title', 'Habitation of Winners Ministry Inc.')
@section('content')

 <!-- Hero Start -->
 <div class="container-fluid hero-header">
  <div class="container">
   <div class="row">
    <div class="col-lg-7">
     <div class="hero-header-inner animated zoomIn">
      <p class="fs-4 text-dark">WELCOME TO </p>
      <h1 class="display-1 mb-5 text-dark">Habitation of Winners Ministry Inc.</h1>
      <p class="mb-5 text-dark">REACHING THE WORLD THROUGH THE WORD</p>
      <a href="{{ '/about' }}" class="btn btn-primary py-3 px-5">Read More</a>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Hero End -->


 <!-- About Satrt -->
 <div class="container-fluid about py-5">
  <div class="container py-5">
   <div class="row g-5 mb-5">
    <div class="col-xl-6">
     <div class="row g-4">
      <div class="col-6">
       <img src="{{ asset('assets/img/eniola-002.jpg') }}" class="img-fluid h-100 wow zoomIn" data-wow-delay="0.1s" alt="">
      </div>
      <div class="col-6">
       <img src="{{ asset('assets/img/slide2.jpg') }}" class="img-fluid pb-3 wow zoomIn" data-wow-delay="0.1s" alt="">
       <img src="{{ asset('assets/img/about-1.jpg') }}" class="img-fluid pt-3 wow zoomIn" data-wow-delay="0.1s" alt="">
      </div>
     </div>
    </div>
    <div class="col-xl-6 wow fadeIn" data-wow-delay="0.5s">
     <p class="fs-5 text-uppercase text-primary">About HOWM</p>
     <h1 class="display-5 pb-4 m-0">REACHING THE WORLD THROUGH THE WORD</h1>
     <p class="pb-4">Welcome to HOWM —where faith meets purpose, and community becomes family. Join us as we grow spiritually, empower one another, and celebrate our heritage.</p>
     <div class="row g-4 mb-4">
      <div class="col-md-6">
       <div class="ps-3 d-flex align-items-center justify-content-start">
        <span class="bg-primary btn-md-square rounded-circle mt-4 me-2"><i
          class="fa fa-eye text-dark fa-4x mb-5 pb-2"></i></span>
        <div class="ms-4">
         <h5>Our Vision</h5>
         <p>Our mission is rooted in the Word of God and guided by the Holy Spirit. We are called to build a united community that reflects the love of Christ, supports one another in every area of life, and celebrates our divine heritage.</p>
        </div>
       </div>
      </div>
      <div class="col-md-6">
       <div class="ps-3 d-flex align-items-center justify-content-start">
        <span class="bg-primary btn-md-square rounded-circle mt-4 me-2"><i
          class="fa fa-flag text-dark fa-4x mb-5 pb-2"></i></span>
        <div class="ms-4">
         <h5>Our Mission</h5>
         <p>Our mission is rooted in the Word of God and guided by the Holy Spirit. We are called to build a united community that reflects the love of Christ, supports one another in every area of life, and celebrates our divine heritage.</p>
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


 <!-- Activities Start -->
 <div class="container-fluid activities py-5">
  <div class="container py-5">
   <div class="mx-auto text-center mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
    <p class="fs-5 text-uppercase text-primary">Activities</p>
    <h1 class="display-3">Here Are Our Activities</h1>
   </div>
   <div class="row g-4">
    <div class="col-lg-6 col-xl-4">
     <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
      <i class="fa fa-church fa-4x text-dark"></i>
      <div class="ms-4">
       <h4>Church Development</h4>
       <p class="mb-4">Focused initiatives that strengthen the spiritual, structural, and organizational growth of the ministry—enhancing leadership capacity, improving worship experience, expanding outreach efforts, and building a thriving, united church community. </p>
       <a href="{{ '/activities' }}" class="btn btn-primary px-3">Read More</a>
      </div>
     </div>
    </div>
    <div class="col-lg-6 col-xl-4">
     <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.3s">
      <i class="fa fa-donate fa-4x text-dark"></i>
      <div class="ms-4">
       <h4>Outreaches & Crusades</h4>
       <p class="mb-4">Dynamic soul-winning and community-impact programs designed to share the love of Christ through evangelism, charity, missions, and compassionate service.</p>
       <a href="{{ '/activities' }}" class="btn btn-primary px-3">Read More</a>
      </div>
     </div>
    </div>

    <div class="col-lg-6 col-xl-4">
     <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.1s">
      <i class="fa fa-book fa-4x text-dark"></i>
      <div class="ms-4">
       <h4>Daily Communion with God</h4>
       <p class="mb-4">A spiritually enriching devotional that guides believers into consistent fellowship with God through prayer, reflection, and the study of His Word.</p>
       <a href="{{ '/activities' }}" class="btn btn-primary px-3">Read More</a>
      </div>
     </div>
    </div>
    <div class="col-lg-6 col-xl-4">
     <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.3s">
      <i class="fa fa-book-open fa-4x text-dark"></i>
      <div class="ms-4">
       <h4>Hour of Destiny</h4>
       <p class="mb-4">A prophetic prayer encounter where believers gather to seek God’s intervention, experience breakthrough, and align their lives with His divine purpose.</p>
       <a href="{{ '/activities' }}" class="btn btn-primary px-3">Read More</a>
      </div>
     </div>
    </div>
    <div class="col-lg-6 col-xl-4">
     <div class="activities-item p-4 wow fadeIn" data-wow-delay="0.5s">
      <i class="fa fa-hands fa-4x text-dark"></i>
      <div class="ms-4">
       <h4>Winning Women</h4>
       <p class="mb-4">A vibrant women’s fellowship and intercessory movement dedicated to empowering, mentoring, and uplifting women through prayer, teaching, and godly sisterhood.</p>
       <a href="{{ '/activities' }}" class="btn btn-primary px-3">Read More</a>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Activities Start -->


 <!-- Events Start -->
 <div class="container-fluid event py-5">
  <div class="container py-5">
   <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Upcoming <span class="text-primary">Events</span></h1>
   @forelse($programmes as $programme)
   <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
    <div class="col-3 col-lg-2 pe-0">
     <div class="text-center border-bottom border-dark py-3 px-2">
      <h6>{{ $programme->prg_start }} to {{ $programme->prg_end }}</h6>
      <p class="mb-0">{{ $programme->prg_time }}</p>
     </div>
    </div>
    <div class="col-9 col-lg-6 border-start border-dark pb-5">
    <div class="ms-3">
      <h4 class="mb-3">{{ $programme->prg_title }}</h4>
      <p class="mb-4">{{ $programme->prg_desc }}</p>
      <a href="{{ '/programme/' . $programme->id }}" class="btn btn-primary px-3">View More</a>
     </div>
    </div>
    <div class="col-12 col-lg-4">
     <div class="overflow-hidden mb-5">
      <img src="{{ asset('storage/' . $programme->prg_img) }}" class="img-fluid w-100" alt="">
     </div>
    </div>
   </div>
   @empty
   <span class="text-muted">No Upcoming Event</span>
@endforelse
  </div>
 </div>
 <!-- Events End -->


 <!-- Sermon Start -->
 <div class="container-fluid sermon py-5">
  <div class="container py-5">
   <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
    <p class="fs-5 text-uppercase text-primary">Sermons</p>
    <h1 class="display-3">Live Transforming Messages</h1>
   </div>
   <div class="row g-4 justify-content-center">
    <div class="col-lg-6 col-xl-4">
     <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">
      <div class="overflow-hidden p-4 pb-0">
       <img src="{{ asset('assets/img/about-1.jpg') }}" class="img-fluid w-100" alt="">
      </div>
      <div class="p-4">
       <div class="sermon-meta d-flex justify-content-between pb-2">
        <div class="">
         <small><i class="fa fa-calendar me-2 text-muted"></i><a href="" class="text-muted me-2">13 Nov
           2023</small></a>
         <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted">Admin</small></a>
        </div>
        <div class="">
         <a href="" class="me-1"><i class="fas fa-video text-muted"></i></a>
         <a href="" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
         <a href="" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
         <a href="" class=""><i class="fas fa-image text-muted"></i></a>
        </div>
       </div>
       <a href="" class="d-inline-block h4 lh-sm mb-3">Unity in the Church</a>
       <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam,
        aliquip ex ea commodo consequat.</p>
      </div>
     </div>
    </div>
    <div class="col-lg-6 col-xl-4">
     <div class="sermon-item wow fadeIn" data-wow-delay="0.3s">
      <div class="overflow-hidden p-4 pb-0">
       <img src="{{ asset('assets/img/about-1.jpg') }}" class="img-fluid w-100" alt="">
      </div>
      <div class="p-4">
       <div class="sermon-meta d-flex justify-content-between pb-2">
        <div class="">
         <small><i class="fa fa-calendar me-2 text-muted"></i><a href="" class="text-muted me-2">13 Nov
           2023</small></a>
         <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted">Admin</small></a>
        </div>
        <div class="">
         <a href="" class="me-1"><i class="fas fa-video text-muted"></i></a>
         <a href="" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
         <a href="" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
         <a href="" class=""><i class="fas fa-image text-muted"></i></a>
        </div>
       </div>
       <a href="" class="d-inline-block h4 lh-sm mb-3">Benefits of Serving the Lord</a>
       <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam,
        aliquip ex ea commodo consequat.</p>
      </div>
     </div>
    </div>
    <div class="col-lg-6 col-xl-4">
     <div class="sermon-item wow fadeIn" data-wow-delay="0.5s">
      <div class="overflow-hidden p-4 pb-0">
       <img src="{{ asset('assets/img/about-1.jpg') }}" class="img-fluid w-100" alt="">
      </div>
      <div class="p-4">
       <div class="sermon-meta d-flex justify-content-between pb-2">
        <div class="">
         <small><i class="fa fa-calendar me-2 text-muted"></i><a href="" class="text-muted me-2">13 Nov
           2023</small></a>
         <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted">Admin</small></a>
        </div>
        <div class="">
         <a href="" class="me-1"><i class="fas fa-video text-muted"></i></a>
         <a href="" class="me-1"><i class="fas fa-headphones text-muted"></i></a>
         <a href="" class="me-1"><i class="fas fa-file-alt text-muted"></i></a>
         <a href="" class=""><i class="fas fa-image text-muted"></i></a>
        </div>
       </div>
       <a href="" class="d-inline-block h4 lh-sm mb-3">Don't Create that Mess</a>
       <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam,
        aliquip ex ea commodo consequat.</p>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Sermon End -->


 <!-- Blog Start -->
 <div class="container-fluid py-5">
  <div class="container py-5">
   <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Latest From <span class="text-primary">Our Blog</span>
   </h1>
   <div class="row g-4 justify-content-center">
    <div class="col-lg-6 col-xl-4">
     <div class="blog-item wow fadeIn" data-wow-delay="0.1s">
      <div class="blog-img position-relative overflow-hidden">
       <img src="{{ asset('assets/img/about-1.jpg') }}" class="img-fluid w-100" alt="">
       <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">01 Jan 2045</div>
      </div>
      <div class="p-4">
       <div class="blog-meta d-flex justify-content-between pb-2">
        <div class="">
         <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted me-2">By
           Admin</small></a>
         <small><i class="fa fa-comment-alt me-2 text-muted"></i><a href="" class="text-muted me-2">12
           Comments</small></a>
        </div>
        <div class="">
         <a href=""><i class="fas fa-bookmark text-muted"></i></a>
        </div>
       </div>
       <a href="" class="d-inline-block h4 lh-sm mb-3">Importance of worshiping with HOWM</a>
       <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam,
        aliquip ex ea commodo consequat.</p>
       <a href="#" class="btn btn-primary px-3">More Details</a>
      </div>
     </div>
    </div>
    <div class="col-lg-6 col-xl-4">
     <div class="blog-item wow fadeIn" data-wow-delay="0.3s">
      <div class="blog-img position-relative overflow-hidden">
       <img src="{{ asset('assets/img/about-1.jpg') }}" class="img-fluid w-100" alt="">
       <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">01 Jan 2045</div>
      </div>
      <div class="p-4">
       <div class="blog-meta d-flex justify-content-between pb-2">
        <div class="">
         <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted me-2">By
           Admin</small></a>
         <small><i class="fa fa-comment-alt me-2 text-muted"></i><a href="" class="text-muted me-2">12
           Comments</small></a>
        </div>
        <div class="">
         <a href=""><i class="fas fa-bookmark text-muted"></i></a>
        </div>
       </div>
       <a href="" class="d-inline-block h4 lh-sm mb-3">How to get closer to God</a>
       <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam,
        aliquip ex ea commodo consequat.</p>
       <a href="#" class="btn btn-primary px-3">More Details</a>
      </div>
     </div>
    </div>
    <div class="col-lg-6 col-xl-4">
     <div class="blog-item wow fadeIn" data-wow-delay="0.5s">
      <div class="blog-img position-relative overflow-hidden">
       <img src="{{ asset('assets/img/about-1.jpg') }}" class="img-fluid w-100" alt="">
       <div class="bg-primary d-inline px-3 py-2 text-center text-white position-absolute top-0 end-0">01 Jan 2045</div>
      </div>
      <div class="p-4">
       <div class="blog-meta d-flex justify-content-between pb-2">
        <div class="">
         <small><i class="fas fa-user me-2 text-muted"></i><a href="" class="text-muted me-2">By
           Admin</small></a>
         <small><i class="fa fa-comment-alt me-2 text-muted"></i><a href="" class="text-muted me-2">12
           Comments</small></a>
        </div>
        <div class="">
         <a href=""><i class="fas fa-bookmark text-muted"></i></a>
        </div>
       </div>
       <a href="" class="d-inline-block h4 lh-sm mb-3">Importance of being a worker in HOWM</a>
       <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
        labore et dolore magna aliqua. Ut enim ad minim veniam,
        aliquip ex ea commodo consequat.</p>
       <a href="#" class="btn btn-primary px-3">More Details</a>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Blog End -->


 <!-- Team Start -->
 <div class="container-fluid team py-5">
  <div class="container py-5">
   <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
    <p class="fs-5 text-uppercase text-primary">Our Spiritual Leaders</p>
    <h1 class="display-3">Meet Our Spiritual Leaders</h1>
   </div>
   <div class="row g-5">
    <div class="col-lg-4 col-xl-5">
     <div class="team-img wow zoomIn" data-wow-delay="0.1s">
      <img src="{{ asset('assets/img/eniola-002.jpg') }}" class="img-fluid" alt="">
     </div>
    </div>
    <div class="col-lg-8 col-xl-7">
     <div class="team-item wow fadeIn" data-wow-delay="0.1s">
      <h1>Rev Mike & Pst. Mrs Becky Eniola</h1>
      <h5 class="fw-normal fst-italic text-primary mb-4">General Overseer</h5>
      <p class="mb-4">The visionary leaders anointed to guide the ministry with wisdom, integrity, and unwavering commitment to God’s purpose. The General Overseer provides spiritual direction, oversees all missions and programs, and leads the church in fulfilling its divine mandate to transform lives and advance the gospel.</p>
      <p class="mb-4 text-justify">Pastor Mrs. Becky O. Eniola is a seasoned minister of the gospel whose life and calling have impacted women and children across the globe. She serves as the Resident Pastor of Habitation of Winners Ministry Inc., where her leadership and spiritual insight continue to inspire transformation and growth.

        A sought-after speaker, Pastor Becky Eniola ministers powerfully at churches, conventions, conferences, seminars, and crusades, bringing messages of hope, healing, and restoration. Her passion for intercession and empowerment led her to establish the Winning Women Intercessory Group, a vibrant ministry dedicated to reshaping and uplifting the lives of women through prayer and mentorship.

        She is also the co-author of the widely read devotional, Daily Communion with God, which continues to bless and encourage believers in their daily walk with Christ.

        Pastor Becky is joyfully married to Rev. Mike G. Eniola, a respected and seasoned minister of God. Together, they are blessed with three wonderful children, and their family stands as a testament to faith, purpose, and divine grace.
        </p>
      <div class="team-icon d-flex pb-4 mb-4 border-bottom border-primary">
       <a class="btn btn-primary btn-lg-square me-2" href=""><i class="fab fa-facebook-f"></i></a>
       <a class="btn btn-primary btn-lg-square me-2" href=""><i class="fab fa-twitter"></i></a>
       <a href="#" class="btn btn-primary btn-lg-square me-2"><i class="fab fa-instagram"></i></a>
       <a href="#" class="btn btn-primary btn-lg-square"><i class="fab fa-linkedin-in"></i></a>
      </div>
     </div>

    </div>
   </div>
  </div>
 </div>
 <!-- Team End -->


 <!-- Testiminial Start -->
 <div class="container-fluid testimonial py-5">
  <div class="container py-5">
   <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
    <p class="fs-5 text-uppercase text-primary">Testimonial</p>
    <h1 class="display-3">What People Say About HOWM</h1>
   </div>
   <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.1s">
    <div class="testimonial-item">
     <div class="d-flex mb-3">
      <div class="position-relative">
       <img src="{{ asset('assets/img/images.png') }}" class="img-fluid" alt="">
       <div class="btn-md-square bg-primary rounded-circle position-absolute" style="top: 25px; left: -25px;">
        <i class="fa fa-quote-left text-dark"></i>
       </div>
      </div>
      <div class="ps-3 my-auto ">
       <h5 class="mb-0">Full Name</h5>
       <p class="m-0">Profession</p>
      </div>
     </div>
     <div class="testimonial-content">
      <div class="d-flex">
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
      </div>
      <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do tempor ut labore et dolore magna aliqua. Ut enim
       ad minim quis.</p>
     </div>
    </div>
    <div class="testimonial-item">
     <div class="d-flex mb-3">
      <div class="position-relative">
       <img src="{{ asset('assets/img/images.png') }}" class="img-fluid" alt="">
       <div class="btn-md-square bg-primary rounded-circle position-absolute" style="top: 25px; left: -25px;">
        <i class="fa fa-quote-left text-dark"></i>
       </div>
      </div>
      <div class="ps-3 my-auto ">
       <h5 class="mb-0">Full Name</h5>
       <p class="m-0">Profession</p>
      </div>
     </div>
     <div class="testimonial-content">
      <div class="d-flex">
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
      </div>
      <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do tempor ut labore et dolore magna aliqua. Ut enim
       ad minim quis.</p>
     </div>
    </div>
    <div class="testimonial-item">
     <div class="d-flex mb-3">
      <div class="position-relative">
       <img src="{{ asset('assets/img/images.png') }}" class="img-fluid" alt="">
       <div class="btn-md-square bg-primary rounded-circle position-absolute" style="top: 25px; left: -25px;">
        <i class="fa fa-quote-left text-dark"></i>
       </div>
      </div>
      <div class="ps-3 my-auto ">
       <h5 class="mb-0">Full Name</h5>
       <p class="m-0">Profession</p>
      </div>
     </div>
     <div class="testimonial-content">
      <div class="d-flex">
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
      </div>
      <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do tempor ut labore et dolore magna aliqua. Ut enim
       ad minim quis.</p>
     </div>
    </div>
    <div class="testimonial-item">
     <div class="d-flex mb-3">
      <div class="position-relative">
       <img src="{{ asset('assets/img/images.png') }}" class="img-fluid" alt="">
       <div class="btn-md-square bg-primary rounded-circle position-absolute" style="top: 25px; left: -25px;">
        <i class="fa fa-quote-left text-dark"></i>
       </div>
      </div>
      <div class="ps-3 my-auto ">
       <h5 class="mb-0">Full Name</h5>
       <p class="m-0">Profession</p>
      </div>
     </div>
     <div class="testimonial-content">
      <div class="d-flex">
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
       <i class="fas fa-star text-primary"></i>
      </div>
      <p class="fs-5 m-0 pt-3">Lorem ipsum dolor sit amet elit, sed do tempor ut labore et dolore magna aliqua. Ut enim
       ad minim quis.</p>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- Testiminial End -->


@endsection
