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
    <h2>Langkah-langkah Top Up</h2>
    <ol>
      <li>Kunjungi Gerai Minimarket Terdekat</li>
      <li>Informasikan Ke kasir Bahwa Anda Ingin Melakukan Top Up FortifyFunds</li>
      <li>Informasikan Jumlah Saldo Yang Anda Inginkan Ke Kasir</li>
      <li>Tunjukan Kode QR Anda Ke Kasir</li>
      <li>Ikuti Instruksi Selanjutnya Dari Kasir Untuk Menyelesaikan Transaksi</li>
      <li>Isi Saldo Dengan Tunai Minimal Rp50.000 Dan Maksimal Rp1.000.000</li>
      <li>Untuk Nominal Dibawah Rp500.000, Isi Saldo Bisa Dilakukan Dengan Kelipatan Rp50.000</li>
    </ol>
  </div>
  <div class="form">
    <h2>Nominal Top Up (IDR)</h2>
    <form id="topUpForm" action="{{ route('topUp') }}" method="post" onsubmit="return validateTopUp()">
      @csrf
      <input type="text" id="nominal" name="amount" placeholder="Masukkan nominal..." onkeyup="formatRupiah(this)" autocomplete="off" />
      <button type="submit">Top Up</button>
    </form>
  </div>
  {{-- <div class="qr-code-section mt-5">
  <h2>QR Code Pembayaran</h2>
  <div id="qrCodeContainer" style="display: none;">
    <img id="qrCodeImage" src="" alt="QR Code" />
  </div>
</div> --}}
</div>

<!-- SweetAlert2 JS -->
<!-- SweetAlert2 JS -->
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script> <!-- QR Code generator library -->

<script>
  function formatRupiah(el) {
    var value = el.value;

    value = value.replace(/[^\d]/g, '');

    var length = value.length;

    var formattedValue = '';

    for (var i = 0; i < length; i++) {
      if ((length - i) % 3 == 0 && i != 0) {
        formattedValue += '.';
      }
      formattedValue += value.charAt(i);
    }

    el.value = formattedValue;
  }

  function validateTopUp() {
    var amount = document.getElementById('nominal').value.replace(/\./g, '');

    if (amount < 50000) {
      Swal.fire({
        icon: 'error',
        title: 'Kesalahan',
        text: 'Minimal nominal top up adalah Rp50.000.',
        confirmButtonColor: '#007bff'
      });
      return false;
    }

    Swal.fire({
      icon: 'question',
      title: 'Konfirmasi Top Up',
      html: `Anda akan melakukan top up sebesar <b>${document.getElementById('nominal').value} IDR</b>. Lanjutkan?`,
      showCancelButton: true,
      confirmButtonText: 'Ya, Lanjutkan',
      cancelButtonText: 'Batal',
      confirmButtonColor: '#007bff',
      cancelButtonColor: '#dc3545'
    }).then((result) => {
      if (result.isConfirmed) {
        var qrCodeData = 'https://example.com/confirm-topup?amount=' + amount; // Replace with your URL or data

        var qr = qrcode(0, 'L');
        qr.addData(qrCodeData);
        qr.make();

        var qrCodeImage = qr.createDataURL();

        Swal.fire({
          icon: 'info',
          title: 'QR Code Pembayaran',
          html: `<p>Silakan tunjukkan QR code berikut ke kasir:</p><div style="text-align: center;"><img src="${qrCodeImage}" alt="QR Code" style="width: 200px; height: 200px; border: 2px solid #ddd; border-radius: 10px;" /></div>`,
          confirmButtonText: 'Selesai',
          confirmButtonColor: '#007bff'
        }).then(() => {
          document.getElementById('topUpForm').submit(); // Submit the form after showing QR code
        });

        return false; // Prevent form submission until QR code is shown
      }
    });

    return false;
  }

  @if(session('success'))
  Swal.fire({
    icon: 'success',
    title: 'Top Up Berhasil',
    text: '{{ session('success') }}',
    confirmButtonColor: '#007bff'
  });
  @endif
</script>



@endsection
