@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Register</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>REGISTER</h1></div>
                <div class="card-body">
                    @error('success')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <b>SUCCESS!</b> {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                    @error('error')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <b>ERROR!</b> {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror

                    <form method="POST" action="{{route('register')}}" autocomplete="off">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{old('userid')}}" required minlength="4" maxlength="23" autofocus placeholder="Username">
                                @error('userid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required minlength="4" maxlength="32" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" required minlength="4" maxlength="32" placeholder="Confirm Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Gender (Sex)</label>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" id="male" type="radio" name="sex" value="M" checked>
                                    <label class="form-check-label" for="male">MALE</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" id="female" type="radio" name="sex" value="F">
                                    <label class="form-check-label" for="female">FEMALE</label>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <legend class="text-center">Delete Character Info - ข้อมูลเพื่อการลบตัวละคร</legend>
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required maxlength="39" autofocus placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">BirthDate (ปี ค.ศ.)</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{old('birthdate')}}" required autofocus placeholder="yyyy-mm-dd | ex:1997-12-07">
                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-paper-plane"></i> REGISTER</button>
                                <a href="{{route('login')}}" class="btn btn-dark btn-lg">LOGIN <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
