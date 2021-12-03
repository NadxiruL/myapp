<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('overview') }}">
            <span data-feather="activity"></span>
            Overview
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">
            <span data-feather="shopping-cart"></span>
            Orders
          </a>
        </li>
        
        <li button class="nav-item dropdown-btn">
          <a class="nav-link" href="{{ route('products') }}">
            <span data-feather="file"></span>
            Product
          </a>
        </li>

        <li button class="nav-item dropdown-btn">
          <a class="nav-link" href="{{ route('allproducts') }}">
            <span data-feather="package"></span>
            All Products
          </a>
        </li>

        
        <li button class="nav-item dropdown-btn">
          <a class="nav-link" href="{{ route('allproducts') }}">
            <span data-feather="layers"></span>
            Category
          </a>
        </li>

        
        <li button class="nav-item dropdown-btn">
          <a class="nav-link" href="{{ route('allproducts') }}">
            <span data-feather="users"></span>
            Customers
          </a>
        </li>

        <li button class="nav-item dropdown-btn">
          <a class="nav-link" href="{{ route('allproducts') }}">
            <span data-feather="settings"></span>
            Settings
          </a>
        </li>
      </ul>
    </div>
  </nav>

  