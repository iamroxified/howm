<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
 <div class="sidebar-logo">
  <!-- Logo Header -->
  <div class="logo-header" data-background-color="dark">

   <a href="{{ '/admin/index' }}" class="logo">
    <img src="{{ asset('assets/img/images.png') }}" alt="navbar brand" class="navbar-brand" height="20">
   </a>
   <div class="nav-toggle">
    <button class="btn btn-toggle toggle-sidebar">
     <i class="gg-menu-right"></i>
    </button>
    <button class="btn btn-toggle sidenav-toggler">
     <i class="gg-menu-left"></i>
    </button>
   </div>
   <button class="topbar-toggler more">
    <i class="gg-more-vertical-alt"></i>
   </button>

  </div>
  <!-- End Logo Header -->
 </div>
 <div class="sidebar-wrapper scrollbar scrollbar-inner">
  <div class="sidebar-content">
   <ul class="nav nav-secondary">
    <li class="nav-item active">
     <a href="/admin/index">
      <i class="fas fa-home"></i>
      <p>Dashboard</p>

     </a>

    </li>

    <li class="nav-item">
     <a data-bs-toggle="collapse" href="#users">
      <i class="fas fa-users"></i>
      <p>Users</p>
      <span class="caret"></span>
     </a>
     <div class="collapse" id="users">
      <ul class="nav nav-collapse">
       <li>
        <a href="{{ route('admin.users.index') }}">
         <span class="sub-item">All Users</span>
        </a>
       </li>
       <li>
        <a href="{{ route('admin.users.create') }}">
         <span class="sub-item">Add User</span>
        </a>
       </li>
      </ul>
     </div>
    </li>

    <li class="nav-item">
     <a data-bs-toggle="collapse" href="#base">
      <i class="fas fa-layer-group"></i>
      <p>Programmes</p>
      <span class="caret"></span>
     </a>
     <div class="collapse" id="base">
      <ul class="nav nav-collapse">
       <li>
        <a href="/admin/programme/create">
         <span class="sub-item">Add Programmes</span>
        </a>
       </li>
       <li>
        <a href="/admin/programme/">
         <span class="sub-item">All Programmes</span>
        </a>
       </li>

      </ul>
     </div>
    </li>
    <li class="nav-item">
     <a data-bs-toggle="collapse" href="#events">
      <i class="fas fa-layer-group"></i>
      <p>Events</p>
      <span class="caret"></span>
     </a>
     <div class="collapse" id="events">
      <ul class="nav nav-collapse">
       <li>
        <a href="/admin/events/create">
         <span class="sub-item">Add Events</span>
        </a>
       </li>
       <li>
        <a href="/admin/events/">
         <span class="sub-item">All Events</span>
        </a>
       </li>
       <li>
        <a href="/admin/events/attendance">
         <span class="sub-item">Attendance</span>
        </a>
       </li>
       <li>
        <a href="/admin/events/registration_desk">
         <span class="sub-item">Registration</span>
        </a>
       </li>

      </ul>
     </div>
    </li>
    <li class="nav-item">
     <a data-bs-toggle="collapse" href="#dcg">
      <i class="fas fa-book-open"></i>
      <p>Daily Communion with God</p>
      <span class="caret"></span>
     </a>
     <div class="collapse" id="dcg">
      <ul class="nav nav-collapse">
       <li>
        <a href="{{ route('admin.dcg.create') }}">
         <span class="sub-item">Add DCG entry</span>
        </a>
       </li>
       <li>
        <a href="{{ route('admin.dcg.index') }}">
         <span class="sub-item">All DCG entries</span>
        </a>
       </li>
      </ul>
     </div>
    </li>
    <li class="nav-item">
        <a data-bs-toggle="collapse" href="#books">
         <i class="fas fa-layer-group"></i>
         <p>Books</p>
         <span class="caret"></span>
        </a>
        <div class="collapse" id="books">
         <ul class="nav nav-collapse">
          <li>
           <a href="/admin/books/create">
            <span class="sub-item">Add Books</span>
           </a>
          </li>
          <li>
           <a href="/admin/books/">
            <span class="sub-item">All Books</span>
           </a>
          </li>
         </ul>
        </div>
       </li>
       <li class="nav-item">
        <a href="{{ route('admin.givings.index') }}">
         <i class="fas fa-donate"></i>
         <p>Givings</p>
        </a>
       </li>
       <li class="nav-item">
        <a href="{{ route('admin.book_orders.index') }}">
         <i class="fas fa-shopping-cart"></i>
         <p>Book Orders</p>
        </a>
       </li>
    <li class="nav-item">
     <a data-bs-toggle="collapse" href="#gallery">
      <i class="fas fa-th-list"></i>
      <p>Gallery</p>
      <span class="caret"></span>
     </a>
     <div class="collapse" id="gallery">
      <ul class="nav nav-collapse">
       <li>
        <a href="/admin/gallery/create">
         <span class="sub-item">Add Gallery</span>
        </a>
       </li>
       <li>
        <a href="/admin/gallery/">
         <span class="sub-item">All Gallery</span>
        </a>
       </li>
      </ul>
     </div>
    </li>
    <li class="nav-item">
     <a data-bs-toggle="collapse" href="#sermon">
      <i class="fas fa-pen-square"></i>
      <p>Sermons</p>
      <span class="caret"></span>
     </a>
     <div class="collapse" id="sermon">
      <ul class="nav nav-collapse">
       <li>
        <a href="/admin/sermon/create">
         <span class="sub-item">Add Sermon</span>
        </a>
       </li>
       <li>
        <a href="/admin/sermon/">
         <span class="sub-item">All Sermons</span>
        </a>
       </li>
      </ul>
     </div>
    </li>
    <li class="nav-item">
     <a data-bs-toggle="collapse" href="#branches">
      <i class="fas fa-pen-square"></i>
      <p>Branches</p>
      <span class="caret"></span>
     </a>
     <div class="collapse" id="branches">
      <ul class="nav nav-collapse">
       <li>
        <a href="/admin/branches/create">
         <span class="sub-item">Add Branch</span>
        </a>
       </li>
       <li>
        <a href="/admin/branches/">
         <span class="sub-item">All Branches</span>
        </a>
       </li>
      </ul>
     </div>
    </li>
    <li class="nav-item">
     <a data-bs-toggle="collapse" href="#hod">
      <i class="fas fa-table"></i>
      <p>HOD</p>
      <span class="caret"></span>
     </a>
     <div class="collapse" id="hod">
      <ul class="nav nav-collapse">
       <li>
        <a href="/admin/hod/create">
         <span class="sub-item">Add HOD</span>
        </a>
       </li>
       <li>
        <a href="/admin/hod/">
         <span class="sub-item">All HOD</span>
        </a>
       </li>
      </ul>
     </div>
    </li>
    <li class="nav-item">
     <a data-bs-toggle="collapse" href="#ministry">
      <i class="fas fa-table"></i>
      <p>Ministry</p>
      <span class="caret"></span>
     </a>
     <div class="collapse" id="ministry">
      <ul class="nav nav-collapse">
       <li>
        <a href="/admin/ministry/create">
         <span class="sub-item">Add Ministry</span>
        </a>
       </li>
       <li>
        <a href="/admin/ministry/">
         <span class="sub-item">All Ministry</span>
        </a>
       </li>
      </ul>
     </div>
    </li>
    <li class="nav-item">
     <a data-bs-toggle="collapse" href="#settings">
      <i class="fas fa-cog"></i>
      <p>Settings</p>
      <span class="caret"></span>
     </a>
     <div class="collapse" id="settings">
      <ul class="nav nav-collapse">
       <li>
        <a href="/admin/profile">
         <span class="sub-item">Profile</span>
        </a>
       </li>
       <li>
        <a href="/admin/reset_password">
         <span class="sub-item">Reset Passowrd</span>
        </a>
       </li>
       <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
         <span class="sub-item">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
       </li>
      </ul>
     </div>
    </li>
   </ul>
  </div>
 </div>
</div>
<!-- End Sidebar -->
