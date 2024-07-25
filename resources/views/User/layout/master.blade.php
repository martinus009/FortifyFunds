<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Keamanan Yang Kuat Untuk Keuangan Anda"
    />

    <!-- title -->
    <title>FortifyFunds | Keamanan Yang Kuat Untuk Keuangan Anda</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="{{ asset('import/assets/image/png') }}" href="{{ asset('import/assets/img/favicon.png') }}" />
    <!-- google font -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap"
      rel="stylesheet"
    />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('import/admin/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('import/admin/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('import/admin/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/swiper-bundle.min.css') }}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/style.css') }}" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/all.min.css') }}" />
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('import/assets/bootstrap/css/bootstrap.min.css') }}" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/owl.carousel.css') }}" />
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/magnific-popup.css') }}" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/animate.css') }}" />
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/meanmenu.min.css') }}" />
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/main.css') }}" />
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('import/assets/css/responsive.css') }}" />
  </head>
  <body>

    <!--PreLoader-->
    <div class="loader">
      <div class="loader-inner">
        <div class="circle"></div>
      </div>
    </div>
    <!--PreLoader Ends-->

    <div id="app" x-data="{ openSidebar: false }">
        @include('user.layout.header')
        @yield('content')
        @include('user.layout.footer')
    </div>

    {{-- @livewireScriptConfig --}}
    {{-- @vite('resources/js/app.js') --}}
    {{-- {!! setting('meta_js') !!} --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://kit.fontawesome.com/5b78f342f3.js" crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
    @stack('script')

    </html>
