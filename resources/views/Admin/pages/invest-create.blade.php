@extends('Admin.layout.master')

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            });
        </script>
    @endif
@section('content')
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
            <div class="section-header-back">
              <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Buat Postingan Baru</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('admin.article') }}">Postingan</a></div>
              <div class="breadcrumb-item">Buat Postingan Baru</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Buat Postingan Baru</h2>
            <p class="section-lead">
              Anda Bisa Membuat Event - Postingan Disini
            </p>
            <form action="{{ route('invest.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="name" name="name" required autocomplete="off">
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ticker</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="code" name="code" required minlength="1" maxlength="5" autocomplete="off">
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="slug" name="slug" readonly required>
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail
                            (16:9)
                        </label>
                        <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Pilih Foto</label>
                            <input type="file" name="image" id="image-upload" required />
                            </div>
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" name="category">
                                <option selected>Pilih Salah Satu Menu</option>
                            <option value="saham">Saham</option>
                            <option value="reksaDana">Reksa Dana</option>
                            <option value="obligasi">Obligasi</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary float-right">Tambah Market</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var codeInput = document.getElementById('code');
        var slugInput = document.getElementById('slug');

        codeInput.addEventListener('input', function() {
            var slug = slugify(codeInput.value);
            slugInput.value = slug;
        });

        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')        // Replace spaces with -
                .replace(/[^\w\-]+/g, '')    // Remove all non-word chars
                .replace(/\-\-+/g, '-')      // Replace multiple - with single -
                .replace(/^-+/, '')          // Trim - from start of text
                .replace(/-+$/, '');         // Trim - from end of text
        }
    });
</script>
<script>
    document.getElementById('code').addEventListener('input', function() {
        this.value = this.value.toUpperCase();
    });
</script>
</html>
@endsection
