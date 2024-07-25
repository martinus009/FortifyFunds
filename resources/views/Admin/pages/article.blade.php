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
            <li><a href="{{('edit.article')}}" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        @include('Admin.layout.header')
      </nav>
      @include('Admin.app.sidebar')

      <!-- Main Content -->
        <div class="main-content">
            <section class="section">
            <div class="section-header">
                <h1>Postingan</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                  <div class="breadcrumb-item">Postingan</div>
                </div>
            </div>
            <div class="section-body">
            <h2 class="section-title">Postingan</h2>
            <p class="section-lead">Anda Bisa Mengatur Postingan Anda Disini</p>
            <a href="{{ route('article.create') }}" class="btn btn-success float-right">Buat</a>
            <br>
            <br>
            <br>
            @if ($article->isEmpty())
                        <div class="col-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data kosong</h4>
                                </div>
                                <div class="card-body">
                                    <div class="empty-state" data-height="400">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>Kami tidak dapat menemukan postingan apa pun</h2>
                                        <p class="lead">
                                            Maaf, kami tidak dapat menemukan postingan apa pun. Untuk menghilangkan pesan ini, buatlah setidaknya satu artikel.
                                        </p>
                                        {{-- <a href="{{('edit.article')}}" class="btn btn-primary mt-4">Create New Article</a>
                                        <a href="{{('edit.article')}}" class="mt-4 bb">Need Help?</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else


              <div class="row">
                @foreach ($article as $post)
                <div class="col-12 col-md-4 col-lg-4">
                  <article class="article article-style-c">
                    <div class="article-header">
                      <div class="article-image" data-background="{{ asset('ArticlesPhotos/'.$post->image) }}">
                      </div>
                    </div>
                    <div class="article-details">
                      <div class="article-category"><a href="{{ route('edit.article', $post->slug) }}">{{ $post->category }}</a> <div class="bullet"></div> <a href="{{ route('edit.article', $post->slug) }}">{{ \Carbon\Carbon::parse($post->created_at)->format('d F Y') }}</a>
                        @php
                            $statusColor = '';
                            switch ($post->status) {
                                case 'publish':
                                    $statusColor = 'badge-success';
                                    break;
                                case 'draft':
                                    $statusColor = 'badge-primary';
                                    break;
                                  case 'pending':
                                  $statusColor = 'badge-danger';
                                  break;
                              default:
                                  $statusColor = 'badge-secondary';
                                  break;
                                }
                        @endphp
                        <span class="badge {{ $statusColor }}">{{ ucfirst($post->status) }}</span>
                    </div>
                      <div class="article-title">
                        <h2><a href="{{ route('edit.article', $post->slug) }}">{{$post->title}}</a></h2>
                      </div>
                      <p>{!! Illuminate\Support\Str::limit(strip_tags($post->content), 100) !!}</p>
                      <div class="article-user">
                        <div class="article-user-details">
                          <div class="user-detail-name">
                            <a href="{{ route('edit.article', $post->slug) }}">FortifyFunds</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </article>
                </div>
                @endforeach
              </div>
            </div>
          @endif
        </section>
      </div>
    </div>
  </div>
</body>
</html>
@endsection()
