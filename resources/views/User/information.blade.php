@extends('User.layout.master')
@section('content')
<style>
    .menu-item {
      background-color: #fff;
      border-radius: 10px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .menu-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
    }
    .menu-item h3 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }
    .menu-item a {
      display: block;
      padding: 15px 0;
      color: #333;
      text-decoration: none;
      transition: color 0.3s ease;
      font-size: 18px;
    }
    .menu-item a:hover {
      color: #007bff;
    }
    .menu-item i {
      font-size: 48px;
      margin-right: 15px;
      color: #007bff;
    }
    .menu-item-bg {
      background-color: #007bff;
      background-image: linear-gradient(315deg, #007bff 0%, #00bcd4 74%);
      border-radius: 10px;
      padding: 20px;
      color: #fff;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .menu-item-bg:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 20px rgba(0, 123, 255, 0.4);
    }
    .menu-item-bg h3 {
      font-size: 24px;
      margin-bottom: 10px;
    }
    .menu-item-bg p {
      font-size: 16px;
      margin-bottom: 20px;
    }
    .menu-item-bg a {
      color: #fff;
      text-decoration: none;
      font-size: 18px;
      transition: color 0.3s ease;
      display: inline-block;
      border: 2px solid #fff;
      padding: 10px 20px;
      border-radius: 25px;
    }
    .menu-item-bg a:hover {
      background-color: #fff;
      color: #007bff;
    }
  </style>
   <body>
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

<div class="container mt-5">
    <div class="row">

    <div class="col-lg-6 mb-5">
        <div class="menu-item-bg">
            <i class="fas fa-wallet"></i>
            <h3 class="text-white">Top Up Saldo</h3>
            <p class="text-white">Masukkan saldo ke akun Anda untuk melakukan transaksi.</p>
            <a href="{{ route('topUp.index') }}">Top Up Sekarang <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>

    <div class="col-lg-6 mb-5">
        <div class="menu-item-bg">
            <i class="fas fa-money-bill"></i>
            <h3 class="text-white">Tarik Tunai</h3>
            <p class="text-white">Tarik tunai sejumlah uang dari akun Anda.</p>
            <a href="{{ route('withdraw') }}">Tarik Tunai Sekarang <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>

        <div class="col-lg-6 mb-5">
            <div class="menu-item-bg">
                <i class="fas fa-exchange-alt"></i>
                <h3 class="text-white">Transfer</h3>
                <p class="text-white">Transfer uang ke rekening teman atau keluarga Anda.</p>
                <a href="{{ route('transfer') }}">Transfer Sekarang <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>

    <div class="col-lg-6 mb-5">
        <div class="menu-item-bg">
            <i class="fas fa-history"></i>
            <h3 class="text-white">Riwayat Transaksi</h3>
            <p class="text-white">Tarik tunai sejumlah uang dari akun Anda.</p>
            <a href="{{ route('history') }}">Cek Mutasi Anda <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    </div>
</div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
@endsection
