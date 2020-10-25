@extends('layouts.dashboard')

@section('content')
<style>
  .dataTables_paginate{
    display: flex;
    justify-content: flex-end;
  }
  .dataTables_filter{
    display: flex;
    justify-content: flex-end;
  }
</style>
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Peran Pengajuan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>NIS</th>
                  <th>Jenis</th>
                  <th>Pengajuan</th>
                  <th>Deskripsi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($pengajuan as $data)                      
                  <tr>
                    <td>{{$loop->iteration}} </td>
                    <td width="20%">{{$data->siswa->nama}} </td>
                    <td width="10%">{{$data->siswa->nis}} </td>
                    <td width="30%">{{$data->pengajuan}} </td>
                    <td width="40%">{{$data->deskripsi}} </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>NIS</th>
                  <th>Jenis</th>
                  <th>Pengajuan</th>
                  <th>Deskripsi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection