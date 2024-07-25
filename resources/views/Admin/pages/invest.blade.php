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
            <h1>Investasi</h1>
                <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Investasi</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Investasi</h2>
            <p class="section-lead">Anda Bisa Mengatur Market Anda Disini</p>
            <a href="{{ route('admin.market') }}" class="btn btn-success float-right">Buat</a>
            <br>
            <br>
            <br>
            <div class="row">
                @if ($invest->isEmpty())
                    <div class="col-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Kosong</h4>
                            </div>
                            <div class="card-body">
                                <div class="empty-state" data-height="400">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-question"></i>
                                    </div>
                                    <h2>Kami tidak dapat menemukan data apa pun</h2>
                                    <p class="lead">
                                        Maaf kami tidak dapat menemukan data apa pun, untuk menghilangkan pesan ini, buatlah setidaknya 1 data.
                                    </p>
                                    {{-- <a href="#" class="btn btn-primary mt-4">Create new One</a> --}}
                                    {{-- <a href="#" class="mt-4 bb">Need Help?</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Table</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invest as $market)
                                                <tr>
                                                    <td>
                                                        <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{ $loop->iteration }}">
                                                            <label for="checkbox-{{ $loop->iteration }}" class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td>{{ $market->code }}</td>
                                                    <td>{{ $market->name }}</td>
                                                    <td>
                                                        <img alt="image" src="{{ asset('InvestPhotos/'.$market->image) }}" class="rounded-circle" width="35" data-toggle="tooltip" title="{{ $market->name }}">
                                                    </td>
                                                    <td>{{ $market->category }}</td>
                                                    <td><a href="#" class="btn btn-primary">Lihat</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
@endsection
