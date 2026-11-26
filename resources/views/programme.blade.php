

        @extends('layouts.app')

        @section('title', 'HOWM Events.')
        @section('content')
        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Programmes</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>

                                <li class="breadcrumb-item text-dark" aria-current="page">Programmes</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Events Start -->
        <div class="container-fluid event py-5">
         <div class="container py-5">
          <h1 class="display-3 mb-5 wow fadeIn" data-wow-delay="0.1s">Upcoming <span class="text-primary">Programmes</span></h1>
          @foreach($programmes as $programme)
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
             <a href="{{ route('programme.show', $programme['id']) }}" class="btn btn-primary px-3">View More</a>
            </div>
           </div>
           <div class="col-12 col-lg-4">
            <div class="overflow-hidden mb-5">
             <img src="{{ asset('storage/' . $programme['prg_img']) }}" class="img-fluid w-100" alt="">
            </div>
           </div>
          </div>
       @endforeach
       {{ $programmes->links() }}
         </div>
        </div>
        <!-- Events End -->

@endsection
