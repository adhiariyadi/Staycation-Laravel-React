<ul
  class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
  id="accordionSidebar"
>
  <!-- Sidebar - Brand -->
  <a
    class="sidebar-brand d-flex align-items-center justify-content-center"
    href="index.html"
  >
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Staycation</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0" />
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a
    >
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider" />
  <!-- Heading -->
  <div class="sidebar-heading">
    Master
  </div>
  <!-- Nav Item - Category -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('category.index') }}">
      <i class="fas fa-fw fa-list-alt"></i>
      <span>Category</span></a
    >
  </li>
  <!-- Nav Item - Bank -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('bank.index') }}">
      <i class="fas fa-fw fa-money-check"></i>
      <span>Bank</span></a
    >
  </li>
  <!-- Nav Item - Item -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('item.index') }}">
      <i class="fas fa-fw fa-hotel"></i>
      <span>Item</span></a
    >
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider" />
  <!-- Heading -->
  <div class="sidebar-heading">
    Order
  </div>
  <!-- Nav Item - Booking -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('booking.index') }}">
      <i class="fas fa-fw fa-shopping-cart"></i>
      <span>Booking</span></a
    >
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block" />
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>