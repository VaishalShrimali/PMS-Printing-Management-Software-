<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link text-center">
      <span class="brand-text font-weight-light"> <strong> PMS </strong> </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin_assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ url('admin/dashboard') }}" class="d-block">{{session('ADMIN_NAME')}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('admin/dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="{{ url('admin/users') }}" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>Users</p>
            </a>
          </li> -->

          
          <li class="nav-item">
            <a href="{{ url('admin/category') }}" class="nav-link">
              <i class="fas fa-list nav-icon"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/subcategory') }}" class="nav-link">
              <i class="fas fa-list nav-icon"></i>
              <p>Subcategory</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/product') }}" class="nav-link">
              <i class="fas fa-list nav-icon"></i>
              <p>Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/request') }}" class="nav-link">
              <i class="fas fa-exchange-alt nav-icon"></i>
              <p>Request</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/order_list') }}" class="nav-link">
              <i class="fas fa-folder-open nav-icon"></i>
              <p>Order</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('admin/role') }}" class="nav-link">
              <i class="fas fa-sitemap nav-icon"></i>
              <p>Role</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/staff') }}" class="nav-link">
              <i class="fas fa-users nav-icon"></i>
              <p>Staff</p>
            </a>
          </li>
          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>