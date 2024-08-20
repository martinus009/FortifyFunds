<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>FortifyFunds - Admin | Keamanan Yang Kuat Untuk Keuangan Anda</title>

  <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('import/admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


  <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('import/admin/assets/modules/bootstrap-social/bootstrap-social.css') }}">
    <!-- Toastr Libraries -->
    <link rel="stylesheet" href="{{ asset('import/admin/assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('import/admin/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('import/admin/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('import/admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('import/admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('import/admin/assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>

  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

    <div id="app" x-data="{ openSidebar: false }">
        @yield('content')
        @include('Admin.layout.footer')
    </div>


