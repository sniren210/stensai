@extends('buku-induk.template')

@section('template')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Guru</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('img/guru/'.$guru->foto) }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$guru->nama}} </h3>

                <p class="text-muted text-center">{{$guru->nip}} </p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card ">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <div class="form-horizontal">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <span class="col-sm-10 col-form-label">
                          {{$guru->nama}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <span class="col-sm-10 col-form-label">
                          {{$guru->nip}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">npwp</label>
                        <span class="col-sm-10 col-form-label">
                          {{$guru->npwp}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <span class="col-sm-10 col-form-label">
                          {{$guru->jk}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat tanggal lahir</label>
                        <span class="col-sm-10 col-form-label">
                          {{$guru->tmp_lahir}},{{$guru->tgl_lahir}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Agama</label>
                        <span class="col-sm-10 col-form-label">
                          {{$guru->agama}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <span class="col-sm-10 col-form-label">
                          {{$guru->alamat}}
                        </span>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <div class="card-footer" style="background-color: unset">
            <a href="{{ url('/buku-induk/guru/home') }}" class="btn btn-primary">Kembali</a>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection