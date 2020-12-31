<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Vendor CSS Files -->
    {{-- <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="css/icofont/icofont.min.css" rel="stylesheet">
    <link href="css/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="css/venobox/venobox.css" rel="stylesheet">
    <link href="css/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">

    {{-- Template admin --}}
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.header')

    <main class="py-4">
        @yield('content')
    </main>

    @include('layouts.footer')
      <!-- Vendor JS Files -->
  <script src="css/jquery/jquery.min.js"></script>
  {{-- <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
  <script src="css/jquery.easing/jquery.easing.min.js"></script>
  <script src="css/php-email-form/validate.js"></script>
  <script src="css/waypoints/jquery.waypoints.min.js"></script>
  <script src="css/counterup/counterup.min.js"></script>
  <script src="css/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="css/venobox/venobox.min.js"></script>
  <script src="css/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
  <script src="js/app.js"></script>
  <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('js/sb-admin-2.min.css')}}"></script>
  <script src="//cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
   {{-- <script>
        var body = document.getElementById("body");
            CKEDITOR.replace(body,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
    </script> --}}
</body>
</html>
