@extends('layouts.dashboard')

@section('content')

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
            <li class="breadcrumb-item"><a href="#">Mading</a></li>
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
              <h3 class="card-title">Mading Edit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/mading" enctype="multipart/form-data">
              @csrf
              @method('post')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Judul</label>
                  <input type="text" class="form-control @error('judul') is-invalid @enderror" id="exampleInputEmail1" name="judul" value="{{old('judul')}} ">
                  @error('judul')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Thumbail</label>
                  <div class="input-group">
                    <div class="custom-control custom-file flex-wrap">
                      <input type="file" class="custom-file-input col-12 @error('thumbnail') is-invalid @enderror" id="exampleInputFile" name="thumbnail">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      @error('thumbnail')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                     </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select class="custom-select @error('kategori') is-invalid @enderror" name="kategori">
                    @foreach ($kategori as $data)
                        <option value="{{$data->id}} ">{{$data->kategori}} </option>
                    @endforeach
                  </select>
                  @error('kategori')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="3" placeholder="Enter ..." name="deskripsi">
                    {{old('deskripsi')}}
                  </textarea>
                  @error('deskripsi')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="{{ url('/mading') }}" class="btn btn-link">Kembali</a>
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