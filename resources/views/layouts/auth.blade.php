<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="{{ asset('frontend/images/logo_svg.svg') }}" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">

  <!-- <link rel="stylesheet" type="text/css" href="css/util.css"> -->
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/custom.css') }}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <!--===============================================================================================-->
</head>

<body>

  @yield('auth-content')

  <!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <!--===============================================================================================-->
  <script src="{{ asset('frontend/vendor/bootstrap/js/popper.js') }}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

</body>

</html>