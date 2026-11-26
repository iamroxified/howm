@extends('layouts.app')

@section('title', 'WINAC 2025 Registration')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid hero-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-header-inner animated zoomIn">
                        <h1 class="display-6 text-dark">WINAC 2025 Registration</h1>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Events</a></li>
                            <li class="breadcrumb-item text-dark" aria-current="page">WINAC 2025</li>
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
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ $event->evn_title }} - Registration Form</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h6 class="mb-2">Please fix the following errors:</h6>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('event_registration.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="event_id" value="{{ $event->id }}">

                            <!-- Personal Information Section -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Personal Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                                                <option value="Female" @selected(old('gender') === 'Female')>Female</option>

                                            </select>
                                            @error('gender')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="date_of_birth" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                                            @error('date_of_birth')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="marital_status" class="form-label">Marital Status <span class="text-danger">*</span></label>
                                            <select class="form-select @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status" required>
                                                <option value="">Select Status</option>
                                                <option value="Single" @selected(old('marital_status') === 'Single')>Single</option>
                                                <option value="Married" @selected(old('marital_status') === 'Married')>Married</option>
                                                <option value="Divorced" @selected(old('marital_status') === 'Divorced')>Divorced</option>
                                                <option value="Widowed" @selected(old('marital_status') === 'Widowed')>Widowed</option>
                                            </select>
                                            @error('marital_status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="country_of_residence" class="form-label">Country of Residence <span class="text-danger">*</span></label>
                                            <select class="form-select @error('country_of_residence') is-invalid @enderror" id="country_of_residence" name="country_of_residence" required onchange="loadStates()">
                                                <option value="">Select Country</option>
                                                @php
                                                    $nigeria = $countries->firstWhere('sortname', 'NG');
                                                    $otherCountries = $countries->where('sortname', '!=', 'NG');
                                                @endphp
                                                @if($nigeria)
                                                    <option value="{{ $nigeria->id }}" data-sortname="{{ $nigeria->sortname }}" @selected(old('country_of_residence') == $nigeria->id)>{{ $nigeria->name }}</option>
                                                @endif
                                                @foreach($otherCountries as $country)
                                                    <option value="{{ $country->id }}" data-sortname="{{ $country->sortname }}" @selected(old('country_of_residence') == $country->id)>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_of_residence')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3" id="state-field" style="display: none;">
                                            <label for="state_city" class="form-label">State <span class="text-danger">*</span></label>
                                            <select class="form-select @error('state_city') is-invalid @enderror" id="state_city" name="state_city">
                                                <option value="">Select State/City</option>
                                            </select>
                                            @error('state_city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="home_address" class="form-label">Home Address <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('home_address') is-invalid @enderror" id="home_address" name="home_address" rows="2" required>{{ old('home_address') }}</textarea>
                                        @error('home_address')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Church Information Section -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Church Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="howm_member" class="form-label">Are you a member of HOWM? <span class="text-danger">*</span></label>
                                            <select class="form-select @error('howm_member') is-invalid @enderror" id="howm_member" name="howm_member" required onchange="toggleHowmBranch()">
                                                <option value="">Select Option</option>
                                                <option value="yes" @selected(old('howm_member') === 'yes')>Yes</option>
                                                <option value="no" @selected(old('howm_member') === 'no')>No</option>
                                            </select>
                                            @error('howm_member')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3" id="branch-field" style="display: none;">
                                            <label for="howm_branch" class="form-label">Which Branch? <span class="text-danger">*</span></label>
                                            <select class="form-select @error('howm_branch') is-invalid @enderror" id="howm_branch" name="howm_branch">
                                                <option value="">Select Branch</option>
                                                @foreach(['Headquarters', 'Minna', 'Army Signal', 'Zango', 'Crusher', 'Okene'] as $branch)
                                                    <option value="{{ $branch }}" @selected(old('howm_branch') === $branch)>{{ $branch }}</option>
                                                @endforeach
                                            </select>
                                            @error('howm_branch')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3" id="church-field" style="display: none;">
                                            <label for="home_church" class="form-label">Name of Home Church <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('home_church') is-invalid @enderror" id="home_church" name="home_church" value="{{ old('home_church') }}">
                                            @error('home_church')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Attendance Details Section -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Attendance Details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="attendance_type" class="form-label">Will you attend onsite or online? <span class="text-danger">*</span></label>
                                            <select class="form-select @error('attendance_type') is-invalid @enderror" id="attendance_type" name="attendance_type" required>
                                                <option value="">Select Option</option>
                                                <option value="onsite" @selected(old('attendance_type') === 'onsite')>Onsite</option>
                                                <option value="online" @selected(old('attendance_type') === 'online')>Online</option>
                                            </select>
                                            @error('attendance_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="accommodation_needed" class="form-label">Do you require accommodation? <span class="text-danger">*</span></label>
                                            <select class="form-select @error('accommodation_needed') is-invalid @enderror" id="accommodation_needed" name="accommodation_needed" required>
                                                <option value="">Select Option</option>
                                                <option value="yes" @selected(old('accommodation_needed') === 'yes')>Yes</option>
                                                <option value="no" @selected(old('accommodation_needed') === 'no')>No</option>
                                            </select>
                                            @error('accommodation_needed')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- Emergency Information Section -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Emergency Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="emergency_contact_name" class="form-label">Emergency Contact Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('emergency_contact_name') is-invalid @enderror" id="emergency_contact_name" name="emergency_contact_name" value="{{ old('emergency_contact_name') }}" required>
                                            @error('emergency_contact_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="emergency_contact_relationship" class="form-label">Relationship <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('emergency_contact_relationship') is-invalid @enderror" id="emergency_contact_relationship" name="emergency_contact_relationship" value="{{ old('emergency_contact_relationship') }}" required>
                                            @error('emergency_contact_relationship')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="emergency_contact_phone" class="form-label">Emergency Contact Phone Number <span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control @error('emergency_contact_phone') is-invalid @enderror" id="emergency_contact_phone" name="emergency_contact_phone" value="{{ old('emergency_contact_phone') }}" required>
                                            @error('emergency_contact_phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--
                            <!-- Special Needs Section -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">5. Special Needs</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="medical_conditions" class="form-label">Do you have any medical conditions?</label>
                                        <textarea class="form-control @error('medical_conditions') is-invalid @enderror" id="medical_conditions" name="medical_conditions" rows="2" placeholder="Please describe any medical conditions...">{{ old('medical_conditions') }}</textarea>
                                        @error('medical_conditions')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="dietary_restrictions" class="form-label">Do you have any dietary restrictions?</label>
                                        <textarea class="form-control @error('dietary_restrictions') is-invalid @enderror" id="dietary_restrictions" name="dietary_restrictions" rows="2" placeholder="Please describe any dietary restrictions...">{{ old('dietary_restrictions') }}</textarea>
                                        @error('dietary_restrictions')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Volunteering Section -->
                            <div class="card mb-3">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">Volunteering (Optional)</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="willing_to_volunteer" class="form-label">Are you willing to volunteer during WINAC 2025? <span class="text-danger">*</span></label>
                                            <select class="form-select @error('willing_to_volunteer') is-invalid @enderror" id="willing_to_volunteer" name="willing_to_volunteer" required onchange="togglePreferredDept()">
                                                <option value="">Select Option</option>
                                                <option value="yes" @selected(old('willing_to_volunteer') === 'yes')>Yes</option>
                                                <option value="no" @selected(old('willing_to_volunteer') === 'no')>No</option>
                                            </select>
                                            @error('willing_to_volunteer')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                        <div class="col-md-6 mb-3" id="dept-field" style="display: none;">
                                            <label for="preferred_department" class="form-label">Preferred Department <span class="text-danger">*</span></label>
                                            <select class="form-select @error('preferred_department') is-invalid @enderror" id="preferred_department" name="preferred_department">
                                                <option value="">Select Department</option>
                                                @foreach(['Protocol', 'Ushering', 'Media', 'Choir', 'Welfare', 'Prayer', 'Technical'] as $dept)
                                                    <option value="{{ $dept }}" @selected(old('preferred_department') === $dept)>{{ $dept }}</option>
                                                @endforeach
                                            </select>
                                            @error('preferred_department')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Consent & Agreement Section -->
                            <div class="card mb-3">

                                <div class="card-body">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input @error('contact_consent') is-invalid @enderror" type="checkbox" id="contact_consent" name="contact_consent" value="1" @checked(old('contact_consent')) required>
                                        <label class="form-check-label" for="contact_consent">
                                            I agree to be contacted by HOWM <span class="text-danger">*</span>
                                        </label>
                                        @error('contact_consent')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input @error('information_correct') is-invalid @enderror" type="checkbox" id="information_correct" name="information_correct" value="1" @checked(old('information_correct')) required>
                                        <label class="form-check-label" for="information_correct">
                                            I agree that all information provided above is correct and complete <span class="text-danger">*</span>
                                        </label>
                                        @error('information_correct')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Submit Registration</button>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleHowmBranch() {
            const member = document.getElementById('howm_member').value;
            document.getElementById('branch-field').style.display = member === 'yes' ? 'block' : 'none';
            document.getElementById('church-field').style.display = member === 'no' ? 'block' : 'none';
        }

        function togglePreferredDept() {
            const volunteer = document.getElementById('willing_to_volunteer').value;
            document.getElementById('dept-field').style.display = volunteer === 'yes' ? 'block' : 'none';
        }

        function loadStates() {
            const countrySelect = document.getElementById('country_of_residence');
            const stateSelect = document.getElementById('state_city');
            const stateField = document.getElementById('state-field');
            const countryId = countrySelect.value;
            const selectedOption = countrySelect.options[countrySelect.selectedIndex];
            const sortname = selectedOption.dataset.sortname;

            // Clear existing states
            stateSelect.innerHTML = '<option value="">Select State/City</option>';

            // Only show state field for Nigeria (NG)
            if (sortname === 'NG') {
                stateField.style.display = 'block';
                stateSelect.required = true;

                // Fetch states for Nigeria
                if (countryId) {
                    fetch(`/api/countries/${countryId}/states`)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(state => {
                                const option = document.createElement('option');
                                option.value = state.id;
                                option.textContent = state.name;
                                stateSelect.appendChild(option);
                            });

                            // If there's an old value, select it
                            const oldValue = `{{ old('state_city') }}`;
                            if (oldValue) {
                                stateSelect.value = oldValue;
                            }
                        })
                        .catch(error => console.error('Error loading states:', error));
                }
            } else {
                stateField.style.display = 'none';
                stateSelect.required = false;
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            toggleHowmBranch();
            togglePreferredDept();

            // Load states if country was already selected (e.g., on form validation error)
            const countryId = document.getElementById('country_of_residence').value;
            if (countryId) {
                loadStates();
            }
        });
    </script>
@endsection
