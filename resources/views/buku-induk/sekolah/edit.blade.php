@extends('layouts.dashboard')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Edit Profile Sekolah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sekolah</a></li>
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
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('img/'.$sekolah->foto) }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$sekolah->nama}} </h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>NSS</b> <a class="float-right">{{$sekolah->nss}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>NPSN</b> <a class="float-right">{{$sekolah->npsn}} </a>
                  </li>
                </ul>

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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Alamat</a></li>
                  <li class="nav-item"><a class="nav-link" href="#akademik" data-toggle="tab">Akademik</a></li>
                  <li class="nav-item"><a class="nav-link" href="#kepala" data-toggle="tab">Kepala Sekolah</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <div class="form-horizontal">
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{$sekolah->nama}} " name="nama">
                          @error('nama')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">NSS</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('nss') is-invalid @enderror" value="{{$sekolah->nss}} " name="nss">
                          @error('nss')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">NPSN</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('npsn') is-invalid @enderror" value="{{$sekolah->npsn}} " name="npsn">
                          @error('npsn')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('kab') is-invalid @enderror" value="{{$sekolah->kab}} " name="kab">
                          @error('kab')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('kec') is-invalid @enderror" value="{{$sekolah->kec}} " name="kec">
                          @error('kec')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Desa</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('desa') is-invalid @enderror" value="{{$sekolah->desa}} " name="desa">
                          @error('desa')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Jalan</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('jln') is-invalid @enderror" value="{{$sekolah->jln}} " name="jln">
                          @error('jln')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Kode Pos</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('kd_pos') is-invalid @enderror" value="{{$sekolah->kd_pos}} " name="kd_pos">
                          @error('kd_pos')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="akademik">
                    <div class="form-horizontal">
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Kelas Kompetensi</label>
                        <span class="col-sm-10 col-form-label">
                          <ul class="list-group" style="margin-left: 15px;">
                              <li>Rpl-A</li>
                              <li>Rpl-B</li>
                              <li>Rpl-A</li>
                              <li>Rpl-A</li>
                          </ul>
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Akreditas</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('th_akreditas') is-invalid @enderror" value="{{$sekolah->th_akreditas}} " name="th_akreditas">
                          @error('th_akreditas')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Tahun Akreditas</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('th_akreditas') is-invalid @enderror" value="{{$sekolah->th_akreditas}} " name="th_akreditas">
                          @error('th_akreditas')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Tahun Berdiri</label>
                        <span class="col-sm-10 col-form-label">
                          <input type="text" class="form-control @error('th_berdiri') is-invalid @enderror" value="{{$sekolah->th_berdiri}} " name="th_berdiri">
                          @error('th_berdiri')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="kepala">
                    <div class="form-horizontal">
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Kepala Sekolah</label>
                        <span class="col-sm-10 col-form-label">
                          {{$sekolah->guru->nama}}
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <span class="col-sm-10 col-form-label">
                          {{$sekolah->guru->nip}}
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">NPSN</label>
                        <span class="col-sm-10 col-form-label">
                          {{$sekolah->guru->npwp}}
                        </span>
                      </div>
                      <div class="list-group-item">
                        <label class="col-sm-2 col-form-label">Ganti Kepala Sekolah</label>
                        <span class="col-sm-10 col-form-label">
                          <select class="custom-select" name="kelas">
                            <option value="1">X</option>
                            <option value="3">XI</option>
                            <option value="4">XII</option>
                          </select>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection