@extends('layouts.dashboard')

@section('content')
    <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Edit Guru</h1>
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
               <h3 class="card-title">Buat Akun Guru</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form method="POST" action="/account-guru/{{$user->id}}" enctype="multipart/form-data">
               @csrf
               @method('put')
               <div class="card-body">
                 <div class="form-group">
                   <label for="exampleInputEmail1">Name</label>
                   <input type="name" id="exampleInputEmail1" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                   @error('name')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
                 <div class="form-group">
                   <label for="exampleInputEmail1">Email</label>
                   <input type="email" id="exampleInputEmail1" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                   @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
                 <div class="form-group">
                   <label for="exampleInputEmail1">Password</label>
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
                 <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <sub>Optional</sub>
                    <div class="input-group">
                      <div class="custom-control custom-file flex-wrap">
                        <input type="file" class="custom-file-input col-12 @error('foto') is-invalid @enderror" id="exampleInputFile" name="foto">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                  </div>
               </div>
               <!-- /.card-body -->
 
               <div class="card-footer">
                 <a href="{{ url('/account-guru') }}" class="btn btn-link">Kembali</a>
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
@endsection