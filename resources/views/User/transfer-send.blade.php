@extends('User.layout.master')

    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            });
        </script>
    @endif

@section('content')

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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm mb-5 mt-5">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 text-white">Transfer ke Pengguna</h4>
                </div>
                    <div class="card-body">
                        @if (isset($selectedUser))
                        <div class="alert alert-info">
                            <strong>Informasi Akun Penerima:</strong><br>
                            <strong>Nama:</strong> {{ $selectedUser->name }}<br>
                            <strong>Nomor Telepon:</strong> {{ $selectedUser->phone }}
                        </div>

                        <form action="{{ route('transfer.process') }}" method="POST" id="confirmationForm">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $selectedUser->id }}">
                            <div class="form-group">
                                <label for="amount">Nominal Transfer</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" id="amount" name="amount" class="form-control" placeholder="Masukkan nominal transfer (min. 10,000)" autocomplete="off"
                                        required pattern="[0-9]+" min="10000" onkeyup="validateAmount()" oninput="formatCurrency(this)">
                                    @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="showTransferConfirmation()" id="prosesButton" disabled>Proses Transfer</button>
                        </form>

                        @else
                        <div class="alert alert-danger">
                            <strong>Error:</strong> Pengguna tidak ditemukan atau tidak valid.
                        </div>
                        @endif

                        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title text-white" id="confirmationModalLabel">Invoice</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cancelConfirmation()">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nominal Transfer:</strong> <span id="confirmedAmount"></span></p>
                                        <p><strong>Biaya Admin:</strong> Rp2.500</p>
                                        <p><strong>Total yang Harus Dibayarkan:</strong> <span id="totalAmount"></span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cancelConfirmation()">Batalkan</button>
                                        <button type="button" class="btn btn-primary" onclick="confirmTransfer()">Konfirmasi Transfer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
