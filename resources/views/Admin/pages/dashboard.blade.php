@extends('Admin.layout.master')
{{-- @php
function formatRupiah($saldo) {
    $suffixes = ['', 'Rb', 'Jt', 'M', 'T', 'Kuad'];
    $suffixIndex = 0;

    while ($saldo >= 1000 && $suffixIndex < count($suffixes) - 1) {
        $saldo /= 1000;
        $suffixIndex++;
    }

    return number_format($saldo, 3, '.', '.') . $suffixes[$suffixIndex];
}

@endphp --}}
@section('content')
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            {{-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> --}}
          </ul>
        </form>
        @include('Admin.layout.header')
      </nav>
      @include('Admin.app.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats" style="height: 50px">
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ $totalUsersOnline }}</div>
                      <div class="card-stats-item-label">Online</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ $totalUsersOffline }}</div>
                      <div class="card-stats-item-label">Offline</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">{{ $totalUsersBanned }}</div>
                      <div class="card-stats-item-label">Banned</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary text-white">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Pengguna</h4>
                  </div>
                  <div class="card-body">
                    {{$totalUsers}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart" style="height: 60px">
                  {{-- <canvas id="balance-chart"></canvas> --}}
                </div>
                <div class="card-icon shadow-primary bg-primary text-white">
                    <i class="fa-solid fa-rupiah-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Aset</h4>
                  </div>
                  <div class="card-body">
                    Rp{{ number_format(Auth::user()->saldo, 0, ',', '.') }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart" style="height: 60px">
                  {{-- <canvas id="sales-chart" height="80"></canvas> --}}
                </div>
                <div class="card-icon shadow-primary bg-primary text-white">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Artikel</h4>
                  </div>
                  <div class="card-body">
                    {{$totalArtikel}}
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section-body">
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection
