@extends('buku-induk.template')

@section('template')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Buku Induk</a></li>
              <li class="breadcrumb-item"><a href="#">Siswa</a></li>
              <li class="breadcrumb-item active">Selengkapnya</li>
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
                       src="{{ asset('img/siswa/'.Auth::user()->foto) }} "
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->nama}} </h3>

                <p class="text-muted text-center">{{Auth::user()->nis}} </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Kelas</b> <a class="float-right">{{Auth::user()->kelas->kelas}}-{{Auth::user()->kelas->sub_kelas}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Jurusan</b> <a class="float-right">{{Auth::user()->kelas->jurusan->nama}} </a>
                  </li>
                </ul>

                <a href="{{ url('/siswa/nilai/')}}" class="btn btn-primary btn-block"><b>Lihat Nilai</b></a>

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
                  <li class="nav-item"><a class="nav-link" href="#keluarga" data-toggle="tab">Keluarga</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <div class="form-horizontal">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <span class="col-sm-10 col-form-label">
                          {{Auth::user()->nama}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIS</label>
                        <span class="col-sm-10 col-form-label">
                          {{Auth::user()->nis}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NISN</label>
                        <span class="col-sm-10 col-form-label">
                          {{Auth::user()->nisn}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <span class="col-sm-10 col-form-label">
                          {{Auth::user()->jk}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat tanggal lahir</label>
                        <span class="col-sm-10 col-form-label">
                          {{Auth::user()->tmp_lahir}} {{Auth::user()->tgl_lahir}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Agama</label>
                        <span class="col-sm-10 col-form-label">
                          {{Auth::user()->agama}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <span class="col-sm-10 col-form-label">
                          {{Auth::user()->alamat}}
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="keluarga">
                    <div class="form-horizontal">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Anak Ke</label>
                        <span class="col-sm-10 col-form-label">
                          {{Auth::user()->anak_ke}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Ayah</label>
                        <span class="col-sm-10 col-form-label">
                          {{Auth::user()->nama_ayah}}
                        </span>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Ibu</label>
                        <span class="col-sm-10 col-form-label">
                          {{Auth::user()->nama_ibu}} 
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
          {{-- <div class="card-footer" style="background-color: unset">
            <a href="{{ url('/buku-induk/siswa/home') }}" class="btn btn-primary">Kembali</a>
          </div> --}}
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection