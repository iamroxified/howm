@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')

 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Ministry Details</h3>
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
      <a href="{{ route('admin.ministry.index') }}">All Ministries</a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('admin.ministry.show', $ministry->id) }}">Ministry Details</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">{{ $ministry->name }}</div>
      </div>
      <div class="card-body">
       <div class="row mb-4">
        <div class="col-md-8">
         <h5>Ministry Information</h5>
         <table class="table table-bordered">
          <tr>
           <th width="200">Name:</th>
           <td>{{ $ministry->min_name }}</td>
          </tr>
          <th width="200">Leader:</th>
          <td>{{ $ministry->min_lead }}</td>


         <tr>
              <th>Phone:</th>
              <td>{{ $ministry->min_phone ?? 'N/A' }}</td>
         </tr>
          <tr>
           <th>Created:</th>
           <td>{{ $ministry->created_at->format('d M Y H:i') }}</td>
          </tr>
          <tr>
           <th>Last Updated:</th>
           <td>{{ $ministry->updated_at->format('d M Y H:i') }}</td>
          </tr>
         </table>
        </div>
        <div class="col-md-4">
         <h5>Ministry Image</h5>
         @if ($ministry->min_img)
          <img src="{{ asset('storage/' . $ministry->min_img) }}" alt="{{ $ministry->min_namw }}" class="img-fluid"
           style="border-radius: 4px; max-height: 300px; object-fit: cover;">
         @else
          <div class="alert alert-info">No image uploaded</div>
         @endif
        </div>
       </div>

       <div class="row">
        <div class="col-md-12">
         <h5>Description</h5>
         <div style="background: #f8f9fa; padding: 15px; border-radius: 4px; min-height: 100px;">
          {{ $ministry->min_desc ?? 'No description provided' }}
         </div>
        </div>
       </div>

       <div class="row">
        <div class="col-md-12">
         <h5>Vision</h5>
         <div style="background: #f8f9fa; padding: 15px; border-radius: 4px; min-height: 100px;">
          {{ $ministry->min_vis ?? 'No description provided' }}
         </div>
        </div>
       </div>

       <div class="row">
        <div class="col-md-12">
         <h5>Mission</h5>
         <div style="background: #f8f9fa; padding: 15px; border-radius: 4px; min-height: 100px;">
          {{ $ministry->min_mis ?? 'No description provided' }}
         </div>
        </div>
       </div>

       <div class="card-action mt-4">
        <a href="{{ route('admin.ministry.edit', $ministry->id) }}" class="btn btn-warning">Edit</a>
        <form method="POST" action="{{ route('admin.ministry.destroy', $ministry->id) }}" style="display:inline;"
         onsubmit="return confirm('Are you sure you want to delete this ministry?');">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('admin.ministry.index') }}" class="btn btn-secondary">Back to Ministries</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

@endsection
