@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')


 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">All Events</h3>
    <ul class="breadcrumbs mb-3">
     <li class="nav-home">
      <a href="/admin/index">
       <i class="icon-home"></i>
      </a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('admin.events.index') }}">All Events</a>
     </li>
    </ul>
   </div>
   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <h4 class="card-title">All Events</h4>
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
            @php $sn = 1; @endphp
          @foreach ($events as $event)
           <tr>
            <td>{{ $sn }}</td>
            <td>{{ $event->evn_title }}</td>
            <td>{{ $event->evn_loc }}</td>
            <td><img src="{{ asset('storage/'.$event->evn_img) }}" alt="{{ $event->evn_title }}" style="max-width: 100px; height: auto; border-radius: 4px;"></td>
            <td>{{ Str::limit($event->evn_desc, 50) }}</td>
            <td>{{ $event->evn_start }} to {{ $event->evn_end }}</td>
            <td>{{ $event->evn_time }}</td>
            <td>{{ $event->created_at->format('d M Y') }}</td>
            <td>
                <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-sm btn-primary">View</a>
                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-sm btn-info">Edit</a>
                <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
           </tr>
           @php $sn++; @endphp
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
