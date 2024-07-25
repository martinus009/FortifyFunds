<!-- resources/views/search-user.blade.php -->

@extends('user.layout.master')

@section('content')

    <style>
        /* body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        } */
        .containerr {
            max-width: 800px;
            margin: auto;
            padding: 30px 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-primary {
            border-radius: 20px;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .badge-danger {
            background-color: #dc3545;
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
        }
        .table th, .table td {
            vertical-align: middle;
        }
    </style>

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

    <div class="containerr mt-5">
        <div class="card">
            <div class="card-header">
                Cari Pengguna Berdasarkan Nomor Telepon
            </div>
            <div class="card-body">
                <form action="{{ route('user.search') }}" method="GET">
                    <div class="form-group">
                        <label for="phone">Masukkan Nomor Telepon</label>
                        <div class="input-group">
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Masukkan nomor telepon" autocomplete="off">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary">Cari Pengguna</button>
                            </div>
                        </div>
                    </div>
                </form>

                @if (isset($error))
                <div class="alert alert-danger mt-4" role="alert">
                    {{ $error }}
                </div>
                @endif

                @if (isset($users) && !$users->isEmpty())
                <div class="card mt-4">
                    <div class="card-header bg-success text-white">
                        Hasil Pencarian
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nomor Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @if ($user->status === 'banned')
                                            <span class="badge badge-danger">Akun Ditangguhkan</span>
                                            @else
                                            <a href="{{ route('transfer.send', ['user_id' => $user->id]) }}" class="btn btn-primary">Transfer ke {{ $user->name }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


    <script>
    // Ambil elemen input dengan id 'phone'
    var phoneInput = document.getElementById('phone');

    // Tambahkan event listener untuk event input
    phoneInput.addEventListener('input', function(event) {
        // Dapatkan nilai input saat ini
        var inputValue = phoneInput.value;

        // Hapus semua karakter yang bukan angka
        var numericValue = inputValue.replace(/\D/g, '');

        // Update nilai input dengan hanya angka yang valid
        phoneInput.value = numericValue;
    });
</script>

@endsection
