@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')

 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">branch Details</h3>
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
      <a href="{{ route('admin.branches.index') }}">All Ministries</a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('admin.branches.show', $branch->id) }}">branch Details</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">{{ $branch->name }}</div>
      </div>
      <div class="card-body">
       <div class="row mb-4">
        <div class="col-md-6">
         <h5>branch Information</h5>
         <table class="table table-bordered">
          <tr>
           <th width="">Name:</th>
           <td>{{ $branch->bran_name }}</td>
          </tr>
          <th width="">Leader:</th>
          <td>{{ $branch->bran_pst }}</td>


         <tr>
              <th>Phone:</th>
              <td>{{ $branch->bran_phone ?? 'N/A' }}</td>
         </tr>
          <tr>
           <th>Created:</th>
           <td>{{ $branch->created_at->format('d M Y H:i') }}</td>
          </tr>
          <tr>
           <th>Last Updated:</th>
           <td>{{ $branch->updated_at->format('d M Y H:i') }}</td>
          </tr>
         </table>
        </div>
        <div class="col-md-3">
         <h5>branch Image</h5>
         @if ($branch->bran_img)
          <img src="{{ asset('storage/' . $branch->bran_img) }}" alt="{{ $branch->bran_name }}" class="img-fluid"
           style="border-radius: 4px; max-height: 300px; object-fit: cover;">
         @else
          <div class="alert alert-info">No image uploaded</div>
         @endif
        </div>
        <div class="col-md-3">
            <h5>Pastor Image</h5>
            @if ($branch->bran_pst_img)
             <img src="{{ asset('storage/' . $branch->bran_pst_img) }}" alt="{{ $branch->bran_name }}" class="img-fluid"
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
          {{ $branch->bran_desc ?? 'No description provided' }}
         </div>
        </div>
       </div>

       <div class="card-action mt-4">
        <a href="{{ route('admin.branches.edit', $branch->id) }}" class="btn btn-warning">Edit</a>
        <form method="POST" action="{{ route('admin.branches.destroy', $branch->id) }}" style="display:inline;"
         onsubmit="return confirm('Are you sure you want to delete this branch?');">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('admin.branches.index') }}" class="btn btn-secondary">Back to Ministries</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

@endsection
