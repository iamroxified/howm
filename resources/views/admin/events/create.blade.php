@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')

<div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Add events</h3>
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
      <a href="{{ route('admin.events.create') }}">Add events</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">Add events</div>
      </div>
      <div class="card-body">
       <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
         <div class="form-group col-md-6 col-lg-4">
          <label for="eventsTitle">Event Title</label>
          <input type="text" class="form-control" id="eventsTitle" name="evn_title"
           placeholder="Enter Event Title" required />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Event Image</label>
          <input type="file" class="form-control" id="evn_img" name="evn_img" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Event Location</label>
          <input type="text" class="form-control" id="evn_img" name="evn_loc" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Event Start Date</label>
          <input type="date" class="form-control" id="evn_start" name="evn_start" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Event End Date</label>
          <input type="date" class="form-control" id="evn_end" name="evn_end" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Event Time</label>
          <input type="text" class="form-control" id="evn_time" name="evn_time" placeholder="" />
        </div>
        <div class="form-group col-md-6 col-lg-4">
            <label for="comment">Event Description</label>
            <textarea class="form-control" id="comment" name="evn_desc" rows="5"> </textarea>
           </div>

        <div class="card-action">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('admin.events.index') }}" class="btn btn-danger">Cancel</a>
        </div>
       </form>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>

@endsection
