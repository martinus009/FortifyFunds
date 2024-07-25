    <!-- header -->
    <div class="top-header-area" id="sticker">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-sm-12 text-center">
            <div class="main-menu-wrap">
                <!-- logo -->
                <div class="site-logo">
                    <a href="#">
                        <img src="{{ asset('import/assets/img/logo.png')}}" alt="" />
                    </a>
                </div>
                <!-- logo -->

                <!-- menu start -->
                <nav class="main-menu">
                    <ul>
                        <li class="{{ Request::routeIs('Dashboard') ? 'current-list-item' : '' }}">
                            <a href="{{ route('Dashboard') }}">
                                Menu
                            </a>
                        </li>
                        <li class="{{ Request::routeIs('about') ? 'current-list-item' : '' }}">
                            <a href="{{ route('about') }}">Tentang</a>
                        </li>
                        <li class="{{ Request::routeIs('information') ? 'current-list-item' : '' }}">
                            <a href="{{ route('information') }}">Informasi</a>
                        </li>
                        <li class="{{ Request::routeIs('invest.more') ? 'current-list-item' : '' }}">
                            <a href="{{ route('invest.more') }}">Investasi</a>
                        </li>
                        <li class="{{ Request::routeIs('news') ? 'current-list-item' : '' }}">
                            <a href="{{ route('news') }}">Berita</a>
                        </li>
                        <li class="{{ Request::routeIs('contact') ? 'current-list-item' : '' }}">
                            <a href="{{ route('contact') }}">Kontak</a>
                        </li>
                        <li class="{{ Request::routeIs('profile') ? 'current-list-item' : '' }}">
                            <a href="{{ route('profile') }}">Profil</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">Logout</a>
                        </li>
                        <li>
                            <div class="header-icons">
                                <a class="shopping-cart" style="pointer-events: none">
                                    <span>Rp {{ number_format(Auth::user()->saldo, 0, ',', '.') }}</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- <a class="mobile-show search-bar-icon" href="#"
                    ><i class="fas fa-search"></i
                ></a> -->
                <div class="mobile-menu"></div>
                <!-- menu end -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end header -->
