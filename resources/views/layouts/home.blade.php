<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{config('app.name')}} | Home</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('') }}dist/css/adminlte.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-dark navbar-black">
    <div class="container">
      <a href="/" class="navbar-brand">
        <img src="{{ asset('') }}dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-dark">{{config('app.name')}} </span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/mading/home') }}" class="nav-link">Mading Online</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/peran') }}" class="nav-link">Peran</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/buku-induk') }}" class="nav-link">Buku Induk</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/jadwal/home') }}" class="nav-link">Jadwal</a>
          </li>
          @if (Auth::user())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        @endif

        </ul>
      </div>

    </div>
  </nav>
  <!-- /.navbar -->

  @yield('content')

  <!-- Main Footer -->
  <footer class="main-footer bg-dark text-center">
    <strong class="text-center">Copyright &copy; <a href="">{{config('app.name')}} teams</a>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- jQuery UI -->
<script src="{{ asset('') }}plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="{{ asset('') }}dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('') }}dist/js/demo.js"></script>

<!-- Summernote -->
<script src="{{ asset('') }}plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
</body>
</html>
