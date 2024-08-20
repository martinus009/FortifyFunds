@extends('User.layout.master')
@section('content')

<style>
  /* .breadcrumb-section {
    background-color: #f8f9fa;
    padding: 60px 0;
  }

  .breadcrumb-text {
    color: #333;
  } */

  .containerr {
    display: flex;
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin-top: -30px;
  }

  .steps,
  .form {
    flex: 1;
    padding: 20px;
  }

  .steps {
    border-right: 1px solid #ccc;
  }

  .steps h2,
  .form h2 {
    margin-bottom: 20px;
    font-size: 1.2rem;
  }

  .steps ol {
    list-style-type: decimal;
    padding-left: 20px;
  }

  .steps ol li {
    margin-bottom: 10px;
    font-size: 1rem;
  }

  .form h2 {
    margin-bottom: 20px;
    font-size: 1.2rem;
  }

  form {
    display: flex;
    align-items: center;
  }

  input[type="text"] {
    flex: 1;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  button {
    padding: 10px 20px;
    font-size: 1rem;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #0056b3;
  }
</style>

@if (session('warning'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        toastr.warning("{{ session('warning') }}");
    });
</script>
@endif

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

<div class="containerr mb-5 mt-5">
  <div class="steps">
    <h2>Langkah-langkah Tarik Tunai</h2>
    <ol>
      <li>Kunjungi Gerai Minimarket Terdekat</li>
      <li>Informasikan Ke kasir Bahwa Anda Ingin Melakukan TarikTunai FortifyFunds</li>
      <li>Informasikan Jumlah Saldo Yang Anda Inginkan Ke Kasir</li>
      <li>Tunjukan Kode QR Anda Ke Kasir</li>
      <li>Ikuti Instruksi Selanjutnya Dari Kasir Untuk Menyelesaikan Transaksi</li>
      <li>Tarik Tunai Minimal Rp50.000 Dan Maksimal Rp20.000.000</li>
    </ol>
  </div>
  <div class="form">
    <h2>Nominal Tarik Tunai (IDR)</h2>
    <form id="topUpForm" action="{{ route('take') }}" method="post" onsubmit="return validateTopUp()">
      @csrf
      <input type="text" id="nominal" name="amount" placeholder="Masukkan nominal..." onkeyup="formatRupiah(this)" autocomplete="off" />
      <button type="submit">Top Up</button>
    </form>
  </div>
</div>

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  let attemptCount = 0;
  const maxAttempts = 5;

  async function validateTopUp(event) {
    event.preventDefault(); // Prevent default form submission

    const swalResult = await Swal.fire({
      title: 'Atur PIN Transaksi',
      input: 'password',
      inputLabel: 'Masukkan PIN Transaksi',
      inputPlaceholder: 'Masukkan PIN...',
      inputAttributes: {
        autocapitalize: 'off',
        maxlength: 6 // Limit input length on the client side
      },
      showCancelButton: true,
      confirmButtonText: 'Kirim',
      cancelButtonText: 'Batal',
      confirmButtonColor: '#007bff',
      cancelButtonColor: '#dc3545',
      inputValidator: (value) => {
        if (!value) {
          return 'PIN transaksi tidak boleh kosong!';
        }
        if (!/^\d{6}$/.test(value)) {
          return 'PIN harus terdiri dari 6 digit!';
        }
      }
    });

    if (swalResult.isConfirmed) {
      const pinValue = swalResult.value;

      // Simulate PIN validation
      const isPinValid = validatePin(pinValue); // Replace with your actual validation function

      if (isPinValid) {
        document.getElementById('topUpForm').submit(); // Submit the form
      } else {
        attemptCount++;
        if (attemptCount >= maxAttempts) {
          try {
            const response = await fetch('{{ route('banAccount') }}', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              credentials: 'same-origin'
            });

            if (response.ok) {
              const data = await response.json();
              Swal.fire({
                icon: 'error',
                title: 'Akun Terblokir',
                text: 'Anda telah melebihi jumlah percobaan PIN yang diizinkan. Akun Anda telah diblokir.',
                confirmButtonColor: '#007bff'
              }).then(() => {
                window.location.href = '{{ route('login') }}'; // Redirect to login page
              });
            } else {
              // Handle non-200 responses
              Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Gagal memproses permintaan untuk memblokir akun.',
                confirmButtonColor: '#007bff'
              }).then(() => {
                window.location.href = '{{ route('login') }}'; // Redirect to login page
              });
            }
          } catch (error) {
            console.error('Error:', error);
            Swal.fire({
              icon: 'error',
              title: 'Akun Terblokir',
              text: 'Anda telah melebihi jumlah percobaan PIN yang diizinkan. Akun Anda telah diblokir.',
              confirmButtonColor: '#007bff'
              }).then(() => {
                window.location.href = '{{ route('login') }}'; // Redirect to login page
              });
          }
        } else {
          Swal.fire({
            icon: 'error',
            title: 'PIN Salah',
            text: `PIN yang Anda masukkan salah. Sisa percobaan: ${maxAttempts - attemptCount}`,
            confirmButtonColor: '#007bff'
          }).then(() => {
            validateTopUp(event); // Prompt for PIN again
          });
        }
      }
    }
  }

  function validatePin(pin) {
    // Replace this function with your actual PIN validation logic
    const correctPin = '123456'; // Example correct PIN for demonstration
    return pin === correctPin;
  }

  document.querySelector('#topUpForm').addEventListener('submit', validateTopUp);
</script>

@endsection
 