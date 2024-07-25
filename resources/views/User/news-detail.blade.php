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
              <h1>News</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single article section -->

    <div class="mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-article-section">
                        <div class="single-article-text">
                            <img src="{{ asset('ArticlesPhotos/'.$news->image) }}" class="single-artcile"></img>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> FortifyFunds</span>
                                <span class="date"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</span>
                            </p>
                            <h2>{{ $news->title }}</h2>
                            <p align="justify">
                                {!! $news->content !!}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar-section">
                        <div class="recent-posts">
                            <h4>Berita Terkait</h4>
                            <ul>
                                @foreach ($relatedNews as $related)
                                <li>
                                    <div class="media">
                                        {{-- <img src="{{ asset('ArticlesPhotos/'.$related->image) }}" class="mr-3" alt="Thumbnail" style="width: 60px;"> --}}
                                        <div class="media-body">
                                            <a href="{{ route('news.detail', $related->slug) }}">{{ $related->title }}</a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- end single article section -->

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
