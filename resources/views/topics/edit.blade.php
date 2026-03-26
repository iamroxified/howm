@extends('layouts.admin')

@section('title', 'Edit Topic')

@section('content')
    <h1>Edit Topic</h1>

    <form action="{{ route('topics.update', $topic) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="topic" class="form-label">Topic Name</label>
            <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ old('topic', $topic->topic) }}">
            @error('topic')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department', $topic->department) }}">
            @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                <option value="ND" {{ old('level', $topic->level) == 'ND' ? 'selected' : '' }}>ND</option>
                <option value="HND" {{ old('level', $topic->level) == 'HND' ? 'selected' : '' }}>HND</option>
            </select>
            @error('level')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Topic</button>
    </form>
@endsection