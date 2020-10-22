@extends('peran.template')

@section('template')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Peran</h1>
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
              <h3 class="card-title">Saran</h3>
            </div>
            <!-- /.card-header -->
            @if (session('status'))
              <div class="content">
                <div class="alert alert-success" style="color: #155724; background-color: #d4edda;border-color: #c3e6cb;">
                  {{ session('status') }}
                </div>
              </div>
            @endif
            <!-- form start -->
            <form method="POST" action="/peran/saran">
              @csrf
              @method('post')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Siswa</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" name="nama" value="{{old('nama')}} ">
                  @error('nama')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">NIS</label>
                  <input type="text" class="form-control @error('nis') is-invalid @enderror" id="exampleInputEmail1" name="nis" value="{{old('nis')}} ">
                  @error('nis')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label>Event</label>
                  <select class="custom-select @error('event') is-invalid @enderror" name="event">
                    @foreach ($event as $data)
                        <option value="{{$data->id}} ">{{$data->nama}} </option>
                    @endforeach
                  </select>
                  @error('event')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="form-group">
                  <label>Saran</label>
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