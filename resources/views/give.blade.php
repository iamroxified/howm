@extends('layouts.app')

@section('title', 'Habitation of Winners Ministry Inc.')
@section('content')

        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Giving</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                                {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li> --}}
                                <li class="breadcrumb-item text-dark" aria-current="page">Giving</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Sermon Start -->
        <div class="container-fluid sermon ">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    <p class="fs-5 text-uppercase text-primary">Give</p>
                    <h1 class="display-3">Give From Nigeria</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-3 col-xl-3">
                        <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="overflow-hidden p-4 pb-0">
                                <img src="{{ asset('assets/img/firstbank.png') }}" class="img-fluid w-50" alt="">
                            </div>
                            <div class="p-4">

                                <h4 class="animated zoomIn">Firstbank</h4>
                                <p class="mb-0 animated zoomIn">A/C No: 2047287569</p>
                                <p class="mb-0 animated zoomIn">A/C Name: Habitation of Winners Ministry</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3">
                        <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="overflow-hidden p-4 pb-0">
                                <img src="{{ asset('assets/img/sterling.png') }}" class="img-fluid w-50" alt="">
                            </div>
                            <div class="p-4">

                                <h4 class="animated zoomIn">Sterling</h4>
                                <p class="mb-0 animated zoomIn">A/C No: 0022347180</p>
                                <p class="mb-0 animated zoomIn">A/C Name: Habitation of Winners Ministry</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3">
                        <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="overflow-hidden p-4 pb-0">
                                <img src="{{ asset('assets/img/gtb.png') }}" class="img-fluid w-50" alt="">
                            </div>
                            <div class="p-4">

                                <h4 class="animated zoomIn">GTBank</h4>
                                <p class="mb-0 animated zoomIn">A/C No: 0605002644</p>
                                <p class="mb-0 animated zoomIn">A/C Name: Habitation of Winners Ministry</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-3">
                        <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="overflow-hidden p-4 pb-0">
                                <img src="{{ asset('assets/img/paystack.png') }}" class="img-fluid w-50" alt="">
                            </div>
                            <div class="p-4">

                                <h4 class="animated zoomIn">Paystack</h4>
                                <a href="{{ route('giving.form') }}" class="btn btn-primary px-3 animated zoomIn">Give Now</a>
                                {{-- <p class="mb-0">A/C Name: </p> --}}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="container py-5">
                <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                    {{-- <p class="fs-5 text-uppercase text-primary">Give</p> --}}
                    <h1 class="display-3">Give From Foreign Countries</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-3 col-xl-3">
                        <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="overflow-hidden p-4 pb-0">
                                <img src="{{ asset('assets/img/gtb.png') }}" class="img-fluid w-50" alt="">
                            </div>
                            <div class="p-4">

                                <h4 class="animated zoomIn">GTB DOLLAR ACCOUNT</h4>
                                <p class="mb-0 animated zoomIn">A/C No: 0616100159</p>
                                <p class="mb-0 animated zoomIn">A/C Name: Habitation of Winners Ministry</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3 col-xl-3">
                        <div class="sermon-item wow fadeIn" data-wow-delay="0.1s">
                            <div class="overflow-hidden p-4 pb-0">
                                <img src="{{ asset('assets/img/paypal.png') }}" class="img-fluid w-50" alt="">
                            </div>
                            <div class="p-4">

                                <h4>Paypal</h4>
                                <p class="mb-0">A/C No: </p>
                                <p class="mb-0">A/C Name: </p>
                            </div>
                        </div>
                    </div> --}}



                </div>
            </div>
        </div>
        <!-- Sermon End -->

@endsection
