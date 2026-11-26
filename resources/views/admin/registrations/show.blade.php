@extends('admin.layout.app')
@section('title', 'View Registration - Admin')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">View Registration</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('admin.index') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.events.index') }}">All Events</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.events.registration_desk', $registration->event_id) }}">Registration Desk</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <span>View Registration</span>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Registration Details for {{ $registration->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> {{ $registration->name }}</p>
                                <p><strong>Email:</strong> {{ $registration->email }}</p>
                                <p><strong>Phone:</strong> {{ $registration->phone }}</p>
                                <p><strong>Gender:</strong> {{ $registration->gender }}</p>
                                <p><strong>Date of Birth:</strong> {{ $registration->date_of_birth }}</p>
                                <p><strong>Marital Status:</strong> {{ $registration->marital_status }}</p>
                                <p><strong>Address:</strong> {{ $registration->home_address }}</p>
                                <p><strong>Country:</strong> {{ $registration->country->name }}</p>
                                @if($registration->state)
                                <p><strong>State:</strong> {{ $registration->state->name }}</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p><strong>HOWM Member:</strong> {{ $registration->howm_member }}</p>
                                @if($registration->howm_member == 'yes')
                                <p><strong>Branch:</strong> {{ $registration->howm_branch }}</p>
                                @else
                                <p><strong>Home Church:</strong> {{ $registration->home_church }}</p>
                                @endif
                                <p><strong>Attendance Type:</strong> {{ $registration->attendance_type }}</p>
                                <p><strong>Accommodation Needed:</strong> {{ $registration->accommodation_needed }}</p>
                                <p><strong>Willing to Volunteer:</strong> {{ $registration->willing_to_volunteer }}</p>
                                @if($registration->willing_to_volunteer == 'yes')
                                <p><strong>Preferred Department:</strong> {{ $registration->preferred_department }}</p>
                                @endif
                                <p><strong>Emergency Contact Name:</strong> {{ $registration->emergency_contact_name }}</p>
                                <p><strong>Emergency Contact Relationship:</strong> {{ $registration->emergency_contact_relationship }}</p>
                                <p><strong>Emergency Contact Phone:</strong> {{ $registration->emergency_contact_phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.registrations.edit', $registration->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('admin.events.registration_desk', $registration->event_id) }}" class="btn btn-secondary">Back to Registration Desk</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
