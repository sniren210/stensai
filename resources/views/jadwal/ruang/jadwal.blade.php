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
            <h1>Jadwal ruang Tabel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Jadwal Ruang</a></li>
              <li class="breadcrumb-item active">Jadwal</li>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h5>Jadwal ruang {{$ruang->ruang->nmr_ruang}} {{$ruang->ruang->jenis_ruang}} </h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jam Ke</th>
                  <th>Pelajaran</th>
                  @if (Auth::guard('web')->check())
                  <th>Aksi</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                  @foreach ($jadwal as $data)                      
                  <tr>
                    <td>{{$loop->iteration}} </td>
                    <td>{{$data->jam_ke}} </td>
                    <td>{{$data->mapel->nama}} </td>
                    @if (Auth::guard('web')->check())            
                    <td>
                      <a href="{{ url('/jadwal-ruang/'.$data->id.'/edit') }}" class="badge badge-success">Edit</a>
                      <button type="button" class="btn badge badge-danger" data-toggle="modal" data-target="#delete{{$data->id}}">Hapus</button>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Jam Ke</th>
                  <th>Pelajaran</th>
                  @if (Auth::guard('web')->check())              
                  <th>Aksi</th>
                  @endif
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

  <!-- Modal -->
  @foreach ($jadwal as $data)    
  <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Jadwal Guru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Yakin ingin menghapus Jadwal Ruang {{$data->ruang->nmr_ruang}} {{$data->ruang->jenis_ruang}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form method="POST" action="/jadwal-ruang/{{$data->id}}">
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