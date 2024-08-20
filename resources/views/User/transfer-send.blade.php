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

    <style>
        /* body {
            background-color: #f0f4f8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        } */
        .card-custom {
            border-radius: 1.25rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            position: relative;
            overflow: hidden;
        }
        .card-header-custom {
            background-color: #4a90e2;
            color: #fff;
            border-top-left-radius: 1.25rem;
            border-top-right-radius: 1.25rem;
            padding: 1.25rem;
        }
        .input-group-text-custom {
            background-color: #e0e4e8;
            border: none;
        }
        .form-control-custom {
            border-radius: 0.75rem;
            border: 1px solid #d1d9e6;
            transition: all 0.3s ease;
        }
        .form-control-custom:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
        }
        .btn-custom {
            border-radius: 0.75rem;
            padding: 0.75rem 1.25rem;
            transition: all 0.3s ease;
            background-color: #4a90e2;
            border-color: #4a90e2;
        }
        .btn-custom:hover {
            background-color: #357abd;
            border-color: #357abd;
        }
        .modal-header-custom {
            background-color: #4a90e2;
            color: #fff;
        }
        .modal-content-custom {
            border-radius: 1.25rem;
        }
        .alert-custom {
            border-radius: 0.75rem;
            background-color: #e6f7ff;
            color: #0056b3;
        }
        .info-icon {
            color: #0056b3;
            margin-right: 0.5rem;
        }
        .icon {
            font-size: 1.5rem;
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

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-custom mb-5 mt-5">
                    <div class="card-header card-header-custom">
                        <h4 class="mb-0 text-white">Transfer ke Pengguna</h4>
                    </div>
                    <div class="card-body">
                        @if (isset($selectedUser))
                        <div class="alert alert-info alert-custom d-flex align-items-center">
                            <div>
                                <strong>Informasi Akun Tujuan:</strong><br>
                                <strong>Nama:</strong> {{ $selectedUser->name }}<br>
                                <strong>Nomor Telepon:</strong> {{ $selectedUser->phone }}
                            </div>
                        </div>

                        <form action="{{ route('transfer.process') }}" method="POST" id="confirmationForm">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $selectedUser->id }}">
                            <div class="form-group mb-4">
                                <label for="amount" class="form-label">Nominal Transfer</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-group-text-custom">Rp.</span>
                                    </div>
                                    <input type="text" id="amount" name="amount" class="form-control form-control-custom" placeholder="Masukkan nominal transfer (min. Rp10.000)" autocomplete="off"
                                        required pattern="[0-9]+" min="10000" onkeyup="validateAmount()" oninput="formatCurrency(this)">
                                    @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-custom" onclick="showTransferConfirmation()" id="prosesButton" disabled>Lanjutkan</button>
                        </form>

                        @else
                        <div class="alert alert-danger alert-custom d-flex align-items-center">
                            <i class="fas fa-exclamation-triangle info-icon"></i>
                            <div>
                                <strong>Error:</strong> Pengguna tidak ditemukan atau tidak valid.
                            </div>
                        </div>
                        @endif

                        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content modal-content-custom">
                                    <div class="modal-header modal-header-custom">
                                        <h5 class="modal-title text-white" id="confirmationModalLabel">Invoice</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="cancelConfirmation()"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong><i class="fas fa-dollar-sign icon"></i> Nominal Transfer:</strong> <span id="confirmedAmount"></span></p>
                                        <p><strong><i class="fas fa-feather icon"></i> Biaya Admin:</strong> Rp2.500</p>
                                        <p><strong><i class="fas fa-calculator icon"></i> Total yang Harus Dibayarkan:</strong> <span id="totalAmount"></span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-custom" data-bs-dismiss="modal" onclick="cancelConfirmation()">Batalkan</button>
                                        <button type="button" class="btn btn-primary btn-custom" onclick="confirmTransfer()">Kirim</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        // Function to format currency with thousands separators
        function formatCurrency(input) {
            let value = input.value.replace(/\D/g, '');
            if (value) {
                value = parseInt(value, 10).toLocaleString('id-ID');
                input.value = value;
            }
        }

        // Function to show the transfer confirmation modal
        function showTransferConfirmation() {
            const amount = document.getElementById('amount').value.replace(/\D/g, '');
            const formattedAmount = parseInt(amount, 10).toLocaleString('id-ID');
            const totalAmount = parseInt(amount, 10) + 2500;
            const formattedTotalAmount = totalAmount.toLocaleString('id-ID');

            document.getElementById('confirmedAmount').innerText = 'Rp' + formattedAmount;
            document.getElementById('totalAmount').innerText = 'Rp' + formattedTotalAmount;
            new bootstrap.Modal(document.getElementById('confirmationModal')).show();
        }

        // Function to confirm the transfer
        function confirmTransfer() {
            document.getElementById('confirmationForm').submit();
        }

        // Function to cancel the confirmation
        function cancelConfirmation() {
            new bootstrap.Modal(document.getElementById('confirmationModal')).hide();
        }

        // Function to validate amount
        function validateAmount() {
            // Example validation function
        }
    </script>

@endsection
