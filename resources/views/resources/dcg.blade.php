<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Communion with God</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <main class="container py-5">
        <header class="mb-5">
            <p class="text-uppercase text-primary fw-semibold mb-2">Resources</p>
            <h1>Daily Communion with God</h1>
            <p class="lead text-muted">Daily reflections, scriptures, and resources to grow in faith.</p>
        </header>

        <div class="row g-4">
            @forelse ($entries as $entry)
                <article class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <p class="text-muted mb-2">{{ $entry->date->format('F j, Y') }}</p>
                            <h2 class="h4">{{ $entry->title }}</h2>

                            @if ($entry->type === 'writeup')
                                <div class="mt-3" style="white-space: pre-line">{{ $entry->content }}</div>
                            @elseif ($entry->type === 'image')
                                <img
                                    src="{{ route('resources.dcg.file', $entry) }}"
                                    alt="{{ $entry->title }}"
                                    class="img-fluid rounded mt-3"
                                    loading="lazy"
                                >
                            @else
                                <a href="{{ route('resources.dcg.file', $entry) }}" class="btn btn-outline-primary mt-2" target="_blank" rel="noopener">
                                    View or download PDF
                                </a>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No DCG resources have been published yet. Please check back soon.</div>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $entries->links() }}
        </div>
    </main>
</body>
</html>
