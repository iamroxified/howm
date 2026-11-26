@extends('admin.layout.app')

@section('title', $entry->exists ? 'Edit DCG entry' : 'Add DCG entry')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">{{ $entry->exists ? 'Edit DCG entry' : 'Add DCG entry' }}</h3>
            </div>

            <div class="card">
                <div class="card-body">
                    <form
                        method="POST"
                        action="{{ $entry->exists ? route('admin.dcg.update', $entry) : route('admin.dcg.store') }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @if ($entry->exists)
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input id="title" name="title" type="text" class="form-control" value="{{ old('title', $entry->title) }}" required maxlength="255">
                            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input id="date" name="date" type="date" class="form-control" value="{{ old('date', $entry->date?->format('Y-m-d') ?? now()->toDateString()) }}" required>
                            @error('date') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Content type</label>
                            <select id="type" name="type" class="form-control" required>
                                @foreach (['image' => 'Image', 'pdf' => 'PDF', 'writeup' => 'Writeup'] as $value => $label)
                                    <option value="{{ $value }}" @selected(old('type', $entry->type ?: 'writeup') === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('type') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group" id="file-field">
                            <label for="file">Image or PDF file (required for image and PDF entries)</label>
                            <input id="file" name="file" type="file" class="form-control" accept="image/jpeg,image/png,image/gif,image/webp,application/pdf">
                            <small class="form-text text-muted">Images and PDFs up to 10 MB. Upload a replacement when changing an existing file.</small>
                            @error('file') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group" id="content-field">
                            <label for="content">Writeup (required for writeup entries)</label>
                            <textarea id="content" name="content" rows="10" class="form-control">{{ old('content', $entry->content) }}</textarea>
                            @error('content') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-success">{{ $entry->exists ? 'Save changes' : 'Create entry' }}</button>
                        <a href="{{ route('admin.dcg.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
