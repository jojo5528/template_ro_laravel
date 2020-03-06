@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.site.index')}}">Site</a></li>
                <li class="breadcrumb-item active">CREATE</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>New Site - CREATE</h1></div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.site.index')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All Site</a>
                        </div>
                    </div>
                    <hr>

                    @error('error')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <b>ERROR!</b> {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror

                    <form method="POST" action="{{route('manage.site.store')}}" autocomplete="off">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">NAME</label>
                            <div class="col-md-6">
                                <select class="custom-select custom-select-lg mb-3" name="name">
                                    <option value="seo_desc" selected>seo_desc</option>
                                    <option value="seo_keywords">seo_keywords</option>
                                    <option value="footer_desc">footer_desc</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">DESC</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" required placeholder="DESC">
                                @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">VALUE</label>
                            <div class="col-md-6">
                                <textarea name="value" rows="3" class="form-control @error('value') is-invalid @enderror" placeholder="VALUE" required></textarea>
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 align-items-center">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-success btn-lg"><i class="fas fa-paper-plane"></i> CREATE</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
