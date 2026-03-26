@extends('layouts.admin')

@section('title', 'Edit Student')

@section('content')
    <h1>Edit Student</h1>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" value="{{ old('fullname', $student->fullname) }}">
            @error('fullname')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="matric_no" class="form-label">Matric No</label>
            <input type="text" class="form-control @error('matric_no') is-invalid @enderror" id="matric_no" name="matric_no" value="{{ old('matric_no', $student->matric_no) }}">
            @error('matric_no')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $student->phone) }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department', $student->department) }}">
            @error('department')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                <option value="ND" {{ old('level', $student->level) == 'ND' ? 'selected' : '' }}>ND</option>
                <option value="HND" {{ old('level', $student->level) == 'HND' ? 'selected' : '' }}>HND</option>
            </select>
            @error('level')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supervisor" class="form-label">Supervisor</label>
            <input type="text" class="form-control @error('supervisor') is-invalid @enderror" id="supervisor" name="supervisor" value="{{ old('supervisor', $student->supervisor) }}">
            @error('supervisor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
@endsection
