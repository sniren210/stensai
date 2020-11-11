@extends('layouts.home')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Home </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="card-header">
                  <h5 class="card-title m-0">Stensai Apps</h5>
                </div>
                <p class="card-text">
                  Stensai Apps adalah sebuah platform yang memiliki 3 fitur utama
                </p>

                @if (!Auth::guard()->check() && !Auth::guard('siswa')->check() && !Auth::guard('guru')->check())
                <a href="{{ url('/login-guru') }}" class="card-link">Login Guru</a>
                <a href="{{ url('/login-siswa') }}" class="card-link">Login Siswa</a>
                @endif
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Sistem Buku Induk</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Fitur Pertama</h6>

                <p class="card-text">Fitur ini berfungsi untuk Sistem utama Buku induk</p>
                
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Mading Online</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Fitur Kedua</h6>

                <p class="card-text">Fitur ini Berfungsi untuk Mading seperti biasa tapi online.</p>
                
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">PERAN</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Fitur Ketiga</h6>

                <p class="card-text">Pengajuan dan saran fitur ini berfungsi untuk penampung Pengajuan dan saran dari para siswa.</p>
                
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
