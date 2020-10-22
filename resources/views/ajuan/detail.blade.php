@extends('layouts.dashboard')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ajuan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Gallery</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h5>Detail Ajuan</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 center">
                  <a href="{{ asset('img/thumbnail/'.$ajuan->thumbnail) }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery" class="d-flex justify-content-center">
                    <img src="{{ asset('img/thumbnail/'.$ajuan->thumbnail) }}" class="img-fluid mb-2" alt="white sample" style="max-height: "/>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3>{{$ajuan->judul}} </h3>
            </div>
            <div class="card-body" style="border-bottom: 1px solid rgba(0,0,0,.125)">
              {{$ajuan->deskripsi}}
            </div>
            <div class="card-footer d-flex justify-content-end" style="background-color: unset">
              <a href="{{ url('/ajuan') }}" class="btn btn-primary">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection