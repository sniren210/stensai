@extends('layouts.dashboard')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kelas Edit</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">General Form</li>
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
              <h3 class="card-title">Kelas Edit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/kelas/{{$kelas->id}}">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kelas</label>
                  <select class="custom-select @error('kelas') is-invalid @enderror" name="kelas">
                    <option value="X" {{($kelas->kelas == 'X') ? 'selected' : ' '}} >X</option>
                    <option value="XI" {{($kelas->kelas == 'XI') ? 'selected' : ' '}}>XI</option>
                    <option value="XII" {{($kelas->kelas == 'XII') ? 'selected' : ' '}}>XII</option>
                  </select>
                  @error('kelas')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Sub Kelas</label>
                  <input type="text" class="form-control  @error('sub_kelas') is-invalid @enderror" id="exampleInputEmail1" name="sub_kelas" value="{{$kelas->sub_kelas}} ">
                  @error('sub_kelas')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jurusan</label>
                  <select class="custom-select @error('jurusan') is-invalid @enderror" name="jurusan">
                    @foreach ($jurusan as $data)                        
                    <option value="{{$data->id}}" {{($kelas->jurusan_id == $data->id) ? 'selected' : ' '}}>{{$data->nama}}</option>
                    @endforeach
                  </select>
                  @error('jurusan')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ url('/kelas') }}" class="btn btn-link">Kembali</a>
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