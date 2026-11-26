@extends('layouts.app')

@section('title', 'Give Now - Habitation of Winners Ministry Inc.')
@section('content')

        <!-- Hero Start -->
        <div class="container-fluid hero-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-header-inner animated zoomIn">
                            <h1 class="display-1 text-dark">Give Now</h1>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('give') }}">Give</a></li>
                                <li class="breadcrumb-item text-dark" aria-current="page">Give Now</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Giving Form Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mx-auto mb-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                            <p class="fs-5 text-uppercase text-primary animated zoomIn">Give Online</p>
                            <h1 class="display-3 animated zoomIn">Enter Your Details</h1>
                        </div>
                        <div class="wow fadeIn" data-wow-delay="0.3s">
                            <form action="{{ route('giving.pay') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" required>
                                            <label for="amount">Amount (NGN)</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Proceed to Payment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Giving Form End -->

@endsection
