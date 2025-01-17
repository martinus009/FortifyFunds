<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('import/assets/css/reset.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('image/logo.png') }}">
    <title>FortifyFunds - Reset Password</title>
    <style>
        .error {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <div class="logo">
        <img src="{{ asset('image/logo.png') }}">
        <a href="#">FortifyFunds</a>
    </div>

    <div class="container">
        <h1>Reset Password</h1>

        <div class="divider">
            <div class="line"></div>
        </div>

        <form action="{{ route('password') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ request()->token }}">
            <input type="hidden" name="email" value="{{ request()->email }}">

            <label for="password">Password Baru:</label>
            <div class="custome-input">
                <input type="password" name="password" placeholder="Masukan Password Baru Anda" autocomplete="off">
                <i class='bx bx-lock' ></i>
            </div>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror

            <label for="password_confirmation">Konfirmasi Password:</label>
            <div class="custome-input">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password Anda" autocomplete="off">
                <i class='bx bx-lock' ></i>
            </div>
            @error('password_confirmation')
                <span class="error">{{ $message }}</span>
            @enderror

            <button class="login">Kirim</button>
            <div class="links">
                <a href="{{ route('login') }}">Kembali</a>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif
        });
    </script>
</body>

</html>
