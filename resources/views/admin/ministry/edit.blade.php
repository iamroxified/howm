@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')


 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">Edit Ministry</h3>
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
      <a href="{{ route('ministry.index') }}">All Ministry</a>
     </li>
     <li class="separator">
      <i class="icon-arrow-right"></i>
     </li>
     <li class="nav-item">
      <a href="{{ route('ministry.create') }}">Edit Ministry</a>
     </li>
    </ul>
   </div>

   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <div class="card-title">Edit {{ $ministry['min_name'] }} Ministry</div>
      </div>
      <div class="card-body">
       <form method="POST" action="{{ route('ministry.update', $ministry['id']) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')


        <div class="row">
            <div class="form-group col-md-6 col-lg-4">
             <label for="programmeTitle">Ministry Name</label>
             <input type="text" class="form-control" id="programmeTitle" name="min_name"
              placeholder="Enter Ministry Name" value="{{ $ministry['min_name'] }}" required />

            </div>
            <div class="form-group col-md-6 col-lg-4">
               <label for="fileInput">Ministry Slug</label>
               <input type="text" class="form-control" id="min_cat" name="min_cat" placeholder="" value="{{ $ministry['min_cat'] }}" />
              </div>
            <div class="form-group col-md-6 col-lg-4">
             <label for="fileInput">Ministry Image</label>
             <input type="file" class="form-control" id="min_img" name="min_img" placeholder="" value="{{ $ministry['min_img'] }}" />
            </div>
            <div class="form-group col-md-6 col-lg-4">
             <label for="fileInput">Ministry Location</label>
             <input type="text" class="form-control" id="min_loc" name="min_loc" placeholder="" value="{{ $ministry['min_loc'] }}" />
            </div>
            <div class="form-group col-md-6 col-lg-4">
             <label for="fileInput">Ministry Leader</label>
             <input type="text" class="form-control" id="min_leader" name="min_lead" placeholder="" value="{{ $ministry['min_lead'] }}" />
            </div>


            <div class="form-group col-md-6 col-lg-4">
             <label for="comment">Ministry Description</label>
             <textarea class="form-control" id="comment" name="min_desc" rows="5"> {{ $ministry['min_desc'] }}</textarea>
            </div>
            <div class="form-group col-md-6 col-lg-4">
             <label for="comment">Ministry Vision</label>
             <textarea class="form-control" id="comment" name="min_vis" rows="5"> {{ $ministry['min_vis'] }}</textarea>
            </div>
            <div class="form-group col-md-6 col-lg-4">
             <label for="comment">Ministry Mission</label>
             <textarea class="form-control" id="comment" name="min_mis" rows="5"> {{ $ministry['min_mis'] }}</textarea>
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
