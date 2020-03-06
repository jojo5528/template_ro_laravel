@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.news.index')}}">News</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.news.show', $news->id)}}">{{$news->id}}</a></li>
                <li class="breadcrumb-item active">VIEW</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>News #{{$news->id}} - VIEW</h1></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.news.index')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All News</a>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('manage.news.edit', $news->id)}}" class="btn btn-lg btn-success"><i class="fas fa-edit"></i> EDIT</a>
                            <button @click="Delete({{json_encode(route('manage.news.destroy',$news->id))}}, {{json_encode(route('manage.news.index'))}})" class="btn btn-lg btn-danger">DELETE <i class="fas fa-trash"></i></button>
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
                                <td>{{$news->id}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">TITLE</th>
                                <td>{{$news->title}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">TYPE</th>
                                <td>{!!$news->type_html()!!}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">LINK URL</th>
                                <td>
                                    @if($news->link_url)
                                        <a href="{{$news->link_url}}" target="_blank">{{$news->link_url}}</a>
                                    @else
                                        <b class="text-muted">none</b>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-primary">CREATED</th>
                                <td>{{$news->created_at}}</td>
                            </tr>
                            <tr>
                                <th class="bg-primary">UPDATED</th>
                                <td>{{$news->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>

                    @if($news->image_url)
                        <div class="d-block text-center"><img class="img-thumbnail" src="{{$news->image_url}}" alt="NEWS-{{$news->id}}"></div>
                        <hr>
                    @endif

                    <h2>DESC</h2>
                    <div>{!!$news->desc!!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
