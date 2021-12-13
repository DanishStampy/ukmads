 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      
      <span class="brand-text font-weight-light">UKMads</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('img/AvatarMaker.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
   @if(Auth::user()->role == 'admin')
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/admin/pendingads" class="nav-link">
                <i class="fas fa-tasks"></i>
                <p>Pending Advertisement</p>
                 </a>
            </li>
           <li class="nav-item">
            <a href="/admin/history" class="nav-link">
            <i class="fas fa-history"></i>
              <p>
                History
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    
    @endif

    @if (Auth::user()->role == 'advertiser')
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/advertiser/home" class="nav-link">
                <i class="fas fa-home mr-2"></i>
                <p>Home</p>
                 </a>
            </li>
           <li class="nav-item">
            <a href="/advertisor/advertisement" class="nav-link">
            <i class="far fa-calendar mr-2"></i>
              <p>
                Advertisement
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/advertisor/event" class="nav-link">
            <i class="fas fa-volleyball-ball mr-2"></i>
              <p>
                Event
              </p>
            </a>
          </li>
          <li class="nav-item" style="margin-bottom: 20em;">
            <a href="/advertisor/aboutus" class="nav-link">
            <i class="fas fa-address-card mr-2"></i>
              <p>
                About Us
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/advertisor/aboutus" class="nav-link">
            <i class="fas fa-address-card mr-2" ></i>
              <p>
                About Us
              </p>
            </a>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    @endif
    </div>
    <!-- /.sidebar -->
  </aside>
  

  

  <!-- Content Wrapper. Contains page content -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->