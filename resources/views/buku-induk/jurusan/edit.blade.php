@extends('layouts.dashboard')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>jurusan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Jurusan</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">jurusan Create</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/jurusan/{{$jurusan->id}}">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama jurusan</label>
                  <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="exampleInputEmail1" name="jurusan" value="{{$jurusan->nama}} ">
                  @error('jurusan')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Singkatan</label>
                  <input type="text" class="form-control  @error('singkatan') is-invalid @enderror" id="exampleInputEmail1" name="singkatan" value="{{$jurusan->singkatan}} ">
                  @error('singkatan')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ url('/jurusan') }}" class="btn btn-link">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection