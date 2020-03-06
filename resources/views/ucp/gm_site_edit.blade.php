@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.site.index')}}">Site</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.site.show', $site->id)}}">{{$site->id}}</a></li>
                <li class="breadcrumb-item active">EDIT</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Site #{{$site->id}} - Edit</h1></div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.site.index')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All Site</a>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('manage.site.show', $site->id)}}" class="btn btn-lg btn-info"><i class="fas fa-eye"></i> VIEW</a>
                            <button @click="Delete({{json_encode(route('manage.site.destroy',$site->id))}}, {{json_encode(route('manage.site.index'))}})" class="btn btn-lg btn-danger">DELETE <i class="fas fa-trash"></i></button>
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

                    <form method="POST" action="{{route('manage.site.update', $site->id)}}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">#ID - NAME</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="#{{$site->id}} - {{$site->name}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">DESC</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" value="{{$site->desc}}" required placeholder="DESC">
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
                                <textarea name="value" rows="3" class="form-control @error('value') is-invalid @enderror" placeholder="VALUE" required>{{$site->value}}</textarea>
                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 align-items-center">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-success btn-lg"><i class="fas fa-paper-plane"></i> CHANGE</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
