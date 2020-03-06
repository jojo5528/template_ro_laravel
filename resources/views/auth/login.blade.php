@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Login</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>UCP - LOGIN</h1></div>
                <div class="card-body">
                    <form method="POST" action="{{route('login')}}" autocomplete="off">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Account</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('userid') is-invalid @enderror" name="userid" value="{{old('userid')}}" required autofocus placeholder="Account ID">
                                @error('userid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-paper-plane"></i> LOGIN</button>
                                <a href="{{route('register')}}" class="btn btn-dark btn-lg">REGISTER <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
