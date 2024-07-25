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
            <h1>Kontak</h1>
          </div>
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Informasi Perusahaan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="company_name">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="company_name" name="name" value="{{$company->name}}" required autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="address">Informasi Produk</label>
                                <textarea class="summernote-simple" id="address" name="information" rows="3" required>{{$company->information}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat Perusahaan</label>
                                <textarea class="summernote-simple" id="address" name="address" rows="3" required>{{$company->address}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Nomor Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                    <input type="text" class="form-control" id="phone_number" name="phone" value="{{$company->phone}}" required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Perusahaan</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$company->email}}" required autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
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
