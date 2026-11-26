@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')

<div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Programme Details</h3>
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
      <a href="{{ route('admin.programme.index') }}">All Programmes</a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('admin.programme.show', $programme->id) }}">Programme Details</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">{{ $programme->prg_title }}</div>
      </div>
      <div class="card-body">

       <div class="row mb-4">
        <div class="col-md-8">
         <h5>Programme Information</h5>
         <table class="table table-bordered">
          <tr>
           <th width="200">Title:</th>
           <td>{{ $programme->prg_title }}</td>
          </tr>
          <tr>
           <th>Location:</th>
           <td>{{ $programme->prg_loc ?? 'N/A' }}</td>
          </tr>
          <tr>
           <th>Start Date:</th>
           <td>{{ $programme->prg_start ?? 'N/A' }}</td>
          </tr>
          <tr>
           <th>End Date:</th>
           <td>{{ $programme->prg_end ?? 'N/A' }}</td>
          </tr>
          <tr>
           <th>Time:</th>
           <td>{{ $programme->prg_time ?? 'N/A' }}</td>
          </tr>
          <tr>
           <th>Created:</th>
           <td>{{ $programme->created_at->format('d M Y H:i') }}</td>
          </tr>
          <tr>
           <th>Last Updated:</th>
           <td>{{ $programme->updated_at->format('d M Y H:i') }}</td>
          </tr>
         </table>
        </div>
        <div class="col-md-4">
         <h5>Programme Image</h5>
         @if($programme->prg_img)
          <img src="{{ asset('storage/' . $programme->prg_img) }}" alt="{{ $programme->prg_title }}" class="img-fluid" style="border-radius: 4px; max-height: 300px; object-fit: cover;">
         @else
          <div class="alert alert-info">No image uploaded</div>
         @endif
        </div>
       </div>

       <div class="row">
        <div class="col-md-12">
         <h5>Description</h5>
         <div style="background: #f8f9fa; padding: 15px; border-radius: 4px; min-height: 100px;">
          {{ $programme->prg_desc ?? 'No description provided' }}
         </div>
        </div>
       </div>

       <div class="card-action mt-4">
        <a href="{{ route('admin.programme.edit', $programme->id) }}" class="btn btn-warning">Edit</a>
        <form method="POST" action="{{ route('admin.programme.destroy', $programme->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this programme?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('admin.programme.index') }}" class="btn btn-secondary">Back to Programmes</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

@endsection
