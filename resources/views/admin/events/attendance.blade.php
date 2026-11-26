@extends('admin.layout.app')
@section('title', 'Mark Attendance - Admin')
@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Mark Attendance - {{ $event->evn_title }}</h3>
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
                    <a href="{{ route('admin.events.show', $event->id) }}">Event Details</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <span>Mark Attendance</span>
                </li>
            </ul>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h5 class="mb-0">Select Date</h5>
                                <p class="text-muted small">Choose a date to view and mark attendance for that day</p>
                            </div>
                            <a href="{{ route('admin.events.registration_desk', $event->id) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus-circle me-1"></i>Register New Attendee
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <form id="attendanceDateForm" method="GET" action="{{ route('admin.events.attendance', $event->id) }}">
                                    <label for="attendance_date" class="form-label mb-1">Select Date</label>
                                    <input type="date" id="attendance_date" name="date" class="form-control" value="{{ $date }}" max="{{ now()->format('Y-m-d') }}">
                                </form>
                            </div>

                            @if($uniqueDates->isNotEmpty())
                                @foreach($uniqueDates as $day)
                                    <div class="col-md-4 mb-2">
                                        <a href="{{ route('admin.events.attendance', ['event' => $event->id, 'date' => $day]) }}"
                                           class="btn btn-outline-primary w-100 {{ $date === $day ? 'active' : '' }}">
                                            {{ $day }}
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted">No attendance days recorded</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Attendance for {{ $date }}</h5>
                            <span class="badge bg-primary">{{ $registrations->count() }} Registered</span>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($registrations->count() > 0)
                            <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="50">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Type</th>
                                            <th width="150">Check-in Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($registrations as $reg)
                                            @php
                                                $checkedArr = $reg->checked_in_dates ?? [];
                                                $dateKey = (string) $date;
                                                $isCheckedIn = false;
                                                $checkedAt = null;
                                                if (is_array($checkedArr)) {
                                                    if (array_key_exists($dateKey, $checkedArr)) {
                                                        $isCheckedIn = true;
                                                        $checkedAt = $checkedArr[$dateKey] ?? null;
                                                    } elseif (in_array($dateKey, $checkedArr)) {
                                                        // legacy numeric array format
                                                        $isCheckedIn = true;
                                                        $checkedAt = null;
                                                    }
                                                }
                                            @endphp
                                            <tr class="attendance-row" data-registration-id="{{ $reg->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <strong>{{ $reg->name }}</strong>
                                                </td>
                                                <td>
                                                    <a href="mailto:{{ $reg->email }}">{{ $reg->email }}</a>
                                                </td>
                                                <td>{{ $reg->phone }}</td>
                                                <td>
                                                    <span class="badge bg-{{ $reg->attendance_type === 'onsite' ? 'success' : 'info' }}">
                                                        {{ ucfirst($reg->attendance_type) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        @if($isCheckedIn)
                                                            <input class="form-check-input checkin-checkbox" type="checkbox" id="checkin-{{ $reg->id }}" data-registration-id="{{ $reg->id }}" data-date="{{ $date }}" checked disabled>
                                                            <label class="form-check-label" for="checkin-{{ $reg->id }}">
                                                                <span class="badge-text">Checked In</span>
                                                            </label>
                                                            @if($checkedAt)
                                                                <div class="ms-2 text-muted small">at {{ $checkedAt }}</div>
                                                            @endif
                                                            <button type="button" class="btn btn-link btn-sm text-danger undo-checkin" data-registration-id="{{ $reg->id }}" data-date="{{ $date }}">Undo</button>
                                                        @else
                                                            <input class="form-check-input checkin-checkbox" type="checkbox" id="checkin-{{ $reg->id }}" data-registration-id="{{ $reg->id }}" data-date="{{ $date }}">
                                                            <label class="form-check-label" for="checkin-{{ $reg->id }}">
                                                                <span class="badge-text">Not Checked In</span>
                                                            </label>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-3 d-flex justify-content-between align-items-center">
                                <div>
                                        <small class="text-muted">
                                        Checked In: <strong id="checkedInCount">{{ $registrations->filter(function($reg) use($date) { $checked = $reg->checked_in_dates ?? []; $dateKey = (string) $date; return is_array($checked) && (array_key_exists($dateKey, $checked) || in_array($dateKey, $checked)); })->count() }}</strong> / {{ $registrations->count() }}
                                    </small>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-sm btn-outline-success" id="checkAllBtn">
                                        <i class="fas fa-check-double me-1"></i>Check All
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" id="unCheckAllBtn">
                                        <i class="fas fa-times me-1"></i>Uncheck All
                                    </button>
                                    <a href="{{ route('admin.events.attendance_export', ['event' => $event->id, 'date' => $date]) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-download me-1"></i>Export CSV
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle me-2"></i>
                                No attendees registered for this date.
                                <a href="{{ route('admin.events.registration_desk', $event->id) }}" class="alert-link">Register an attendee</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Mark check-in via AJAX
    document.querySelectorAll('.checkin-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const registrationId = this.dataset.registrationId;
            const date = this.dataset.date;
            const isCheckedIn = this.checked;
            const self = this;

            fetch(`/admin/events/{{ $event->id }}/attendance/${registrationId}/checkin`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    date: date,
                    checked_in: isCheckedIn
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the count
                    updateCheckedInCount();

                    // Show toast notification
                    showNotification(data.message, 'success');

                    if (isCheckedIn) {
                        // disable checkbox and show timestamp + Undo button
                        self.checked = true;
                        self.disabled = true;
                        const parent = self.closest('td');
                        // remove existing timestamp/undo if any
                        const existingInfo = parent.querySelector('.checkin-info');
                        if (existingInfo) existingInfo.remove();
                        const info = document.createElement('div');
                        info.className = 'checkin-info ms-2';
                        info.innerHTML = `<div class="ms-2 text-muted small">at ${data.checked_in_at}</div><button type="button" class="btn btn-link btn-sm text-danger undo-checkin" data-registration-id="${registrationId}" data-date="${date}">Undo</button>`;
                        parent.appendChild(info);
                    } else {
                        // Unchecked (if enabled) - nothing special
                        self.checked = false;
                        self.disabled = false;
                        const parent = self.closest('td');
                        const existingInfo = parent.querySelector('.checkin-info');
                        if (existingInfo) existingInfo.remove();
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                this.checked = !this.checked; // Revert the checkbox
                showNotification('Error updating attendance', 'error');
            });
        });
    });

    // Undo checkin button (delegated)
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('undo-checkin')) {
            const btn = e.target;
            const registrationId = btn.dataset.registrationId;
            const date = btn.dataset.date;

            fetch(`/admin/events/{{ $event->id }}/attendance/${registrationId}/checkin`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ date: date, checked_in: false })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // find the checkbox and re-enable it
                    const checkbox = document.getElementById('checkin-' + registrationId);
                    if (checkbox) {
                        checkbox.checked = false;
                        checkbox.disabled = false;
                    }
                    // remove info panel
                    const info = btn.closest('.checkin-info');
                    if (info) info.remove();
                    updateCheckedInCount();
                    showNotification(data.message, 'success');
                } else {
                    showNotification(data.message || 'Error', 'error');
                }
            })
            .catch(err => {
                console.error(err);
                showNotification('Error updating attendance', 'error');
            });
        }
    });

    // Check all checkboxes
    document.getElementById('checkAllBtn').addEventListener('click', function() {
        document.querySelectorAll('.checkin-checkbox:not(:checked)').forEach(checkbox => {
            checkbox.click();
        });
    });

    // Uncheck all checkboxes
    document.getElementById('unCheckAllBtn').addEventListener('click', function() {
        document.querySelectorAll('.checkin-checkbox:checked').forEach(checkbox => {
            checkbox.click();
        });
    });

    // Auto-submit or redirect when date is changed
    const attendanceDate = document.getElementById('attendance_date');
    if (attendanceDate) {
        attendanceDate.addEventListener('change', function() {
            const selected = this.value;
            if (!selected) return;
            // Ensure we don't allow future dates
            const today = new Date().toISOString().split('T')[0];
            if (selected > today) {
                showNotification('Cannot select a future date', 'error');
                this.value = today;
                return;
            }
            // Redirect to attendance route with date as query param
            window.location.href = "{{ route('admin.events.attendance', $event->id) }}" + '?date=' + selected;
        });
    }

    // Update checked-in count
    function updateCheckedInCount() {
        const total = document.querySelectorAll('.checkin-checkbox').length;
        const checkedIn = document.querySelectorAll('.checkin-checkbox:checked').length;
        document.getElementById('checkedInCount').textContent = checkedIn;
    }

    // Show notification
    function showNotification(message, type) {
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const alertHtml = `
            <div class="alert ${alertClass} alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; z-index: 9999; min-width: 300px;" role="alert">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} me-2"></i>
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', alertHtml);

        // Auto-dismiss after 3 seconds
        setTimeout(() => {
            document.querySelector('.alert-dismissible').remove();
        }, 3000);
    }
</script>
@endsection
