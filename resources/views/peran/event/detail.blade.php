@extends('layouts.dashboard')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Event Sekolah </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Event</a></li>
            <li class="breadcrumb-item active">Detail</li>
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
              <h5>Detail Event</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 center">
                  <a href="{{ asset('img/event/'.$event->foto) }}"  class="d-flex justify-content-center">
                    <img src="{{ asset('img/event/'.$event->foto) }}" class="img-fluid mb-2" alt="{{$event->nama}}" style="max-height: "/>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3>{{$event->nama}}</h3>
              <sub class="badge badge-primary">{{$event->tanggal}}</sub>
            </div>
            <div class="card-body" style="border-bottom: 1px solid rgba(0,0,0,.125)">
              {{$event->deskripsi}}
            </div>
            <div class="card-footer" style="background-color: unset">
              <a href="{{ url('/event') }}" class="btn btn-primary">Kembali</a>
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