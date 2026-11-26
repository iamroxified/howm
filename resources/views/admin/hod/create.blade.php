@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')


 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Add Programme</h3>
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
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('programme.create') }}">Add Programme</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">Add Programme</div>
      </div>
      <div class="card-body">
       <form method="POST" action="{{ route('programme.store') }}" enctype="multipart/form-data">
        @csrf


        <div class="row">
         <div class="form-group col-md-6 col-lg-4">
          <label for="programmeTitle">Programme Title</label>
          <input type="text" class="form-control" id="programmeTitle" name="prg_title"
           placeholder="Enter Programme Title" required />

         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Programe Image</label>
          <input type="file" class="form-control" id="prg_img" name="prg_img" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Programe Location</label>
          <input type="text" class="form-control" id="prg_img" name="prg_loc" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Programe Start Date</label>
          <input type="date" class="form-control" id="prg_start" name="prg_start" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Programe End Date</label>
          <input type="date" class="form-control" id="prg_end" name="prg_end" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Programe Time</label>
          <input type="text" class="form-control" id="prg_time" name="prg_time" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="comment">Programme Description</label>
          <textarea class="form-control" id="comment" name="prg_desc" rows="5"> </textarea>
         </div>
        </div>
        <div class="card-action">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('programme.index') }}" class="btn btn-danger">Cancel</a>
           </div>
       </form>

      </div>

     </div>
    </div>
   </div>
  </div>
 </div>

@endsection
