{{-- {{dd(Auth::guard('guru')->user()->foto)}} --}}

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name')}} | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('') }}dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('') }}plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{ asset('') }}dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{config('app.name')}} </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img') }}/{{Auth::user()->foto ?? Auth::guard('guru')->user()->foto}} " class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::guard('web')->user()->name ?? Auth::guard('guru')->user()->nama}} </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/dashboard') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
          @if (Auth::user()->is_admin ?? Auth::user() == 1 )              
          <li class="nav-header">Admin Management</li>
          <li class="nav-item">
            <a href="{{ url('/profile') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{ url('/api-tokens') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>API Tokens</p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ url('/account-guru') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Akun Guru</p>
            </a>
          </li>
          @endif
          <li class="nav-header">Mading Online</li>
          <li class="nav-item">
            <a href="{{ url('/mading') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Table Mading</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/ajuan') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Ajuan Mading</p>
            </a>
          </li>
          <li class="nav-header">Peran</li>
          <li class="nav-item">
            <a href="{{ url('/saran/table') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Saran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pengajuan/table') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Pengajuan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/event') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Event</p>
            </a>
          </li>
          <li class="nav-header">Buku Induk</li>
          <li class="nav-item">
            <a href="{{ url('/buku-induk/siswa') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Buku Induk Siswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/buku-induk/guru') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Buku Induk Guru</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/sekolah/detail') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Sekolah</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/ruang') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Ruang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/jurusan') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Jurusan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/kelas') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Kelas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/buku-induk/nilai-siswa') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Nilai Siswa</p>
            </a>
          </li>
          <li class="nav-header">Jadwal</li>
          <li class="nav-item">
            <a href="{{ url('/jadwal-kelas') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Jadwal Kelas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/jadwal-guru') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Jadwal Guru</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/jadwal-ruang') }}" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Jadwal Ruang</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')
  
  <footer class="main-footer">
    <strong class="text-center">Copyright &copy; <a href="">{{config('app.name')}} teams</a>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('') }}plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('') }}plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('') }}plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('') }}plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('') }}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('') }}plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('') }}plugins/moment/moment.min.js"></script>
<script src="{{ asset('') }}plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('') }}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('') }}plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('') }}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- DataTables -->
<script src="{{ asset('') }}plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ asset('') }}plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<!-- AdminLTE App -->
<script src="{{ asset('') }}dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('') }}dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('') }}dist/js/demo.js"></script>

</body>
</html>
