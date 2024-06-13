@extends('User.layout.header')

    <!-- header -->
    <div class="top-header-area" id="sticker">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-sm-12 text-center">
            <div class="main-menu-wrap">
              <!-- logo -->
              <div class="site-logo">
                <a href="#">
                  <img src="{{ asset('import/assets/img/logo.png')}}" alt="" />
                </a>
              </div>
              <!-- logo -->

              <!-- menu start -->
              <nav class="main-menu">
                <ul>
                  <li class="current-list-item">
                    <a href="#">Menu</a>
                    <ul class="sub-menu">
                      <li><a href="#">Static Home</a></li>
                      <li><a href="#">Slider Home</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Investasi</a></li>
                  <li><a href="#">Informasi</a></li>
                  <!-- <li>
                    <a href="#">Kontak </a>
                    <ul class="sub-menu">
                      <li><a href="#">404 page</a></li>
                      <li><a href="#">About</a></li>
                      <li><a href="#">Cart</a></li>
                      <li><a href="#">Check Out</a></li>
                      <li><a href="#">Contact</a></li>
                      <li><a href="#">News</a></li>
                      <li><a href="#">Shop</a></li>
                    </ul>
                  </li> -->
                  <li>
                    <a href="#">News</a>
                    <ul class="sub-menu">
                      <li><a href="#">News</a></li>
                      <li><a href="#">Single News</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Contact</a></li>
                  <li>
                    <a href="#">Shop</a>
                    <ul class="sub-menu">
                      <li><a href="#">Shop</a></li>
                      <li><a href="#">Check Out</a></li>
                      <li><a href="#">Single Product</a></li>
                      <li><a href="#">Cart</a></li>
                    </ul>
                  </li>
                  <li>
                    <div class="header-icons">
                      <a class="shopping-cart" style="pointer-events: none">
                        <!-- <i class="fas fa-money-bill-wave"></i>  -->
                        <span>Rp 100.000</span>
                      </a>

                      <!-- <a class="mobile-hide search-bar-icon" href="#"
                        ><i class="fas fa-search"></i
                      ></a> -->
                    </div>
                  </li>
                </ul>
              </nav>
              <!-- <a class="mobile-show search-bar-icon" href="#"
                ><i class="fas fa-search"></i
              ></a> -->
              <div class="mobile-menu"></div>
              <!-- menu end -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end header -->

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
    <!-- end search area -->

    <!-- hero area -->
    <div class="hero-area hero-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 offset-lg-2 text-center">
            <div class="hero-text">
              <div class="hero-text-tablecell">
                <p class="subtitle">Keamanan Yang Kuat</p>
                <h1>Untuk Keuangan Anda</h1>
                <div class="hero-btns">
                  <!-- <a href="#" class="boxed-btn">Fruit Collection</a>
                  <a href="#" class="bordered-btn">Contact Us</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end hero area -->

    <!-- features list section -->
    <!-- <div class="list-section pt-80 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="list-box d-flex align-items-center">
              <div class="list-icon">
                <i class="fas fa-shipping-fast"></i>
              </div>
              <div class="content">
                <h3>Free Shipping</h3>
                <p>When order over $75</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
            <div class="list-box d-flex align-items-center">
              <div class="list-icon">
                <i class="fas fa-phone-volume"></i>
              </div>
              <div class="content">
                <h3>24/7 Support</h3>
                <p>Get support all day</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div
              class="list-box d-flex justify-content-start align-items-center"
            >
              <div class="list-icon">
                <i class="fas fa-sync"></i>
              </div>
              <div class="content">
                <h3>Refund</h3>
                <p>Get refund within 3 days!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- end features list section -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
              <h3>
                Kembangkan Kekayaan Anda Dengan
                <span class="orange-text">Investasi</span>
              </h3>
              <p>Masa Depan Adalah Milik Mereka Yang Menyiapkan Hari Ini</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
              <div class="product-image">
                <a href="#"><img src="{{ asset('import/assets/img/bank/bca.png')}}" alt="" /></a>
              </div>
              <h3>Bank Central Asia</h3>
              <p class="product-price"><span>Per LOT</span> 85$</p>
              <a href="#" class="cart-btn"><i class="fas fa-eye"></i> Lihat</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
              <div class="product-image">
                <a href="#"><img src="{{ asset('import/assets/img/bank/bca.png')}}" alt="" /></a>
              </div>
              <h3>Bank Central Asia</h3>
              <p class="product-price"><span>Per LOT</span> 85$</p>
              <a href="#" class="cart-btn"><i class="fas fa-eye"></i> Lihat</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
              <div class="product-image">
                <a href="#"><img src="{{ asset('import/assets/img/bank/bca.png')}}" alt="" /></a>
              </div>
              <h3>Bank Central Asia</h3>
              <p class="product-price"><span>Per LOT</span> 85$</p>
              <a href="#" class="cart-btn"><i class="fas fa-eye"></i> Lihat</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
              <div class="product-image">
                <a href="#"><img src="{{ asset('import/assets/img/bank/bca.png')}}" alt="" /></a>
              </div>
              <h3>Bank Central Asia</h3>
              <p class="product-price"><span>Per LOT</span> 85$</p>
              <a href="#" class="cart-btn"><i class="fas fa-eye"></i> Lihat</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
              <div class="product-image">
                <a href="#"><img src="{{ asset('import/assets/img/bank/bca.png')}}" alt="" /></a>
              </div>
              <h3>Bank Central Asia</h3>
              <p class="product-price"><span>Per LOT</span> 70$</p>
              <a href="#" class="cart-btn"><i class="fas fa-eye"></i> Lihat</a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
            <div class="single-product-item">
              <div class="product-image">
                <a href="#"><img src="{{ asset('import/assets/img/bank/bca.png')}}" alt="" /></a>
              </div>
              <h3>Bank Central Asia</h3>
              <p class="product-price"><span>Per LOT</span> 35$</p>
              <a href="#" class="cart-btn"><i class="fas fa-eye"></i> Lihat</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end product section -->

    <!-- cart banner section -->
    <section class="cart-banner pt-100 pb-100">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 text-center">
          <div class="section-title">
            <h3>
              Rekomendasi
              <span class="orange-text">Pilihan</span>
            </h3>
            <!-- <p>Masa Depan Adalah Milik Mereka Yang Menyiapkan Hari Ini</p> -->
          </div>
        </div>
      </div>
        <div class="col-lg-12 text-center">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div id="promoCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('import/assets/img/promo/image-20.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text" align="left">Promo</p>
                        <h5 class="card-title">Promo Dasyat Hari Ini</h5>
                        </div>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('import/assets/img/promo/JD.ID-Harinya-Banyak-Diskon.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text" align="left">Promo</p>
                        <h5 class="card-title">Promo Dasyat Hari Ini</h5>
                        </div>
                    </div>
                    </div>
                    <!-- Tambahkan item-item slider lainnya sesuai kebutuhan -->
                </div>
                <a class="carousel-control-prev" href="#promoCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#promoCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- end cart banner section -->

    <!-- testimonail-section -->
    <!-- <div class="testimonail-section mt-150 mb-150">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 offset-lg-1 text-center">
            <div class="testimonial-sliders">
              <div class="single-testimonial-slider">
                <div class="client-avater">
                  <img src="assets/img/avaters/avatar1.png" alt="" />
                </div>
                <div class="client-meta">
                  <h3>Saira Hakim <span>Local shop owner</span></h3>
                  <p class="testimonial-body">
                    " Sed ut perspiciatis unde omnis iste natus error veritatis
                    et quasi architecto beatae vitae dict eaque ipsa quae ab
                    illo inventore Sed ut perspiciatis unde omnis iste natus
                    error sit voluptatem accusantium "
                  </p>
                  <div class="last-icon">
                    <i class="fas fa-quote-right"></i>
                  </div>
                </div>
              </div>
              <div class="single-testimonial-slider">
                <div class="client-avater">
                  <img src="assets/img/avaters/avatar2.png" alt="" />
                </div>
                <div class="client-meta">
                  <h3>David Niph <span>Local shop owner</span></h3>
                  <p class="testimonial-body">
                    " Sed ut perspiciatis unde omnis iste natus error veritatis
                    et quasi architecto beatae vitae dict eaque ipsa quae ab
                    illo inventore Sed ut perspiciatis unde omnis iste natus
                    error sit voluptatem accusantium "
                  </p>
                  <div class="last-icon">
                    <i class="fas fa-quote-right"></i>
                  </div>
                </div>
              </div>
              <div class="single-testimonial-slider">
                <div class="client-avater">
                  <img src="assets/img/avaters/avatar3.png" alt="" />
                </div>
                <div class="client-meta">
                  <h3>Jacob Sikim <span>Local shop owner</span></h3>
                  <p class="testimonial-body">
                    " Sed ut perspiciatis unde omnis iste natus error veritatis
                    et quasi architecto beatae vitae dict eaque ipsa quae ab
                    illo inventore Sed ut perspiciatis unde omnis iste natus
                    error sit voluptatem accusantium "
                  </p>
                  <div class="last-icon">
                    <i class="fas fa-quote-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- end testimonail-section -->

    <!-- advertisement section -->
<div class="abt-section mb-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="abt-bg mt-5">
          <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube">
            <img src="link_gambar" alt="Video Thumbnail" width="100%">
            <i class="fas fa-play"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="abt-text">
          <p class="top-sub">Temukan Lebih Banyak</p>
          <h2>Tentang <span class="orange-text">FortifyFunds</span></h2>
          <p align="justify">
            FortifyFunds adalah dompet digital yang dirancang untuk memberikan keamanan tingkat tinggi untuk transaksi keuangan Anda. Dengan FortifyFunds, Anda bisa melakukan pembayaran, transfer, dan pengelolaan uang dengan mudah dan aman. Kami mengutamakan keamanan data dan dana Anda dengan fitur enkripsi canggih dan otentikasi multi-faktor. Nikmati kemudahan akses keuangan Anda kapan saja dan di mana saja dengan FortifyFunds, e-wallet yang menjaga keamanan dana Anda sekuat benteng. Aplikasi ini cocok untuk semua kalangan, dari pelajar hingga lansia, memberikan solusi keuangan yang praktis dan terpercaya.
          </p>
          <a href="#" class="boxed-btn mt-3">Temukan Lebih Banyak</a>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- end advertisement section -->

    <!-- shop banner -->
    <!-- <section class="shop-banner">
      <div class="container">
        <h3>
          December sale is on! <br />
          with big <span class="orange-text">Discount...</span>
        </h3>
        <div class="sale-percent">
          <span
            >Sale! <br />
            Upto</span
          >50% <span>off</span>
        </div>
        <a href="#" class="cart-btn btn-lg">Shop Now</a>
      </div>
    </section> -->
    <!-- end shop banner -->

    <!-- latest news -->
    <div class="latest-news pt-150 pb-150">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2 text-center">
            <div class="section-title">
              <h3><span class="orange-text">Update</span> Terbaru</h3>
              <p>Mari Belajar Mengatur Keuangan Dengan FortifyFunds</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="single-latest-news fixed-width-card">
              <!-- Tambahkan kelas fixed-width-card -->
              <a href="#"><div class="latest-news-bg news-bg-1"></div></a>
              <div class="news-text-box">
                <h3>
                  <a href="#">Cerdas Finansial</a>
                </h3>
                <p class="blog-meta">
                  <span class="author">
                    <i class="fas fa-user"></i> FortifyFunds
                  </span>
                  <span class="date">
                    <i class="fas fa-calendar"></i> 10 Maret, 2006
                  </span>
                </p>
                <p class="excerpt">Yuk Melek Finansial Bersama FortifyFunds</p>
                <a href="#" class="read-more-btn"
                  >Selengkapnya <i class="fas fa-angle-right"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="single-latest-news fixed-width-card">
              <!-- Tambahkan kelas fixed-width-card -->
              <a href="#"><div class="latest-news-bg news-bg-2"></div></a>
              <div class="news-text-box">
                <h3>
                  <a href="#">Promo Voucher Favorit</a>
                </h3>
                <p class="blog-meta">
                  <span class="author">
                    <i class="fas fa-user"></i> FortifyFunds
                  </span>
                  <span class="date">
                    <i class="fas fa-calendar"></i> 09 September, 2007
                  </span>
                </p>
                <p class="excerpt">
                  Yuk Cek Berbagai Promo Menarik Di aplikasi FortifyFunds
                  Sekarang
                </p>
                <a href="#" class="read-more-btn"
                  >Selengkapnya <i class="fas fa-angle-right"></i
                ></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="single-latest-news fixed-width-card">
              <!-- Tambahkan kelas fixed-width-card -->
              <a href="#"><div class="latest-news-bg news-bg-3"></div></a>
              <div class="news-text-box">
                <h3>
                  <a href="#">Gaya Hidup Sehat</a>
                </h3>
                <p class="blog-meta">
                  <span class="author">
                    <i class="fas fa-user"></i> FortifyFunds
                  </span>
                  <span class="date">
                    <i class="fas fa-calendar"></i> 13 Juni, 2021
                  </span>
                </p>
                <p class="excerpt">5 Manfaat Bersepeda Di Tengah Kota</p>
                <a href="#" class="read-more-btn"
                  >Selengkapnya <i class="fas fa-angle-right"></i
                ></a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 text-center">
            <a href="#" class="boxed-btn">More News</a>
          </div>
        </div>
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

    @include('User.layout.footer')
