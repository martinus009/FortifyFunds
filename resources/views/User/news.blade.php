@extends('User.layout.master')

@section('content')
    <!-- search area -->
    <!-- <div class="search-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <span class="close-btn"><i class="fas fa-window-close"></i></span>
            <div class="search-bar">
              <div class="search-bar-tablecell">
                <h3>Search For:</h3>
                <input type="text" placeholder="Keywords" />
                <button type="submit">
                  Search <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- end search arewa -->

    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 text-center">
            <div class="breadcrumb-text">
              <p>FortifyFunds</p>
              <h1>Hot News</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- latest news -->
        <div class="latest-news mt-150 mb-150">
            <div class="container">
                @if ($news->isEmpty())
                    <div class="row">
                        <div class="col-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="empty-state" data-height="400">
                                        <div class="empty-state-icon">
                                            <i class="fas fa-question"></i>
                                        </div>
                                        <h2>Tidak ada postingan yang tersedia saat ini.</h2>
                                        {{-- <p class="lead">
                                            Sorry, there are no news articles available at the moment. Please check back later.
                                        </p> --}}
                                        {{-- <a href="#" class="btn btn-primary mt-4">Create New One</a>
                                        <a href="#" class="mt-4 bb">Need Help?</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        @foreach ($news as $post)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-latest-news">
                                    <a href="{{ route('news.detail', $post->slug) }}">
                                        <img class="card-img" src="{{ asset('ArticlesPhotos/'.$post->image) }}">
                                    </a>
                                    <div class="news-text-box">
                                        <h3>
                                            <a href="{{ route('news.detail', $post->slug) }}">{{ $post->title }}</a>
                                        </h3>
                                        <p class="blog-meta">
                                            <span class="author"><i class="fas fa-user"></i> FortifyFunds</span>
                                            <span class="date"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($post->created_at)->format('d F, Y') }}</span>
                                        </p>
                                        <p class="excerpt">
                                            {!! Illuminate\Support\Str::limit(strip_tags($post->content), 100) !!}
                                        </p>
                                        <a href="{{ route('news.detail', $post->slug) }}" class="read-more-btn">Selengkapnya <i class="fas fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Pagination bisa tetap ada jika diperlukan -->

            </div>
        </div>
    <!-- end latest news -->

    <!-- logo carousel -->
    <!-- <div class="logo-carousel-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="logo-carousel-inner">
              <div class="single-logo-item">
                <img src="assets/img/company-logos/1.png" alt="" />
              </div>
              <div class="single-logo-item">
                <img src="assets/img/company-logos/2.png" alt="" />
              </div>
              <div class="single-logo-item">
                <img src="assets/img/company-logos/3.png" alt="" />
              </div>
              <div class="single-logo-item">
                <img src="assets/img/company-logos/4.png" alt="" />
              </div>
              <div class="single-logo-item">
                <img src="assets/img/company-logos/5.png" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- end logo carousel -->
</html>
@endsection
