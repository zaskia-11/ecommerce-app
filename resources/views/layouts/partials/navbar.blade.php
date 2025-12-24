<header class="pc-header">
  <div class="header-wrapper"><!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <li class="pc-h-item header-mobile-collapse">
      <a href="#" class="pc-head-link head-link-secondary ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item d-inline-flex d-md-none">
      <a
        class="pc-head-link head-link-secondary dropdown-toggle arrow-none m-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ti ti-search"></i>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <form class="px-3">
          <div class="mb-0 d-flex align-items-center">
            <i data-feather="search"></i>
            <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . ." />
          </div>
        </form>
      </div>
    </li>
    <li class="pc-h-item d-none d-md-inline-flex">
      <form class="header-search">
        <i data-feather="search" class="icon-search"></i>
        <input type="text" name="q" class="form-control" placeholder="Cari produk..."
        value="{{ request('q') }}">
        <button class="btn btn-light-secondary btn-search" type="submit"><i class="ti ti-adjustments-horizontal"></i></button>
      </form>
    </li>
  </ul>
</div>
<!-- [Mobile Media Block end] -->
<div class="ms-auto">
  <ul class="list-unstyled">
    
    <li class="dropdown pc-h-item header-user-profile">
      <a 
        class="ps-3 w-100 pc-head-link head-link-secondary dropdown-toggle arrow-none me-5"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
       <img src="{{ auth()->user()->avatar_url }}" class="rounded-circle me-2" width="32" height="32"
            alt="{{ auth()->user()->name }}">
        <span class="pe-3 d-none d-lg-inline">{{ auth()->user()->name }}</span>
      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header">
          <h4>
            Good Morning,
            <span class="small text-muted">Admin</span>
          </h4>
          <hr />
          <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 280px)">
             <a class="dropdown-item" href="{{ route('profile.edit') }}">
                  <i class="bi bi-person me-2"></i> Profil Saya
              </a>
              <a class="dropdown-item" href="{{ route('orders.index') }}">
                  <i class="bi bi-bag me-2"></i> Pesanan Saya
              </a>                       
              <hr>
             <a class="dropdown-item text-primary" href="{{ route('admin.dashboard') }}">
                  <i class="bi bi-speedometer2 me-2"></i> Admin Panel
              </a>
            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
          </div>
        </div>
      </div>
    </li>
  </ul>
</div>
</div>
</header>