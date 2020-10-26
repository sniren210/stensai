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
            <h1>Buku Induk Siswa Tabel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Siswa</a></li>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <div class="float-left">
                <a href="{{ url('/buku-induk/siswa/create') }}" class="btn btn-primary">Tambah</a>
              </div>
              <div class="float-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#export">Export</button>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#import">Import</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIS</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($siswa as $data)                      
                  <tr>
                    <td>{{$loop->iteration}} </td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->nis}}</td>
                    <td>
                      <img src="{{ asset('img/siswa/'.$data->foto) }}" alt="{{$data->nama}} " width="100" height="100">
                    </td>
                    <td>
                      <a href="{{ url('/buku-induk/siswa/'.$data->id) }}" class="badge badge-info">Detail</a>
                      <a href="{{ url('/buku-induk/siswa/'.$data->id.'/edit') }}" class="badge badge-success">Edit</a>
                      <button type="button" class="btn badge badge-danger" data-toggle="modal" data-target="#delete{{$data->id}}">Hapus</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIS</th>
                  <th>Foto</th>
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

  <!-- Modal -->
  @foreach ($siswa as $data)
    
  <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          yakin Ingin menghapus Data siswa {{$data->nama}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form action="/buku-induk/siswa/{{$data->id}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Hapus Data</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  {{-- modal export --}}
  <div class="modal fade" id="export" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Export Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <p>Export Excel</p>
              <a href="{{ url('/buku-induk/export/siswa') }}">Excel</a>
            </div>
            <div class="col-6">
              <p>Export PDF</p>
              <a href="">PDF</a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  {{-- import --}}
  <div class="modal fade" id="import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/buku-induk/import/siswa" method="POST" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="form-group">
              <label for="exampleInputFile">Import</label>
              <div class="input-group">
                <div class="custom-control custom-file flex-wrap">
                  <input type="file" class="custom-file-input col-12 @error('import') is-invalid @enderror" id="exampleInputFile" name="import">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  @error('import')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
              </div>
            </div>
            <div class="">
              <button type="submit" class="btn btn-primary">Import</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection