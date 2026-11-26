@extends('admin.layout.app')
@section('title', 'Edit Registration - Admin')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Edit Registration</h3>
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
                    <span>Edit Registration</span>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Editing Registration for {{ $registration->name }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.registrations.update', $registration->id) }}" method="POST">
                            @csrf
                            @method('PUT')

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

                            <!-- Personal Information Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold">Personal Information</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $registration->name) }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male" @selected(old('gender', $registration->gender) === 'Male')>Male</option>
                                        <option value="Female" @selected(old('gender', $registration->gender) === 'Female')>Female</option>
                                        <option value="Other" @selected(old('gender', $registration->gender) === 'Other')>Other</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="date_of_birth" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $registration->date_of_birth) }}" required>
                                    @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="marital_status" class="form-label">Marital Status <span class="text-danger">*</span></label>
                                    <select class="form-select @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status" required>
                                        <option value="">Select Status</option>
                                        <option value="Single" @selected(old('marital_status', $registration->marital_status) === 'Single')>Single</option>
                                        <option value="Married" @selected(old('marital_status', $registration->marital_status) === 'Married')>Married</option>
                                        <option value="Divorced" @selected(old('marital_status', $registration->marital_status) === 'Divorced')>Divorced</option>
                                        <option value="Widowed" @selected(old('marital_status', $registration->marital_status) === 'Widowed')>Widowed</option>
                                    </select>
                                    @error('marital_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $registration->phone) }}" required>
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $registration->email) }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="country_of_residence" class="form-label">Country <span class="text-danger">*</span></label>
                                    <select class="form-select @error('country_of_residence') is-invalid @enderror" id="country_of_residence" name="country_of_residence" required onchange="loadStates()">
                                        <option value="">Select Country</option>
                                        @php
                                        $nigeria = $countries->firstWhere('sortname', 'NG');
                                        $otherCountries = $countries->where('sortname', '!=', 'NG');
                                        @endphp
                                        @if ($nigeria)
                                        <option value="{{ $nigeria->id }}" data-sortname="{{ $nigeria->sortname }}" @selected(old('country_of_residence', $registration->country_of_residence) == $nigeria->id)>{{ $nigeria->name }}</option>
                                        @endif
                                        @foreach ($otherCountries as $country)
                                        <option value="{{ $country->id }}" data-sortname="{{ $country->sortname }}" @selected(old('country_of_residence', $registration->country_of_residence) == $country->id)>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_of_residence')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3" id="state-field" style="display: none;">
                                    <label for="state_city" class="form-label">State / City <span class="text-danger">*</span></label>
                                    <select class="form-select @error('state_city') is-invalid @enderror" id="state_city" name="state_city">
                                        <option value="">Select State/City</option>
                                    </select>
                                    @error('state_city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="home_address" class="form-label">Home Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('home_address') is-invalid @enderror" id="home_address" name="home_address" rows="2" required>{{ old('home_address', $registration->home_address) }}</textarea>
                                    @error('home_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Church Information Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold">Church Information</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="howm_member" class="form-label">HOWM Member? <span class="text-danger">*</span></label>
                                    <select class="form-select @error('howm_member') is-invalid @enderror" id="howm_member" name="howm_member" required onchange="toggleHowmBranch()">
                                        <option value="">Select</option>
                                        <option value="yes" @selected(old('howm_member', $registration->howm_member) === 'yes')>Yes</option>
                                        <option value="no" @selected(old('howm_member', $registration->howm_member) === 'no')>No</option>
                                    </select>
                                    @error('howm_member')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3" id="branch-field" style="display: none;">
                                    <label for="howm_branch" class="form-label">Branch <span class="text-danger">*</span></label>
                                    <select class="form-select @error('howm_branch') is-invalid @enderror" id="howm_branch" name="howm_branch">
                                        <option value="">Select Branch</option>
                                        <option value="Headquarters" @selected(old('howm_branch', $registration->howm_branch) === 'Headquarters')>Headquarters</option>
                                        <option value="Minna" @selected(old('howm_branch', $registration->howm_branch) === 'Minna')>Minna</option>
                                        <option value="Army Signal" @selected(old('howm_branch', $registration->howm_branch) === 'Army Signal')>Army Signal</option>
                                        <option value="Zango" @selected(old('howm_branch', $registration->howm_branch) === 'Zango')>Zango</option>
                                        <option value="Crusher" @selected(old('howm_branch', $registration->howm_branch) === 'Crusher')>Crusher</option>
                                        <option value="Okene" @selected(old('howm_branch', $registration->howm_branch) === 'Okene')>Okene</option>
                                    </select>
                                    @error('howm_branch')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3" id="church-field" style="display: none;">
                                    <label for="home_church" class="form-label">Home Church <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('home_church') is-invalid @enderror" id="home_church" name="home_church" value="{{ old('home_church', $registration->home_church) }}">
                                    @error('home_church')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Attendance Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold">Attendance Details</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="attendance_type" class="form-label">Attendance Type <span class="text-danger">*</span></label>
                                    <select class="form-select @error('attendance_type') is-invalid @enderror" id="attendance_type" name="attendance_type" required>
                                        <option value="">Select</option>
                                        <option value="onsite" @selected(old('attendance_type', $registration->attendance_type) === 'onsite')>Onsite</option>
                                        <option value="online" @selected(old('attendance_type', $registration->attendance_type) === 'online')>Online</option>
                                    </select>
                                    @error('attendance_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="accommodation_needed" class="form-label">Do you require accommodation? <span class="text-danger">*</span></label>
                                    <select class="form-select @error('accommodation_needed') is-invalid @enderror" id="accommodation_needed" name="accommodation_needed" required>
                                        <option value="">Select Option</option>
                                        <option value="yes" @selected(old('accommodation_needed', $registration->accommodation_needed) === 'yes')>Yes</option>
                                        <option value="no" @selected(old('accommodation_needed', $registration->accommodation_needed) === 'no')>No</option>
                                    </select>
                                    @error('accommodation_needed')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Emergency Contact Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold">Emergency Contact</h6>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="emergency_contact_name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('emergency_contact_name') is-invalid @enderror" id="emergency_contact_name" name="emergency_contact_name" value="{{ old('emergency_contact_name', $registration->emergency_contact_name) }}" required>
                                    @error('emergency_contact_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="emergency_contact_relationship" class="form-label">Relationship <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('emergency_contact_relationship') is-invalid @enderror" id="emergency_contact_relationship" name="emergency_contact_relationship" value="{{ old('emergency_contact_relationship', $registration->emergency_contact_relationship) }}" required>
                                    @error('emergency_contact_relationship')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="emergency_contact_phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('emergency_contact_phone') is-invalid @enderror" id="emergency_contact_phone" name="emergency_contact_phone" value="{{ old('emergency_contact_phone', $registration->emergency_contact_phone) }}" required>
                                    @error('emergency_contact_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Volunteering Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="text-primary fw-bold">Volunteering (Optional)</h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="willing_to_volunteer" class="form-label">Willing to Volunteer? <span class="text-danger">*</span></label>
                                    <select class="form-select @error('willing_to_volunteer') is-invalid @enderror" id="willing_to_volunteer" name="willing_to_volunteer" required onchange="togglePreferredDept()">
                                        <option value="">Select</option>
                                        <option value="yes" @selected(old('willing_to_volunteer', $registration->willing_to_volunteer) === 'yes')>Yes</option>
                                        <option value="no" @selected(old('willing_to_volunteer', $registration->willing_to_volunteer) === 'no')>No</option>
                                    </select>
                                    @error('willing_to_volunteer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3" id="dept-field" style="display: none;">
                                    <label for="preferred_department" class="form-label">Preferred Department <span class="text-danger">*</span></label>
                                    <select class="form-select @error('preferred_department') is-invalid @enderror" id="preferred_department" name="preferred_department">
                                        <option value="">Select</option>
                                        <option value="Protocol" @selected(old('preferred_department', $registration->preferred_department) === 'Protocol')>Protocol</option>
                                        <option value="Ushering" @selected(old('preferred_department', $registration->preferred_department) === 'Ushering')>Ushering</option>
                                        <option value="Media" @selected(old('preferred_department', $registration->preferred_department) === 'Media')>Media</option>
                                        <option value="Choir" @selected(old('preferred_department', $registration->preferred_department) === 'Choir')>Choir</option>
                                    </select>
                                    @error('preferred_department')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="fas fa-save me-2"></i>Update Registration
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.events.registration_desk', $registration->event_id) }}" class="btn btn-outline-secondary w-100">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
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
                        const oldValue = `{{ old('state_city', $registration->state_city) }}`;
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