@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.woe.index')}}">WOE Castle</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.woe.show', $woe->id)}}">{{$woe->id}}</a></li>
                <li class="breadcrumb-item active">EDIT</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>WOE #{{$woe->id}} - Castle #{{$woe->castle_id}} EDIT</h1></div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.woe.index')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All Castle</a>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('manage.woe.show', $woe->id)}}" class="btn btn-lg btn-info"><i class="fas fa-eye"></i> VIEW</a>
                            <button @click="Delete({{json_encode(route('manage.woe.destroy',$woe->id))}}, {{json_encode(route('manage.woe.index'))}})" class="btn btn-lg btn-danger">DELETE <i class="fas fa-trash"></i></button>
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

                    <form method="POST" action="{{route('manage.woe.update', $woe->id)}}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">ID</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$woe->id}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">CASTLE_ID</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('castle_id') is-invalid @enderror" name="castle_id" required min="0" placeholder="CASTLE_ID" value="{{$woe->castle_id}}">
                                @error('castle_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">NAME</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" required placeholder="NAME" value="{{$woe->name}}">
                                @error('name')
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
