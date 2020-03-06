@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">UCP</a></li>
                <li class="breadcrumb-item active">Change Password</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>UCP - Change Password</h1></div>
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

                    <form method="POST" action="{{route('user.update', Auth::user()->account_id)}}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Old-Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required minlength="4" maxlength="32" placeholder="Old Password">
                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">New-Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required minlength="4" maxlength="32" placeholder="New Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Confirm New-Password</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" required minlength="4" maxlength="32" placeholder="Confirm New Password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-paper-plane"></i> CHANGE</button>
                                <a href="{{route('user.dashboard')}}" class="btn btn-dark btn-lg">DASHBOARD <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
