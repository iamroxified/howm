@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')


 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">All Ministry</h3>
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
      <a href="{{ route('admin.ministry.index') }}">All Ministry</a>
     </li>
    </ul>
   </div>
   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <h4 class="card-title">All Ministry</h4>
      </div>
      <div class="card-body">
       <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
         <thead>
          <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Location</th>
            <th>Image</th>
            <th>Description</th>
            <th>Leader</th>
            <th>Created</th>
            <th>Action</th>
          </tr>
         </thead>
         <tfoot>
          <tr>
            <th>SN</th>
           <th>Name</th>
           <th>Location</th>
           <th>Image</th>
           <th>Description</th>
           <th>Leader</th>
           <th>Created</th>
           <th>Action</th>
          </tr>
         </tfoot>
         <tbody>
           @php  $sn=1 @endphp
          @foreach ($ministries as $ministry)
           <tr>
            <td>{{ $sn }}</td>
            <td>{{ $ministry['min_name'] }}</td>
            <td>{{ $ministry['min_loc'] }}</td>
            <td><img src="{{ asset('storage/'.$ministry['min_img']) }}" alt="{{ $ministry['min_name'] }}" style="max-width: 100px; height: auto;"></td>
            <td>{{ Str::limit($ministry['min_desc'], 50) }}</td>
            <td>{{ $ministry['min_lead'] }} </td>
            <td>{{ $ministry['created_at']->format('d M Y') }}</td>
            <td>
                <a href="{{ route('admin.ministry.show', $ministry['id']) }}" class="btn btn-sm btn-primary">View</a>
                <a href="{{ route('admin.ministry.edit', $ministry['id']) }}" class="btn btn-sm btn-info">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Delete</a>
            </td>
           </tr>
              {{ $sn++ }}
          @endforeach
         </tbody>
        </table>
       </div>
      </div>
     </div>
    </div>




   </div>

  </div>
 </div>

@endsection
