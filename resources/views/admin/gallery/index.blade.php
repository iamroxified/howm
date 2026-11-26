@extends('admin.layout.app')
@section('title', 'HOWM Admin Dashboard')
@section('content')


 <div class="container">
  <div class="page-inner">
   <div class="page-header">
    <h3 class="fw-bold mb-3">All Gallery Images</h3>
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
      <a href="{{ route('gallery.index') }}">All Gallery Images</a>
     </li>
    </ul>
   </div>
   <div class="row">
    <div class="col-md-12">
     <div class="card">
      <div class="card-header">
       <h4 class="card-title">All Gallery Images</h4>
      </div>
      <div class="card-body">
       <div class="table-responsive">
        <table id="basic-datatables" class="display table table-striped table-hover">
         <thead>
          <tr>
           <th>SN</th>
           <th>Title</th>
           <th>Image</th>
           <th>Description</th>
           <th>Category</th>
           <th>Created</th>
           <th>Action</th>
          </tr>
         </thead>
         <tfoot>
          <tr>
           <th>SN</th>
           <th>Title</th>
           <th>Image</th>
           <th>Description</th>
           <th>Category</th>
           <th>Created</th>
           <th>Action</th>
          </tr>
         </tfoot>
         <tbody>
          @php $sn=1; @endphp
          @foreach ($galleries as $image)
           <tr>
            <td>{{ $sn }}</td>
            <td>{{ $image->gal_name }}</td>
            <td>
             @if ($image->gal_img && is_array($image->gal_img) && count($image->gal_img) > 0)
              <img src="{{ asset('storage/' . $image->gal_img[0]) }}" alt="{{ $image->gal_name }}"
               style="max-width: 100px; height: auto; border-radius: 4px;">
             @else
              <span class="text-muted">No image</span>
             @endif
            </td>
            <td>{{ Str::limit($image->gal_desc, 50) }}</td>
            <td>{{ $image->gal_cat }}</td>
            <td>{{ $image->created_at->format('d M Y') }}</td>
            <td>
             <a href="{{ route('admin.gallery.show', $image->id) }}" class="btn btn-sm btn-primary">View</a>
             <a href="{{ route('admin.gallery.edit', $image->id) }}" class="btn btn-sm btn-info">Edit</a>
             <form method="POST" action="{{ route('admin.gallery.destroy', $image->id) }}" style="display:inline;"
              onsubmit="return confirm('Are you sure?');">
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
