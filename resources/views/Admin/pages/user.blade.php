@extends('Admin.layout.master')

@section('content')

    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                toastr.success("{{ session('success') }}");
            });
        </script>
    @endif

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        @include('Admin.layout.header')
      </nav>
        @include('Admin.app.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pengguna</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Pengguna</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Pengguna</h2>
            <p class="section-lead">
                Anda Bisa Mengatur Pengguna Anda Disini
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-12 col-md-12 col-sm-12">
                            @if ($user->isEmpty())
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Tidak Ditemukan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="empty-state" data-height="400">
                                            <div class="empty-state-icon">
                                                <i class="fas fa-question"></i>
                                            </div>
                                            <h2>Saat Ini Anda Belum Memiliki Pengguna Yang terdaftar</h2>
                                            <p class="lead">
                                                Silahkan Promosikan Aplikasi Anda, Agar Anda Dapat Melihat Pengguna Anda Disini
                                            </p>
                                            {{-- <a href="#" class="btn btn-primary mt-4">Create new One</a>
                                            <a href="#" class="mt-4 bb">Need Help?</a> --}}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Ponsel</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $users)
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $loop->iteration }}">
                                                    <label for="checkbox-{{ $loop->iteration }}" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{ $users->username }}</td>
                                            <td>{{ $users->name }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>{{ $users->phone }}</td>
                                            <td>
                                                <form action="{{ $users->blocked_until ? route('user.unblock', ['id' => $users->id]) : route('user.block', ['id' => $users->id]) }}" method="POST">
                                                    @csrf
                                                    @if ($users->blocked_until)
                                                        <button type="submit" class="btn btn-primary">Pulihkan</button>
                                                    @else
                                                        <button type="submit" class="btn btn-danger">Blokir</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

</body>
</html>

@endsection
