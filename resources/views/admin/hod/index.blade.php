@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')


 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">All Programme</h3>
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
      <a href="{{ route('programme.index') }}">All Programmes</a>
     </li>
    </ul>
   </div>
   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <h4 class="card-title">All Programmes</h4>
      </div>
      <div class="card-body">
       <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
         <thead>
          <tr>
            <th>SN</th>
           <th>Programme Title</th>
           <th>Location</th>
           <th>Image</th>
           <th>Description</th>
           <th>Start / End Date</th>
           <th>Time</th>
           <th>Created</th>
           <th>Action</th>
          </tr>
         </thead>
         <tfoot>
          <tr>
            <th>SN</th>
           <th>Programme Title</th>
           <th>Location</th>
           <th>Image</th>
           <th>Description</th>
           <th>Start / End Date</th>
           <th>Time</th>
           <th>Created</th>
           <th>Action</th>
          </tr>
         </tfoot>
         <tbody>
            {{ $sn=1 }}
          @foreach ($programmes as $programme)
           <tr>
            <td>{{ $sn }}</td>
            <td>{{ $programme['prg_title'] }}</td>
            <td>{{ $programme['prg_loc'] }}</td>
            <td><img src="{{ asset('storage/'.$programme['prg_img']) }}" alt="{{ $programme['prg_title'] }}" style="max-width: 100px; height: auto;"></td>
            <td>{{ Str::limit($programme['prg_desc'], 50) }}</td>
            <td>{{ $programme['prg_start'] }} to {{ $programme['prg_end'] }}</td>
            <td>{{ $programme['prg_time'] }}</td>
            <td>{{ $programme['created_at']->format('d M Y') }}</td>
            <td>
                <a href="{{ route('programme.show', $programme['id']) }}" class="btn btn-sm btn-primary">View</a>
                <a href="{{ route('programme.edit', $programme['id']) }}" class="btn btn-sm btn-info">Edit</a>
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
