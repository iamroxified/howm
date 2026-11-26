@extends('layouts.app') {{-- Assuming you have a layout file --}}
@section('title', $book->bk_title)
@section('content')
<div class="container-fluid hero-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-header-inner animated zoomIn">
                    <h1 class="display-1 text-dark">Books</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Books</a></li>
                        <li class="breadcrumb-item text-dark" aria-current="page">{{ $book->bk_title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid ">
        <div class="container ">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Payment Successful') }}</div>

                <div class="card-body text-center">
                    <div class="alert alert-success">
                        <h4 class="alert-heading">Thank You!</h4>
                        <p>Your payment was successful and your order has been placed.</p>
                        <p>A copy of the book has been sent to your email address: <strong>{{ $order->email }}</strong>.</p>
                    </div>

                    @if($downloadLink)
                        <p>You can also download your book here:</p>
                        <a href="{{ $downloadLink }}" class="btn btn-primary" download>Download {{ $book->bk_title }}</a>
                    @endif

                    <hr>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
