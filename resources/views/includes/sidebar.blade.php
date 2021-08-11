 <!-- Sidebar -->
 <div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{Auth::user()->name}}</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{route('dashboard.index')}}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li> 
      <li class="nav-item">
        <a href="{{route('category.index')}}" class="nav-link">
          <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
          <p>
            Category
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('supplier.index')}}" class="nav-link">
          <i class="nav-icon fas fa-parachute-box"></i>
          <p>
            Supplier
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('product.index')}}" class="nav-link">
          <i class=" nav-icon fab fa-opencart"></i>
          <p>
            Product
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('customer.index')}}" class="nav-link">
          <i class=" nav-icon fas fa-user"></i>
          <p>
            Customer
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('product-in.index')}}" class="nav-link">
          <i class=" nav-icon fas fa-plus"></i>
          <p>
            Product In
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('product-out.index')}}" class="nav-link">
          <i class=" nav-icon fas fa-minus"></i>
          <p>
            Product Out
          </p>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->