<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
       <div class="p-3 border-bottom border-secondary">
                <a href="{{ route('admin.dashboard') }}" class="text-black text-decoration-none d-flex align-items-center">
                    <i class="bi bi-shop fs-4 me-2"></i>
                    <span class="fs-5 fw-bold">Admin Panel</span>
                </a>
            </div>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label>Dashboard</label>
          <i class="ti ti-dashboard"></i>
        </li>
        <li class="pc-item">
          <a href="../admin/dashboard" class="pc-link"
            ><span class="pc-micon"><i class="ti ti-dashboard"></i></span><span class="pc-mtext">Default</span></a
          >
        </li>

        <li class="pc-item pc-caption">
          <label>Pages</label>
          <i class="ti ti-apps"></i>
        </li>
        <li class="pc-item">
          <a href="{{ route('admin.categories.index') }}" class="pc-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
              <i class="bi bi-folder me-2"></i> Kategori
          </a>
        </li>
        <li class="pc-item">
          <a href="{{ route('admin.products.index') }}"
              class="pc-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
              <i class="bi bi-box-seam me-2"></i> Produk
          </a>
        </li>
        <li class="pc-item">
          <a class="pc-link" href="/admin/orders" aria-expanded="false">
              <span>
                  <i class="ti ti-receipt"></i>
              </span>
              <span class="hide-menu">Pesanan</span>
          </a>
        </li>
        <li class="pc-item">
          <a class="pc-link" href="/admin/reports/sales" aria-expanded="false">
              <span>
                  <i class="ti ti-receipt"></i>
              </span>
              <span class="hide-menu">Report</span>
          </a>
        </li>


      </ul>
      
      <div class="w-100 text-center">
        <div class="badge theme-version badge rounded-pill bg-light text-dark f-12"></div>
      </div>
    </div>
  </div>
</nav>