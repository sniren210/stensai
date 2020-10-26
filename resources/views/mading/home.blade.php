@extends('mading.template')

@section('template')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Mading Online {{$mading}}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Mading Online</a></li>
            <li class="breadcrumb-item active">{{$mading}} </li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        @foreach ($post as $data)            
        <div class="col-12">
          <div class="card border border-primary">
            <div class="card-header">
              <h5>
                {{$data->judul}}
              </h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 center">
                  <a href="{{ asset('img/thumbnail/'.$data->thumbnail) }}" class="d-flex justify-content-center">
                    <img src="{{ asset('img/thumbnail/'.$data->thumbnail) }}" class="img-fluid mb-2" alt="white sample" style="max-height: "/>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{ url('/mading/selengkapnya/'.$data->id) }}" class="btn btn-primary btn-lg text-white">Lihat Detail</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection