@extends('User.layout.master')

@section('content')
    <style>
      /* Custom CSS untuk tampilan lebih baik */
      .card {
        margin-bottom: 20px;
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }
      .card-header {
        background-color: #f8f9fa;
        border-bottom: none;
        font-weight: bold;
      }
      .card-body {
        padding: 20px;
      }
      .chart-container {
        height: 300px; /* Tinggi grafik disesuaikan agar sesuai dengan konten */
        margin-top: 20px;
      }
      .btn-buy {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
        transition: background-color 0.3s ease;
      }
      .btn-buy:hover {
        background-color: #218838;
        border-color: #1e7e34;
      }
      .card-title {
        margin-bottom: 0.5rem;
      }
      .card-subtitle {
        color: #6c757d;
        margin-bottom: 1rem;
      }
      .card-text {
        margin-bottom: 0.5rem;
      }
      .list-unstyled {
        padding-left: 0;
        list-style: none;
      }
      .list-unstyled li {
        margin-bottom: 10px;
      }
      .list-unstyled li a {
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s ease;
      }
      .list-unstyled li a:hover {
        color: #0056b3;
      }
      /* Responsiveness */
      @media (max-width: 768px) {
        .chart-container {
          height: 200px; /* Mengurangi tinggi grafik untuk layar kecil */
        }
      }
    </style>

	<!-- search area -->
	{{-- <div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- end search arewa -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
    <div class="container mt-5">
      <div class="row">
        <!-- Informasi Dasar Saham -->
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <img
                src="{{ asset('InvestPhotos/'.$invest->image) }}"
                class="img-fluid mb-3"
                style="max-width: 150px"
                alt="Logo Perusahaan"
              />
              <h5 class="card-title">{{$invest->name}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$invest->code}}</h6>
            </div>
            <div class="card-body">
              <p class="card-text">Harga Saat Ini: Rp 9.600</p>
              <p class="card-text">Perubahan Harga: 0 (0%)</p>
              <hr />
              <!-- Grafik Harga -->
              <div class="chart-container">
                <!-- Tempat untuk grafik menggunakan library seperti Chart.js -->
                <canvas id="priceChart"></canvas>
              </div>
              <!-- Tombol Beli Saham -->
              <a href="#" class="btn btn-success btn-buy mt-3">Beli Saham</a>
            </div>
          </div>
        </div>
        <!-- Informasi Tambahan -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Data Fundamental</h5>
            </div>
            <div class="card-body">
              <p class="card-text">P/E Ratio: 15.6</p>
              <p class="card-text">Dividend Yield: 3.2%</p>
              <p class="card-text">Market Cap: $10B</p>
            </div>
          </div>
          {{-- <div class="card">
            <div class="card-header">
              <h5 class="card-title">Berita Terbaru</h5>
            </div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li><a href="#">Judul Berita 1</a></li>
                <li><a href="#">Judul Berita 2</a></li>
                <li><a href="#">Judul Berita 3</a></li>
              </ul>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	{{-- <div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- end more products -->

	<!-- logo carousel -->
	{{-- <div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- end logo carousel -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Chart.js untuk grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Script untuk inisialisasi dan pengaturan grafik -->
    <script>
      // Data contoh untuk grafik
      var priceData = {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"],
        datasets: [
          {
            label: "Harga Saham",
            data: [4000, 1500, 2000, 3500, 1000, 2500, 4500, 3000, 7000, 6500, 8000, 10000],
            fill: false,
            borderColor: "rgb(75, 192, 192)",
            tension: 0,
          },
        ],
      };

      // Pengaturan grafik
      var priceCtx = document.getElementById("priceChart").getContext("2d");
      var priceChart = new Chart(priceCtx, {
        type: "line",
        data: priceData,
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            x: {
              display: true,
              title: {
                display: true,
                text: "Bulan",
              },
            },
            y: {
              display: true,
              title: {
                display: true,
                // text: "Harga",
              },
            },
          },
        },
      });
    </script>
</html>
@endsection
