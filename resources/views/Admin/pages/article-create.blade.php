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
            <form action="{{ route('create.article') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="title" name="title" required autocomplete="off">
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" id="slug" name="slug" readonly required>
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konten</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" name="content" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
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
                            <option value="event">Event</option>
                            <option value="promo">Promo</option>
                            <option value="artikel">Artikel</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                        <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric" name="status">
                                <option selected>Pilih Salah Satu Menu</option>
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                            <option value="pending">Pending</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary float-right">Buat Postingan</button>
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
        var titleInput = document.getElementById('title');
        var slugInput = document.getElementById('slug');

        titleInput.addEventListener('input', function() {
            var slug = slugify(titleInput.value);
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
</html>
@endsection
