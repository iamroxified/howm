@extends('layouts.app')

@section('title', 'Registration Confirmation')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-6 text-dark">Registration Confirmed</h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                            <li class="breadcrumb-item text-dark" aria-current="page">Confirmation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Success Message -->
                <div class="card border-success mb-4 shadow-sm">
                    <div class="card-body text-center py-5">
                        <div class="mb-3">
                            <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h2 class="card-title text-success mb-2">Thank You for Registering!</h2>
                        <p class="card-text lead mb-0">Your registration for <strong>{{ $event->evn_title }}</strong> has been successfully submitted.</p>
                    </div>
                </div>

                <!-- Registration Details -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Registration Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 class="text-muted">Registration ID</h6>
                                <p class="lead"><code>{{ $registration->registration_code ?? ('HOWM/' . $registration->created_at->format('Y') . '/' . $event->id . '/' . $registration->id) }}</code></p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted">Event</h6>
                                <p class="lead">{{ $event->evn_title }}</p>
                            </div>
                        </div>
                        <hr>

                        <!-- Personal Information -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-3">
                                <i class="fas fa-user-circle me-2"></i>Personal Information
                            </h6>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>Full Name:</strong> {{ $registration->name }}
                                </div>
                                <div class="col-md-6 mb-2">
                                    <strong>Gender:</strong> {{ $registration->gender }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>Date of Birth:</strong> {{ $registration->date_of_birth->format('M d, Y') }}
                                </div>
                                <div class="col-md-6 mb-2">
                                    <strong>Marital Status:</strong> {{ $registration->marital_status }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>Email:</strong> <a href="mailto:{{ $registration->email }}">{{ $registration->email }}</a>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <strong>Phone:</strong> <a href="tel:{{ $registration->phone }}">{{ $registration->phone }}</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>Country:</strong> {{ $registration->country_of_residence }}
                                </div>
                                <div class="col-md-6 mb-2">
                                    <strong>State / City:</strong> {{ $registration->state_city }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <strong>Home Address:</strong> {{ $registration->home_address }}
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Church Information -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-3">
                                <i class="fas fa-church me-2"></i>Church Information
                            </h6>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>HOWM Member:</strong> <span class="badge bg-{{ $registration->howm_member === 'yes' ? 'success' : 'info' }}">{{ ucfirst($registration->howm_member) }}</span>
                                </div>
                                @if($registration->howm_member === 'yes')
                                    <div class="col-md-6 mb-2">
                                        <strong>Branch:</strong> {{ $registration->howm_branch }}
                                    </div>
                                @else
                                    <div class="col-md-6 mb-2">
                                        <strong>Home Church:</strong> {{ $registration->home_church }}
                                    </div>
                                @endif
                            </div>

                        </div>

                        <hr>

                        <!-- Attendance Details -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-3">
                                <i class="fas fa-calendar-alt me-2"></i>Attendance Details
                            </h6>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>Attendance Type:</strong> <span class="badge bg-primary">{{ ucfirst($registration->attendance_type) }}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>Accommodation Needed:</strong> <span class="badge bg-{{ $registration->accommodation_needed === 'yes' ? 'warning' : 'secondary' }}">{{ ucfirst($registration->accommodation_needed) }}</span>
                                </div>

                            </div>
                        </div>

                        <hr>

                        <!-- Emergency Information -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-3">
                                <i class="fas fa-exclamation-triangle me-2"></i>Emergency Information
                            </h6>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>Emergency Contact Name:</strong> {{ $registration->emergency_contact_name }}
                                </div>
                                <div class="col-md-6 mb-2">
                                    <strong>Relationship:</strong> {{ $registration->emergency_contact_relationship }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>Emergency Phone:</strong> <a href="tel:{{ $registration->emergency_contact_phone }}">{{ $registration->emergency_contact_phone }}</a>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Volunteering -->
                        <div class="mb-4">
                            <h6 class="text-primary fw-bold mb-3">
                                <i class="fas fa-hands-helping me-2"></i>Volunteering
                            </h6>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <strong>Willing to Volunteer:</strong> <span class="badge bg-{{ $registration->willing_to_volunteer === 'yes' ? 'success' : 'secondary' }}">{{ ucfirst($registration->willing_to_volunteer) }}</span>
                                </div>
                                @if($registration->willing_to_volunteer === 'yes')
                                    <div class="col-md-6 mb-2">
                                        <strong>Preferred Department:</strong> {{ $registration->preferred_department }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>

                        <!-- Submitted Date -->
                        <div class="text-center text-muted mt-4">
                            <small>Submitted on {{ $registration->created_at->format('F d, Y \a\t g:i A') }}</small>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary w-100">
                            <i class="fas fa-arrow-left me-2"></i>Back to Event
                        </a>
                    </div>
                    <div class="col-md-6 mb-3">
                        <a href="{{ route('events.index') }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-calendar-alt me-2"></i>View All Events
                        </a>
                    </div>
                </div>

                <!-- Important Note -->
                <div class="alert alert-info mt-4" role="alert">
                    <h6 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Important</h6>
                    <p class="mb-0">A confirmation email has been sent to <strong>{{ $registration->email }}</strong>. Please check your inbox for further instructions and event details.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
