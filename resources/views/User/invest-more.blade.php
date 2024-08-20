@extends('User.layout.master')


@section('content')
<style>
    .pagination .page-link {
    padding: .5rem .75rem;
    border: 1px solid #dee2e6;
    color: #007bff;
    background-color: #fff;
    border-radius: .25rem;
    transition: color .15s
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
						<p>Cara Terbaik Mewujudkan Impian Anda.</p>
						<h1>Investasi</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">Strawberry</li>
                            <li data-filter=".berry">Berry</li>
                            <li data-filter=".lemon">Lemon</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($invest as $market)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100 position-relative">
                        <div class="image-container">
                            <img src="{{ asset('InvestPhotos/'.$market->image) }}" class="img-fluid card-img" alt="Gambar Bank">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title">{{$market->code}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$market->name}}</h6>
                                <p class="card-text mb-0">Rp 9.600</p>
                                <p class="card-text mb-0 ms-auto">0 (0%)</p>
                            </div>
                            <a href="{{ route('invest.detail', $market->slug) }}" class="btn btn-primary position-relative bottom-0 start-0 mb-3 ms-3">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        {{ $invest->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

		</div>
	</div>
	<!-- end products -->

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
</html>
@endsection
