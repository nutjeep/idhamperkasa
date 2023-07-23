<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">IDHAM S P</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    All Product
  </div>
 
  <!-- Nav Item - Category -->
  <li class="nav-item  {{ Request::is('dashboard/category') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('category') }}">
      <i class="fas fa-boxes"></i>
      <span>Category</span>
    </a>
  </li>

  <!-- Nav Item - Product -->
  <li class="nav-item  {{ Request::is('dashboard/product*') ? 'active' : '' }}">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
      aria-expanded="true" aria-controls="collapseProduct">
      <i class="fas fa-box"></i>
      <span>Product</span>
    </a>
    <div id="collapseProduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('product.pt') }}">PT. Idham S Perkasa</a>
        <a class="collapse-item" href="{{ route('product.cv') }}">CV. Idham Perkasa</a>
      </div>
    </div>
  </li>
 
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Landing Page
  </div>

  <!-- Nav Item - Image Slider -->
  <li class="nav-item  {{ Request::is('dashboard/company') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.company') }}">
      <i class="fas fa-building"></i>
      <span>Company</span>
    </a>
  </li>

  <!-- Nav Item - Image Slider -->
  <li class="nav-item  {{ Request::is('dashboard/image-slider') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('image.slider') }}">
      <i class="fas fa-image"></i>
      <span>Image Slider</span>
    </a>
  </li>

  <!-- Nav Item - Contact -->
  {{-- <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard.contact') }}">
      <i class="fas fa-phone"></i>
      <span>Contact</span>
    </a>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>