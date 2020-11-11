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
          <a href="{{ url('/siswa/buku-induk') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="{{ url('/siswa/siswa') }}" class="nav-link">Buku Induk Siswa</a>
        </li>
        {{-- <li class="nav-item">
          <a href="{{ url('/siswa/buku-induk/guru/home') }}" class="nav-link">Buku Induk Guru</a>
        </li> --}}
        {{-- <li class="nav-item">
          <a href="{{ url('/siswa/sekolah') }}" class="nav-link">Profile Sekolah</a>
        </li> --}}
        <li class="nav-item">
          <a href="{{ url('/siswa/kelas-jurusan') }}" class="nav-link">Kelas dan Jurusan</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- /.navbar -->

@yield('template')
@endsection