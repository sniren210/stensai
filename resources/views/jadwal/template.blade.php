@extends('layouts.home')

@section('content')

 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container px-5">
    
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarMini" aria-controls="navbarMini" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarMini">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ url('/jadwal') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Jadwal Kelas</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="{{ url('/jadwal-kelas/home') }}" class="dropdown-item">X</a></li>
            <li><a href="{{ url('/jadwal-kelas/home') }}" class="dropdown-item">XI</a></li>
            <li><a href="{{ url('/jadwal-kelas/home') }}" class="dropdown-item">XII</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ url('/mading') }}" class="nav-link">Jadwal Guru</a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/mading') }}" class="nav-link">Jadwal Ruang</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- /.navbar -->

@yield('template')
@endsection