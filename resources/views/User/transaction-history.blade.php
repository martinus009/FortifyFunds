@extends('User.layout.master')

@section('content')

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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm mb-5 mt-5">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 text-white">Riwayat Transaksi</h4>
                    </div>
                    <div class="card-body">
                        @if ($transactions->isEmpty())
                            <div class="alert alert-info">
                                Belum ada transaksi yang dilakukan.
                            </div>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Pengirim</th>
                                        <th>Penerima</th>
                                        <th>Jenis Transaksi</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->created_at->format('d M Y H:i:s') }}</td>
                                        <td>{{ $transaction->sender->name }}</td>
                                        <td>{{ $transaction->receiver->name }}</td>
                                        <td>{{ $transaction->type }}</td>
                                        <td>Rp{{ number_format($transaction->amount, 2, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
