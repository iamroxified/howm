@extends('admin.layout.app')
@section('title', 'Ministry - HOWM Admin Dashboard')
@section('content')


 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Add Ministry</h3>
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
      <a href="{{ route('ministry.index') }}">All Ministries</a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('ministry.create') }}">Add Ministry</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">Add Ministry</div>
      </div>
      <div class="card-body">
       <form method="POST" action="{{ route('ministry.store') }}" enctype="multipart/form-data">
        @csrf


        <div class="row">
         <div class="form-group col-md-6 col-lg-4">
          <label for="programmeTitle">Ministry Name</label>
          <input type="text" class="form-control" id="programmeTitle" name="min_name"
           placeholder="Enter Ministry Name" required />

         </div>
         <div class="form-group col-md-6 col-lg-4">
            <label for="fileInput">Ministry Slug</label>
            <input type="text" class="form-control" id="min_cat" name="min_cat" placeholder="" />
           </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Ministry Image</label>
          <input type="file" class="form-control" id="min_img" name="min_img" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Ministry Location</label>
          <input type="text" class="form-control" id="min_img" name="min_loc" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Ministry Leader</label>
          <input type="text" class="form-control" id="min_leader" name="min_lead" placeholder="" />
         </div>


         <div class="form-group col-md-6 col-lg-4">
          <label for="comment">Ministry Description</label>
          <textarea class="form-control" id="comment" name="min_desc" rows="5"> </textarea>
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="comment">Ministry Vision</label>
          <textarea class="form-control" id="comment" name="min_vis" rows="5"> </textarea>
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="comment">Ministry Mission</label>
          <textarea class="form-control" id="comment" name="min_mis" rows="5"> </textarea>
         </div>
        </div>
        <div class="card-action">
         <button type="submit" class="btn btn-success">Submit</button>
         <a href="{{ route('ministry.index') }}" class="btn btn-danger">Cancel</a>
        </div>
       </form>

      </div>

     </div>
    </div>
   </div>
  </div>
 </div>

@endsection
