@extends('Admin.layout.master')


@section('content')
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        @include('Admin.layout.header')
      </nav>
      @include('Admin.app.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Halo, {{ auth()->user()->username }}</h2>
            <p class="section-lead">
              Anda Bisa Mengubah Informasi Pribadi Anda Disini
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <form action="{{ route('profile.reset') }}" method="post" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          {{-- <div class="form-group col-md-6 col-12">
                            <label>First Name</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->username }}" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div> --}}
                          <div class="form-group col-md-6 col-12">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->username }}" required name="username" autocomplete="off">
                            <div class="invalid-feedback">
                              Tolong Isi Nama Anda
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ auth()->user()->email }}" required name="email" autocomplete="off">
                            <div class="invalid-feedback">
                              Tolong Isi Email Anda
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Password</label>
                            <input type="password" class="form-control" value="" name="password" autocomplete="off">
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

</body>

@endsection
