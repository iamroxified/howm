@extends('layouts.admin')

@section('title', 'Students')

@section('content')
    <h1>Students</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add Student</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Matric No</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Level</th>

                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $totalStudents = 0;
            $totalND = 0;
            $totalHND = 0;
            @endphp
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->fullname }}</td>
                    <td>{{ $student->matric_no }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->department }}</td>
                    <td>{{ $student->level }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
