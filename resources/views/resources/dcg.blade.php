@extends('layouts.app')

@section('title', 'Daily Communion with God | HOWM')

@section('content')
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-1 text-dark">Daily Communion with God</h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item">Resources</li>
                            <li class="breadcrumb-item text-dark" aria-current="page">DCG</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="container-fluid py-5">
        <div class="container">
            <div class="mb-5">
                <p class="fs-5 text-uppercase text-primary mb-2">Resources</p>
                <h2 class="display-5 mb-3">Daily reflections for your walk with God</h2>
                <p class="mb-0">Read or download the latest Daily Communion with God resources.</p>
            </div>

            <div class="row g-4">
                @forelse ($entries as $entry)
                    <article class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4 p-lg-5">
                                <p class="text-primary mb-2">
                                    <i class="far fa-calendar-alt me-2" aria-hidden="true"></i>
                                    {{ $entry->date->format('F j, Y') }}
                                </p>
                                <h3 class="h2 mb-3">{{ $entry->title }}</h3>

                                @if ($entry->type === 'writeup')
                                    <div class="lh-lg" style="white-space: pre-line">{{ $entry->content }}</div>
                                @elseif ($entry->type === 'image')
                                    <img
                                        src="{{ route('resources.dcg.file', $entry) }}"
                                        alt="{{ $entry->title }}"
                                        class="img-fluid rounded"
                                        loading="lazy"
                                        style="max-height: 640px; object-fit: contain"
                                    >
                                @else
                                    <a
                                        href="{{ route('resources.dcg.file', $entry) }}"
                                        class="btn btn-primary px-4 py-2"
                                        target="_blank"
                                        rel="noopener"
                                    >
                                        <i class="far fa-file-pdf me-2" aria-hidden="true"></i>
                                        View or download PDF
                                    </a>
                                @endif
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-12">
                        <div class="bg-light rounded p-4 p-lg-5">
                            <h3 class="h4">No DCG resources have been published yet</h3>
                            <p class="mb-0">Please check back soon for the latest daily reflection.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $entries->links() }}
            </div>
        </div>
    </section>
@endsection
