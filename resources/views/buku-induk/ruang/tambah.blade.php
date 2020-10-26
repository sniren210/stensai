@extends('layouts.dashboard')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ruang</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Ruang</a></li>
            <li class="breadcrumb-item active">Tambah</li>
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
              <h3 class="card-title">Ruang Create</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/ruang">
              @csrf
              @method('post')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Ruang</label>
                  <input type="number" class="form-control @error('nomor') is-invalid @enderror" id="exampleInputEmail1" name="nomor" value="{{ old('nomor')}}">
                  @error('nomor')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="">Jenis Ruang</label>
                  <div class="form-check">
                    <input class="form-check-input @error('jenis') is-invalid @enderror" type="radio" name="jenis" value="Bengkel">
                    <label class="form-check-label">Bengkel</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input @error('jenis') is-invalid @enderror" type="radio" name="jenis" value="Umum">
                    <label class="form-check-label">Umum</label>
                    @error('jenis')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ url('/ruang') }}" class="btn btn-link">Kembali</a>
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