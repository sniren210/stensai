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
              <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
              <li class="breadcrumb-item active">Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if (session('status'))
      <div class="content">
        <div class="alert alert-success" style="color: #155724; background-color: #d4edda;border-color: #c3e6cb;">
          {{ session('status') }}
        </div>
      </div>
    @endif
    @if (session('gagal'))
      <div class="content">
        <div class="alert alert-success" style="color: #571515; background-color: #edd4d4;border-color: #e6c3c3;">
          {{ session('gagal') }}
        </div>
      </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#export">Export</button>
            </div>

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
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($pengajuan as $data)                      
                  <tr>
                    <td>{{$loop->iteration}} </td>
                    <td width="20%">{{($data->siswa == null) ? 'Bukan Siswa Kita' : $data->siswa->nama}} </td>
                  <td width="10%">{{($data->siswa == null) ? 'Bukan Siswa Kita' : $data->siswa->nis}} </td>
                  <td width="20%">{{$data->pengajuan}} </td>
                  <td width="40%">{{$data->deskripsi}} </td>
                  <td width="10%">
                    @if (!$data->siswa_b)
                    <button type="button" class="btn badge badge-danger" data-toggle="modal" data-target="#delete{{$data->id}}">Hapus</button>
                    @endif
                    @if ($data->siswa_b)
                    Siswa Kita
                    @endif
                  </td>
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
                  <th>Aksi</th>
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

  {{-- modal export --}}
  <div class="modal fade" id="export" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Export Data Pengajuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <p>Export Excel</p>
              <a href="{{ url('/pengajuan/export') }}">Excel</a>
            </div>
            <div class="col-6">
              <p>Export PDF</p>
              <a href="{{ url('/pengajuan/pdf') }}">PDF</a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  {{-- modal hapus --}}
  @foreach ($pengajuan as $data)     
  <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data pengajuan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          yakin Ingin menghapus Data pengajuan ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form action="/pengajuan/{{$data->id}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Hapus Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

@endsection