

        @extends('layouts.app')

        @section('title', 'HOWM Events.')
        @section('content')
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Events</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>

                                <li class="breadcrumb-item text-dark" aria-current="page">Events</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Events Start -->
        <div class="container-fluid event ">
         <div class="container ">
          <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Upcoming <span class="text-primary">events</span></h1>
          @foreach($events as $event)
          <div class="row g-4 event-item wow fadeIn" data-wow-delay="0.1s">
           <div class="col-12 col-lg-12 border-start border-dark pb-5">
           <div class="ms-3">
             <h4 class="mb-3">{{ $event['evn_title'] }}</h4>
             <h6><i class="fas fa-calendar-alt"></i> Date: {{ $event['evn_start'] }} to {{ $event['evn_end'] }}</h6>
             <h6 class="mb-0"><i class="fas fa-clock"></i> Time: {{ $event['evn_time'] }}</h6>
             <hr>
             <p class="mb-4">{{ $event['evn_desc'] }}</p>
             <a href="{{ route('events.show', $event['id']) }}" class="btn btn-primary px-3">View More</a>
            </div>
           </div>
           <div class="col-12 col-lg-4">
            <div class="overflow-hidden mb-5">
             <img src="{{ asset('storage/' . $event['evn_img']) }}" class="img-fluid w-100" alt="">
            </div>
           </div>
          </div>
       @endforeach
       {{ $events->links() }}
         </div>
        </div>
        <!-- Events End -->

@endsection
