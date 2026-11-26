@extends('layouts.app')

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
                        <li class="breadcrumb-item text-dark" aria-current="page">Books</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <img src="{{ asset('books/' . $book->bk_img) }}" class="img-fluid w-100" alt="{{ $book->bk_title }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 mb-4">{{ $book->bk_title }}</h1>
                    <p class="mb-4">{{ $book->bk_desc }}</p>
                    <h3 class="mb-4">{{ $book->bk_amount > 0 ? 'N' . number_format($book->bk_amount, 2) : 'Free' }}</h3>

                    @if($book->bk_amount > 0)
                        <a href="{{ route('books.checkout', $book->id) }}" class="btn btn-primary py-3 px-5">Purchase Now</a>
                    @else
                        <form action="{{ route('books.purchase', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary py-3 px-5">Download Now</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
