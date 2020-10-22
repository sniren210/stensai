@extends('layouts.dashboard')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile Information</h1>
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
              <h3 class="card-title">Profile Edit</h3>
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
            @if (session('gagal'))
              <div class="content">
                <div class="alert alert-success" style="color: #571515; background-color: #edd4d4;border-color: #c3e6cb;">
                    {{ session('gagal') }}
                </div>
              </div>
            @endif
            <form method="POST" action="/profile/change-password/{{Auth::user()->id}} ">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Password</label>
                  <input type="password" id="exampleInputEmail1" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="new-password">
                  @error('old_password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">New Password</label>
                  <input type="password" id="exampleInputEmail1" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <input type="password" id="exampleInputEmail1" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('/profile') }}" class="btn btn-link float-right">Kembali</a>
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