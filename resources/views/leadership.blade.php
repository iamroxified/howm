@extends('layouts.app')

@section('title', 'Habitation of Winners Ministry Inc.')
@section('content')


        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Leadership</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                                {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
                                <li class="breadcrumb-item text-dark" aria-current="page">Leadership</li>
                            </ol>
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
    <div class="col-xl-4">

       <img src="{{ asset('assets/img/eniola-002.jpg') }}" class="img img-fluid  wow zoomIn" data-wow-delay="0.1s"
        alt="">
    </div>
    <div class="col-xl-8 wow fadeIn" data-wow-delay="0.5s">
     <p class="fs-5 text-uppercase text-primary">Meet The General Overseer</p>
     <h1 class="display-5 pb-4 m-0">A MESSAGE FROM REV. MIKE ENIOLA</h1>
     <p class="pb-4">Dear Beloved,

        I welcome you to Habitation of Winners Ministries Inc In'tl (HOWM Inc) with joy and gratitude. This ministry is more than an organization; it is a family, a spiritual home, and a beacon of light for those seeking truth, growth, and connection.

        Our mission is rooted in the Word of God and guided by the Holy Spirit. We are called to build a united community that reflects the love of Christ, supports one another in every area of life, and celebrates our divine heritage.

        As we expand our reach across the world, I encourage you to engage fully, through prayer meetings, crusades, discipleship programs, and community empowerment initiatives. Let us walk together in faith, share our gifts, and uplift one another as brothers and sisters in Christ.

        May the Lord bless you and keep you. May He make His face shine upon you and give you peace.

        In His service,
        Rev. Mike Eniola
        Spiritual Leader, HOWM Inc Int'l</p>
    </div>
   </div>
  </div>
 </div>
 <!-- About End -->


 <!-- Team Start -->
 <div class="container-fluid team py-5">
  <div class="container ">
   <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
    {{-- <p class="fs-5 text-uppercase text-primary">Our Spiritual Leaders</p> --}}
    {{-- <h1 class="display-3">PASTOR MRS. BECKY O. ENIOLA</h1> --}}
   </div>
   <div class="row g-5">
    <div class="col-lg-4 col-xl-5">
     <div class="team-img wow zoomIn" data-wow-delay="0.1s">
      <img src="{{ asset('assets/img/mrseniola.jpg') }}" class="img-fluid" alt="">
     </div>
    </div>
    <div class="col-lg-8 col-xl-7">
     <div class="team-item wow fadeIn" data-wow-delay="0.1s">
      <h1>PASTOR MRS. BECKY O. ENIOLA</h1>
      {{-- <h5 class="fw-normal fst-italic text-primary mb-4">General Overseer</h5> --}}

      <p class="mb-4 text-justify">Pastor Mrs. Becky O. Eniola is a seasoned minister of the gospel whose life and
       calling have impacted women and children across the globe. She serves as the Resident Pastor of Habitation of
       Winners Ministry Inc., where her leadership and spiritual insight continue to inspire transformation and growth.

       A sought-after speaker, Pastor Becky Eniola ministers powerfully at churches, conventions, conferences, seminars,
       and crusades, bringing messages of hope, healing, and restoration. Her passion for intercession and empowerment
       led her to establish the Winning Women Intercessory Group, a vibrant ministry dedicated to reshaping and uplifting
       the lives of women through prayer and mentorship.

       She is also the co-author of the widely read devotional, Daily Communion with God, which continues to bless and
       encourage believers in their daily walk with Christ.

       Pastor Becky is joyfully married to Rev. Mike G. Eniola, a respected and seasoned minister of God. Together, they
       are blessed with three wonderful children, and their family stands as a testament to faith, purpose, and divine
       grace.
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
@endsection
