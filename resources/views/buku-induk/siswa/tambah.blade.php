@extends('layouts.dashboard')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Buku Induk Siswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Siswa</a></li>
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
              <h3 class="card-title">Buku Induk Siswa Create</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/buku-induk/siswa" enctype="multipart/form-data">
              @csrf
              @method('post')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" name="nama" value="{{old('nama')}}">
                  @error('nama')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">NIS</label>
                  <input type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleInputEmail1" name="nis" value="{{old('nis')}}">
                  @error('nis')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">NISN</label>
                  <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="exampleInputEmail1" name="nisn" value="{{old('nisn')}}">
                  @error('nisn')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Tanggal Lahir</label>
                  <div class="row">
                    <div class="col-6">
                      <input type="text" class="form-control @error('tmp_lahir') is-invalid @enderror" id="exampleInputEmail1" name="tmp_lahir" value="{{old('tmp_lahir')}}">
                      @error('tmp_lahir')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                    <div class="col-6">
                      <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="exampleInputEmail1" name="tgl_lahir" value="{{old('tgl_lahir')}}">
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
                    <input class="form-check-input @error('jk') is-invalid @enderror" value="Laki-laki" type="radio" name="jk">
                    <label class="form-check-label">Laki-laki</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input @error('jk') is-invalid @enderror" value="Perempuan" type="radio" name="jk" >
                    <label class="form-check-label">Perempuan</label>
                    @error('jk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Agama</label>
                  <input type="text" class="form-control @error('agama') is-invalid @enderror" id="exampleInputEmail1" name="agama" value="{{old('agama')}}">
                  @error('jk')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Anak Ke</label>
                  <input type="number" class="form-control @error('anak_ke') is-invalid @enderror" id="exampleInputEmail1" name="anak_ke" value="{{old('anak_ke')}}">
                  @error('anak_ke')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Enter ...">{{old('alamat')}}</textarea>
                  @error('alamat')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Ayah</label>
                  <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="exampleInputEmail1" name="nama_ayah" value="{{old('nama_ayah')}}">
                  @error('nama_ayah')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Ibu</label>
                  <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="exampleInputEmail1" name="nama_ibu" value="{{old('nama_ibu')}}">
                  @error('nama_ibu')
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
                <div class="form-group">
                  <label>Kelas</label>
                  <select class="custom-select" name="kelas">
                    <option value="1">X</option>
                    <option value="3">XI</option>
                    <option value="4">XII</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select class="custom-select" name="jurusan">
                    <option value="1">RPL</option>
                    <option value="2">TKJ</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ url('/buku-induk/siswa') }}" class="btn btn-link">Kembali</a>
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