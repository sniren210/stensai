@extends('mading.template')

@section('template')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mading Online</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Mading Online</a></li>
            <li class="breadcrumb-item active">Selengkapnya</li>
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
              <h5>Detail Mading</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 center">
                  <a href="{{ asset('img/thumbnail/'.$post->thumbnail) }}"  class="d-flex justify-content-center">
                    <img src="{{ asset('img/thumbnail/'.$post->thumbnail) }}" class="img-fluid mb-2" alt="{{$post->judul}}" style="max-height: "/>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h3>{{$post->judul}}</h3>
              <sub class="badge badge-primary">{{$post->kategori_post->kategori}}</sub>
            </div>
            <div class="card-body" style="border-bottom: 1px solid rgba(0,0,0,.125)">
              {{$post->deskripsi}}
            </div>
            <div class="card mt-3" style="box-shadow: unset; border-bottom: 1px solid rgba(0,0,0,.125)">
              <div class="card-body pt-0 w-25 h-25" >
                <div class="row">
                  <div class="col-7">
                    <sub>Publish By</sub>
                    <h2 class="lead"><b>{{$post->user->name}}</b></h2>
                    @if ($post->nama)                        
                    <sub>Ajuan By</sub>
                    <h2 class="lead"><b>{{$post->nama}}</b></h2>
                    @endif
                    <sub>Date</sub>
                    <h4 class="lead">{{$post->tanggal}}</h4>
                  </div>
                  <div class="col-5 text-center">
                    <img src="{{ asset('img/'.$post->user->foto) }}" alt="" class="img-circle img-fluid" style="width: 70px">
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer" style="background-color: unset">
              <a href="{{ url('/mading/home') }}" class="btn btn-primary">Kembali</a>
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