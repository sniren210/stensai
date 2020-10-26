@extends('buku-induk.template')

@section('template')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Buku Induk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Buku Induk</a></li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h5>Buku Induk</h5>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="position-relative p-3 border border-primary rounded" style="height: 180px">
                      <div class="ribbon-wrapper">
                        <div class="ribbon bg-primary">
                          Buku Induk
                        </div>
                      </div>
                      <b>Buku Induk Adalah</b>,Halaman ini itu yaitu berfungsi untuk Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et fuga est nostrum aperiam commodi sed maxime, sunt saepe temporibus perferendis, fugit asperiores esse. Quas, esse praesentium quis et voluptate perferendis?
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection