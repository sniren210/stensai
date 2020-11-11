@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('siswa.register.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Wrapper. Contains page content -->
{{-- <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Register Guru</h1>
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
             <form method="POST" action="{{ route('register') }}">
               @csrf
               <div class="card-body">
                 <div class="form-group">
                   <label for="exampleInputEmail1">Name</label>
                   <input type="name" id="exampleInputEmail1" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                   @error('name')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                 </div>
                 <div class="form-group">
                   <label for="exampleInputEmail1">Email</label>
                   <input type="email" id="exampleInputEmail1" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
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
                     <div class="custom-file">
                       <input type="file" class="custom-file-input" id="exampleInputFile">
                       <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                     </div>
                     <div class="input-group-append">
                       <span class="input-group-text" id="">Upload</span>
                     </div>
                   </div>
                 </div>
               </div>
               <!-- /.card-body -->
 
               <div class="card-footer">
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
</div> --}}
 <!-- /.content-wrapper -->
@endsection
