<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed"  href="{{url('category_page')}}">
          <i class="bi bi-menu-button-wide"></i><span>Categories</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('add_product')}}">
              <i class="bi bi-circle"></i><span>Product Creation</span>
            </a>
          </li>
          <li>
            <a href="{{url('product_list')}}">
              <i class="bi bi-circle"></i><span>Product List</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a href="{{url('orders')}}" class="nav-link collapsed">
          <i class="bi bi-layout-text-window-reverse"></i><span>Orders</span>
        </a>
      </li><!-- End Tables Nav -->

    </ul>

  </aside>