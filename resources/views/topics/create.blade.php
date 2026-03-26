@extends('layouts.admin')

@section('title', 'Add Topic')

@section('content')
    <h1>Add Topic</h1>

    <form action="{{ route('topics.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="topic" class="form-label">Topic</label>
            <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" value="{{ old('topic') }}">
            @error('topic')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department') }}">
            @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                <option value="">Select Level</option>
                <option value="ND" {{ old('level') == 'ND' ? 'selected' : '' }}>ND</option>
                <option value="HND" {{ old('level') == 'HND' ? 'selected' : '' }}>HND</option>
            </select>
            @error('level')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Topic</button>
    </form>
@endsection
