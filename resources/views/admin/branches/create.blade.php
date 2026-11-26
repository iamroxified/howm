@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')


 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Add Branch</h3>
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
      <a href="{{ route('admin.branches.index') }}">All Branches</a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('admin.branches.create') }}">Add Branch</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">Add Branch</div>
      </div>
      <div class="card-body">
       <form method="POST" action="{{ route('admin.branches.store') }}" enctype="multipart/form-data">
        @csrf


        <div class="row">
         <div class="form-group col-md-6 col-lg-4">
          <label for="programmeTitle">Branch Name</label>
          <input type="text" class="form-control" id="branchName" name="bran_name"
           placeholder="Enter Branch Name" required />

         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Branch Image</label>
          <input type="file" class="form-control" id="bran_img" name="bran_img" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Branch Location</label>
          <input type="text" class="form-control" id="bran_img" name="bran_loc" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Branch Pastor</label>
          <input type="text" class="form-control" id="bran_start" name="bran_pst" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Branch Pastor Image</label>
          <input type="file" class="form-control" id="bran_pst_img" name="bran_pst_img" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="fileInput">Branch Phone</label>
          <input type="text" class="form-control" id="bran_phone" name="bran_phone" placeholder="" />
         </div>
         <div class="form-group col-md-6 col-lg-4">
            <label for="fileInput">Branch Email</label>
            <input type="email" class="form-control" id="bran_email" name="bran_email" placeholder="" />
           </div>
         <div class="form-group col-md-6 col-lg-4">
          <label for="comment">Branch Description</label>
          <textarea class="form-control" id="comment" name="bran_desc" rows="5"> </textarea>
         </div>
        </div>
        <div class="card-action">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('admin.branches.index') }}" class="btn btn-danger">Cancel</a>
           </div>
       </form>

      </div>

     </div>
    </div>
   </div>
  </div>
 </div>

@endsection
