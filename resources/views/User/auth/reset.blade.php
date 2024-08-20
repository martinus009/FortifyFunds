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
</head>

<body>

@if (session('error'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        toastr.error("{{ session('error') }}");
    });
</script>
@endif

    <div class="logo">
        <img src="{{ asset('image/logo.png') }}" alt="Image Logo">
        <a href="#">FortifyFunds</a>
    </div>

    <div class="container">
        <h1>Reset Password</h1>

        <div class="divider">
            <div class="line"></div>
        </div>

        <form action="{{ route('reset') }}" method="POST">
            @csrf
            <label for="email">Email:</label>
            <div class="custome-input">
                <input type="email" name="email" placeholder="Email Anda" autocomplete="off">
                <i class='bx bx-envelope' ></i>
            </div>
            <button class="login">Kirim</button>
            <div class="links">
                <a href="{{ route('login') }}">Kembali</a>
            </div>
        </form>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>


</html>
