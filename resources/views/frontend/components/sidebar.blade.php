  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('user.home') }}" class="brand-link">
      <img src="{{ asset('backend/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventory System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->image_icon)
          <img src="{{ asset('uploads/users/'. Auth::user()->image_icon) }}" class="img-circle elevation-2" alt="User Image">
              @else
              <img src="{{ asset('backend/dist/img/avatar4.png') }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="{{ route('user.home') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('user.home') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt fa fa-spin"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">Home</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
              <p>
                About Us
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user.setting.index') }}" class="nav-link">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('user.category.index') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
              <p>
                Categories
              </p>
            </a>
           
          </li>



          <li class="nav-item" style="padding-left: 10px;">
            <a href="{{ route('user.company.index') }}" class="nav-link">
            <i class="fas fa-building"></i>
              <p>
                Companies
              </p>
            </a>
           
          </li>

          <li class="nav-item" style="padding-left: 10px;">
            <a href="{{ route('user.supplier.index') }}" class="nav-link">
            <i class="fas fa-industry"></i>
              <p>
                Suppliers
              </p>
            </a>
           
          </li>

          <li class="nav-item" style="padding-left: 10px;">
            <a href="{{ route('user.tax.index') }}" class="nav-link">
            <i class="fas fa-file-invoice"></i>
              <p>
                Tax
              </p>
            </a>
           
          </li>


          <li class="nav-item" style="padding-left: 10px;">
            <a href="{{ route('user.product.index') }}" class="nav-link">
            <i class="fab fa-product-hunt"></i>
              <p>
                Product
              </p>
            </a>
           
          </li>


          <li class="nav-item" style="padding-left: 5px;">
            <a href="{{ route('user.purchase.index') }}" class="nav-link">
            <i class="fas fa-shopping-cart"></i>
              <p>
                Product Purchase
              </p>
            </a>
           
          </li>

        

         

        
         
      

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>