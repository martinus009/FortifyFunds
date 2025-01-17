<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/5b78f342f3.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="{{ asset('import/assets/css/admin.css')}}"/>
        <title>FortifyFunds | Keamanan Yang Kuat Untuk Keuangan Anda</title>
    </head>
    <body>
    @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                toastr.success("{{ session('success') }}");
            });
        </script>
    @endif

        {{-- @if (session('successMessage'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    toastr.success("{{ session('successMessage') }}");
                });
            </script>
        @endif --}}

    <!-- Tampilkan pesan error -->
    {{-- @if (session('error'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                toastr.error("{{ session('error') }}");
            });
        </script>
    @endif --}}

        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form action="{{ route('actionLogin') }}" method="POST" class="sign-in-form">
                        @csrf
                        <h2 class="title">MASUK</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Username" name="username" autocomplete="off"  />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" name="password" autocomplete="off" />
                        </div>
                        <p class="social-text">
                            Lupa Password? <a href="{{ route('forgot') }}">Klik Disini</a>
                        </p>
                        <input type="submit" value="Login" class="btn solid" />
                    </form>
                    <form action="{{ route('input') }}" method="POST" class="sign-up-form">
                        @csrf
                        <h2 class="title">DAFTAR</h2>
                        <div class="input-field">
                            <i class="fa-solid fa-address-card"></i>
                            <input type="text" placeholder="Username" name="username" autocomplete="off" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Nama" name="name" autocomplete="off" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" placeholder="Email" name="email" autocomplete="off" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-phone"></i>
                            <input type="telp" placeholder="Telepon" name="phone" autocomplete="off" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" name="password" autocomplete="off" />
                        </div>
                        <input type="submit" class="btn" value="KIRIM" />
                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>Belum Punya Akun?</h3>
                        <p>
                            Masa depan adalah milik mereka yang menyiapkan hari ini
                        </p>
                        <button class="btn transparent" id="sign-up-btn">
                            DAFTAR
                        </button>
                    </div>
                    <img src="{{ asset('import/assets/img/log.svg')}}" class="image" alt="" />
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>Sudah Punya Akun?</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Nostrum laboriosam ad deleniti.
                        </p>
                        <button class="btn transparent" id="sign-in-btn">MASUK</button>
                    </div>
                    <img src="{{ asset('import/assets/img/register.svg')}}" class="image" alt="" />
                </div>
            </div>
        </div>

        <script src="{{ asset('import/assets/js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.sign-up-form');
    const submitButton = document.querySelector('.sign-up-form .btn');

    submitButton.addEventListener('click', function (event) {
      // Prevent the default form submission
      event.preventDefault();

      Swal.fire({
        title: 'Atur PIN Transaksi',
        input: 'password',
        inputLabel: 'Masukkan PIN Transaksi',
        inputPlaceholder: 'Masukkan PIN...',
        inputAttributes: {
          autocapitalize: 'off',
          maxlength: 6 // Optional: Limit input length on the client side
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
      }).then((result) => {
        if (result.isConfirmed) {
          // Optionally, you could validate the PIN here again if needed
          form.submit();
        }
      });
    });
  });
</script>
    </body>
</html>
