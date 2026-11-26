@extends('layouts.app')

@section('title', 'Giving Confirmation - Habitation of Winners Ministry Inc.')
@section('content')

        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Giving Confirmation</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('give') }}">Give</a></li>
                                <li class="breadcrumb-item text-dark" aria-current="page">Confirmation</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Confirmation Start -->
        <div class="container-fluid py-5">
            <div class="container py-5 text-center">
                @if($status == 'success')
                    <div class="wow fadeIn" data-wow-delay="0.1s">
                        <h1 class="display-3 text-success animated zoomIn">Payment Successful!</h1>
                        <p class="fs-5 animated zoomIn">Thank you for your generous giving. God bless you.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Go to Homepage</a>
                    </div>
                @else
                    <div class="wow fadeIn" data-wow-delay="0.1s">
                        <h1 class="display-3 text-danger animated zoomIn">Payment Failed</h1>
                        <p class="fs-5 animated zoomIn">Unfortunately, your payment could not be processed. Please try again.</p>
                        <a href="{{ route('giving.form') }}" class="btn btn-primary">Try Again</a>
                    </div>
                @endif
            </div>
        </div>
        <!-- Confirmation End -->

@endsection
