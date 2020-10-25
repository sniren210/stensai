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
              <h3 class="card-title">Ruang Create</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/jadwal-ruang/{{$jadwal->id}}">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label>Ruang</label>
                  <select class="custom-select @error('ruang') is-invalid @enderror" name="ruang">
                    @foreach ($ruang as $data)                        
                    <option value="{{$data->id}}" {{($data->id == $jadwal->ruang_id) ? 'selected' : ' '}}>{{$data->nmr_ruang}} {{$data->jenis_ruang}}</option>
                    @endforeach
                  </select>
                  @error('ruang')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label>Mata Pelajaran</label>
                  <select class="custom-select @error('mapel') is-invalid @enderror" name="mapel">
                    @foreach ($mapel as $data)                        
                    <option value="{{$data->id}}" {{($data->id == $jadwal->mapel_id) ? 'selected' : ' '}}>{{$data->nama}} </option>
                    @endforeach
                  </select>
                  @error('mapel')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jam ke</label>
                  <input type="text" class="form-control @error('jam_ke') is-invalid @enderror" id="exampleInputEmail1" name="jam_ke" value="{{$jadwal->jam_ke}}">
                  @error('jam_ke')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ url('/jadwal-ruang/'.$jadwal->guru_id) }}" type="submit" class="btn btn-link">Kembali</a>
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