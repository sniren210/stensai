@extends('layouts.dashboard')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Api Tokens</h1>
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
              <h3 class="card-title">Api Tokens</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if (session('status'))
              <div class="content">
                <div class="alert alert-success" style="color: #155724; background-color: #d4edda;border-color: #c3e6cb;">
                    {{ session('status') }}
                </div>
              </div>
            @endif
            <form method="POST" action="/api-tokens">
              @csrf
              @method('post')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Api</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('name')}}" name="name">
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Hak Akses</label>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input @error('access') is-invalid @enderror" value="post" type="checkbox" name="access">
                        <label class="form-check-label">Post</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input @error('access') is-invalid @enderror" value="put" type="checkbox" name="access">
                        <label class="form-check-label">Put/Patch</label>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input @error('access') is-invalid @enderror" value="delete" type="checkbox" name="access">
                        <label class="form-check-label">Delete</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input @error('access') is-invalid @enderror" value="get" type="checkbox" name="access" >
                        <label class="form-check-label">Get</label>
                        @error('access')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
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