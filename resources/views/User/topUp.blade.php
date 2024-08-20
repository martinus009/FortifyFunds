@extends('User.layout.master')

        @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                toastr.success("{{ session('success') }}");
            });
        </script>
        @endif

@section('content')
    <style>
        .topup-section {
            background-color: #f8f9fa;
            padding: 60px 0;
        }
        .topup-text {
            text-align: center;
            margin-bottom: 40px;
        }
        .topup-text h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 10px;
        }
        .topup-text p {
            color: #888;
            font-size: 18px;
        }
        .topup-method {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }
        .topup-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
            width: calc(50% - 10px);
            margin-bottom: 20px;
        }
        .topup-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.2);
        }
        .topup-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }
        .topup-card p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
        .topup-card a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .topup-card a:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .topup-card {
                width: 100%;
            }
        }
    </style>

    <div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Pilih salah satu metode top up yang tersedia</p>
						<h1>Pilih Metode Top Up</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="topup-method">
                <div class="topup-card">
                    <i class="fas fa-wallet" style="font-size: 48px; color: #007bff;"></i>
                    <h3>Top Up Melalui Bank</h3>
                    <p>Tambahkan saldo ke akun Anda dari rekening bank Anda.</p>
                    <a href="#">Top Up Melalui Bank</a>
                </div>

                <div class="topup-card">
                    <i class="fas fa-credit-card" style="font-size: 48px; color: #007bff;"></i>
                    <h3>Top Up dengan Kartu Debit/Kredit</h3>
                    <p>Tambahkan saldo dengan menggunakan kartu debit atau kredit Anda.</p>
                    <a href="#">Top Up dengan Kartu</a>
                </div>

                <div class="topup-card">
                    <i class="fas fa-user" style="font-size: 48px; color: #007bff;"></i>
                    <h3>Top Up di Outlet Partner</h3>
                    <p>Top Up saldo melalui outlet atau partner kami yang terdekat.</p>
                    <a href="#">Top Up di Outlet</a>
                </div>

                <div class="topup-card">
                    <i class="fas fa-store" style="font-size: 48px; color: #007bff;"></i>
                    <h3>Top Up via Minimarket</h3>
                    <p>Tambahkan saldo menggunakan layanan Minimarket yang mendukung.</p>
                    <a href="{{ route('topUp.minimarket') }}">Top Up via Minimarket</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
@endsection
