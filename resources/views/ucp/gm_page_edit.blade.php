@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.page.index')}}">Page</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.page.show', $page->id)}}">{{$page->id}}</a></li>
                <li class="breadcrumb-item active">EDIT</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Page #{{$page->id}} - EDIT</h1></div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.page.index')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All Pages</a>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('manage.page.show', $page->id)}}" class="btn btn-lg btn-info"><i class="fas fa-eye"></i> VIEW</a>
                            <button @click="Delete({{json_encode(route('manage.page.destroy',$page->id))}}, {{json_encode(route('manage.page.index'))}})" class="btn btn-lg btn-danger">DELETE <i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <hr>

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <b>ERROR!</b>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <page_editor
                        :csrf="{{json_encode(csrf_token())}}"
                        :url_action="{{json_encode(route('manage.page.update', $page->id))}}"
                        :data="{{$page}}"
                        :old_input="null"
                    ></page_editor>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
