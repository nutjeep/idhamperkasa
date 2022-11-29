<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/category') ? 'active' : '' }}" href="/dashboard/category">
          <span data-feather="list"></span>
          Category
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/product*') ? 'active' : '' }}" href="/dashboard/product">
          <span data-feather="shopping-cart"></span>
          Product
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/slider') ? 'active' : '' }}" href="/dashboard/slider">
          <span data-feather="copy"></span>
          Slider
        </a>
      </li>
    </ul>
  </div>
</nav>