@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.page.index')}}">Page</a></li>
                <li class="breadcrumb-item active">{{$page->name}}</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Page #{{$page->id}} - VIEW</h1></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.page.index')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All Pages</a>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('manage.page.edit', $page->id)}}" class="btn btn-lg btn-success"><i class="fas fa-edit"></i> EDIT</a>
                            <button @click="Delete({{json_encode(route('manage.page.destroy',$page->id))}}, {{json_encode(route('manage.page.index'))}})" class="btn btn-lg btn-danger">DELETE <i class="fas fa-trash"></i></button>
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

                    <h2>INFO</h2>
                    <table class="table table-sm table-bordered table-hover table-striped">
                        <tbody class="text-left">
                            <tr>
                                <th class="bg-primary">ID</th>
                                <td>{{$page->id}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">NAME</th>
                                <td>{{$page->name}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">CREATED</th>
                                <td>{{$page->created_at}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">UPDATED</th>
                                <td>{{$page->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>

                    <h2>DESC</h2>
                    <div>{!!$page->html!!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
