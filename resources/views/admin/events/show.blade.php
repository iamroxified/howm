@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')

<div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Event Details</h3>
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
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">{{ $event->evn_title }}</div>
      </div>
      <div class="card-body">

       <div class="row mb-4">
        <div class="col-md-8">
         <h5>Event Information</h5>
         <table class="table table-bordered">
          <tr>
           <th width="200">Title:</th>
           <td>{{ $event->evn_title }}</td>
          </tr>
          <tr>
           <th>Location:</th>
           <td>{{ $event->evn_loc ?? 'N/A' }}</td>
          </tr>
          <tr>
           <th>Start Date:</th>
           <td>{{ $event->evn_start ?? 'N/A' }}</td>
          </tr>
          <tr>
           <th>End Date:</th>
           <td>{{ $event->evn_end ?? 'N/A' }}</td>
          </tr>
          <tr>
           <th>Time:</th>
           <td>{{ $event->evn_time ?? 'N/A' }}</td>
          </tr>
          <tr>
           <th>Registrations:</th>
           <td><span class="badge bg-primary">{{ $event->registrations()->count() }}</span></td>
          </tr>
          <tr>
           <th>Created:</th>
           <td>{{ $event->created_at->format('d M Y H:i') }}</td>
          </tr>
          <tr>
           <th>Last Updated:</th>
           <td>{{ $event->updated_at->format('d M Y H:i') }}</td>
          </tr>
         </table>
        </div>
        <div class="col-md-4">
         <h5>Event Image</h5>
         @if($event->evn_img)
          <img src="{{ asset('storage/' . $event->evn_img) }}" alt="{{ $event->evn_title }}" class="img-fluid" style="border-radius: 4px; max-height: 300px; object-fit: cover;">
         @else
          <div class="alert alert-info">No image uploaded</div>
         @endif
        </div>
       </div>

       <div class="row">
        <div class="col-md-12">
         <h5>Description</h5>
         <div style="background: #f8f9fa; padding: 15px; border-radius: 4px; min-height: 100px;">
          {{ $event->evn_desc ?? 'No description provided' }}
         </div>
        </div>
       </div>

       <div class="card-action mt-4">
        <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning">
         <i class="fas fa-edit me-1"></i>Edit Event
        </a>
        <a href="{{ route('admin.events.registration_desk', $event->id) }}" class="btn btn-success">
         <i class="fas fa-user-plus me-1"></i>Registration Desk
        </a>
        <a href="{{ route('admin.events.attendance', $event->id) }}" class="btn btn-info">
         <i class="fas fa-check-double me-1"></i>Mark Attendance
        </a>
        <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this event?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">
           <i class="fas fa-trash me-1"></i>Delete
          </button>
        </form>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
         <i class="fas fa-arrow-left me-1"></i>Back to Events
        </a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

@endsection
