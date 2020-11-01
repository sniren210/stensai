@extends('peran.template')

@section('template')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Event Sekoloah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Peran</a></li>
            <li class="breadcrumb-item active">Event</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        @foreach ($event as $data)            
        <div class="col-12">
          <div class="card border border-primary">
            <div class="card-header">
              <h5>
                {{$data->nama}}
              </h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12 center">
                  <a href="{{ asset('img/event/'.$data->foto) }}" class="d-flex justify-content-center">
                    <img src="{{ asset('img/event/'.$data->foto) }}" class="img-fluid mb-2" alt="{{$data->nama}} " style="max-height: "/>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{ url('/peran/event/'.$data->id) }}" class="btn btn-primary btn-lg text-white">Lihat Detail</a>
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