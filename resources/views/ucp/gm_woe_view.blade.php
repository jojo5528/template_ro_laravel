@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.woe.index')}}">WOE Castle</a></li>
                <li class="breadcrumb-item active">{{$woe->id}}</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>WOE #{{$woe->id}} - Castle #{{$woe->castle_id}} View</h1></div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.woe.index')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All Castle</a>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('manage.woe.edit', $woe->id)}}" class="btn btn-lg btn-success"><i class="fas fa-edit"></i> EDIT</a>
                            <button @click="Delete({{json_encode(route('manage.woe.destroy',$woe->id))}}, {{json_encode(route('manage.woe.index'))}})" class="btn btn-lg btn-danger">DELETE <i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <hr>

                    @error('success')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <b>SUCCESS!</b> {{$message}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror

                    <table class="table table-sm table-bordered table-hover table-striped">
                        <tbody class="text-left">
                            <tr>
                                <th class="bg-primary">ID</th>
                                <td>{{$woe->id}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">CASTLE_ID</th>
                                <td>{{$woe->castle_id}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">NAME</th>
                                <td>{{$woe->name}}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
