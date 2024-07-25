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
    margin-top: -30px; /* Penyesuaian untuk breadcrumb overlay */
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
  function formatRupiah(el) {
    // Mengambil nilai dari input
    var value = el.value;

    // Menghapus karakter non-digit
    value = value.replace(/[^\d]/g, '');

    // Mengambil panjang karakter value
    var length = value.length;

    // Menginisialisasi variabel untuk menyimpan hasil format
    var formattedValue = '';

    // Looping untuk menambahkan titik pada setiap 3 digit dari belakang
    for (var i = 0; i < length; i++) {
      if ((length - i) % 3 == 0 && i != 0) {
        formattedValue += '.';
      }
      formattedValue += value.charAt(i);
    }

    // Mengisi kembali nilai input dengan format yang benar
    el.value = formattedValue;
  }

  function validateTopUp() {
    // Mengambil nilai input dan menghapus titik sebagai pemisah ribuan
    var amount = document.getElementById('nominal').value.replace(/\./g, '');

    // Validasi minimal top up adalah Rp50.000
    if (amount < 50000) {
      Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: 'Minimal nominal Tarik Tunai adalah Rp50.000.',
        confirmButtonColor: '#007bff'
      });
      return false; // Menghentikan pengiriman formulir jika validasi gagal
    }

    // Tampilkan konfirmasi sebelum submit
    Swal.fire({
      icon: 'question',
      title: 'Konfirmasi Tarik Tunai',
      html: `Anda akan melakukan Tarik Tunai sebesar <b>${document.getElementById('nominal').value} IDR</b>. Lanjutkan?`,
      showCancelButton: true,
      confirmButtonText: 'Ya, Lanjutkan',
      cancelButtonText: 'Batal',
      confirmButtonColor: '#007bff',
      cancelButtonColor: '#dc3545'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('topUpForm').submit();
      }
    });

    return false; // Menghentikan pengiriman formulir saat menampilkan SweetAlert
  }

  // Function to show success notification after form submission
  @if(session('success'))
  Swal.fire({
    icon: 'success',
    title: 'Tarik Tunai Berhasil',
    text: '{{ session('success') }}',
    confirmButtonColor: '#007bff'
  });
  @endif
</script>

@endsection
