@extends('layouts.dashboard')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Buku Induk guru</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Guru</a></li>
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
              <h3 class="card-title">Buku Induk guru Create</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/buku-induk/guru/{{$guru->id}}" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" name="nama" value="{{$guru->nama}} ">
                  @error('nama')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">NIP</label>
                  <input type="text" class="form-control @error('nip') is-invalid @enderror" id="exampleInputEmail1" name="nip" value="{{$guru->nip}} ">
                  @error('nip')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">NPWP</label>
                  <input type="text" class="form-control @error('npwp') is-invalid @enderror" id="exampleInputEmail1" name="npwp" value="{{$guru->npwp}} ">
                  @error('npwp')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Tanggal Lahir</label>
                  <div class="row">
                    <div class="col-6">
                      <input type="text" class="form-control @error('tmp_lahir') is-invalid @enderror" id="exampleInputEmail1" name="tmp_lahir" value="{{$guru->tmp_lahir}} ">
                      @error('tmp_lahir')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="col-6">
                      <input type="text" class="form-control @error('tgl_lahir') is-invalid @enderror" id="exampleInputEmail1" name="tgl_lahir" value="{{$guru->tgl_lahir}} ">
                      @error('tgl_lahir')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <div class="form-check">
                    <input class="form-check-input @error('jk') is-invalid @enderror" type="radio" name="jk" value="Laki-laki" {{($guru->jk = 'Laki-laki') ? 'checked' : ' '}}>
                    <label class="form-check-label">Laki-laki</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input @error('jk') is-invalid @enderror" type="radio" name="jk" value="Perempuan" {{($guru->jk = 'Perempuan') ? 'checked' : ' '}}>
                    <label class="form-check-label">Perempuan</label>
                  </div>
                  @error('jk')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Agama</label>
                  <input type="text" class="form-control @error('agama') is-invalid @enderror" id="exampleInputEmail1" name="agama" value="{{$guru->agama}} ">
                  @error('jk')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Enter ...">{{$guru->alamat}} </textarea>
                  @error('alamat')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Foto</label>
                  <div class="input-group">
                    <div class="custom-control custom-file flex-wrap">
                      <input type="file" class="custom-file-input col-12 @error('foto') is-invalid @enderror" id="exampleInputFile" name="foto">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      @error('foto')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                     </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ url('/buku-induk/guru') }}" class="btn btn-link">Kembali</a>
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