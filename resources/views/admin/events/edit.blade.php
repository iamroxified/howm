@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')

<div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Edit events</h3>
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
      <a href="{{ route('admin.events.index') }}">All eventss</a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('admin.events.edit', $event->id) }}">Edit events</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">Edit {{ $event->evn_title }} events</div>
      </div>
      <div class="card-body">
       <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row">
         <div class="form-group col-md-6 col-lg-4">
          <label for="eventsTitle">events Title</label>
          <input type="text" class="form-control" id="eventsTitle" name="evn_title" value="{{ $event->evn_title }}"
           placeholder="Enter events Title" required />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">events Image</label>
          <input type="file" class="form-control" id="evn_img" name="evn_img" accept="image/*" />
          @if($event->evn_img)
           <small class="text-muted d-block mt-2">Current image: <img src="{{ asset('storage/' . $event->evn_img) }}" alt="current" style="max-width: 80px; height: auto; border-radius: 4px; margin-top: 5px;"></small>
          @endif
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">events Location</label>
          <input type="text" class="form-control" id="evn_loc" name="evn_loc" value="{{ $event->evn_loc }}" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">events Start Date</label>
          <input type="date" class="form-control" id="evn_start" name="evn_start" value="{{ $event->evn_start }}" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">events End Date</label>
          <input type="date" class="form-control" id="evn_end" name="evn_end" value="{{ $event->evn_end }}" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">events Time</label>
          <input type="text" class="form-control" id="evn_time" name="evn_time" value="{{ $event->evn_time }}" />
         </div>
         <div class="form-group col-md-6 col-lg-6">
          <label for="comment">events Description</label>
          <textarea class="form-control" id="comment" name="evn_desc" rows="5">{{ $event->evn_desc }}</textarea>
         </div>
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
