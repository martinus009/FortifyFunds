      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">FortifyFunds</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">FF</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
                <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-columns"></i> Dashboard
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.user') ? 'active' : '' }}">
                    <a href="{{ route('admin.user') }}">
                        <i class="fas fa-user"></i> Pengguna
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.article') ? 'active' : '' }}">
                    <a href="{{ route('admin.article') }}">
                        <i class="fas fa-book"></i> Postingan
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.invest') ? 'active' : '' }}">
                    <a href="{{ route('admin.invest') }}">
                        <i class="fas fa-chart-bar"></i> Investasi
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.contact') ? 'active' : '' }}">
                    <a href="{{ route('admin.contact') }}">
                        <i class="fas fa-phone"></i> Kontak
                    </a>
                </li>
          </ul>

      </aside>
      </div>
