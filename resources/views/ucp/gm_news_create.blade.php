@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.news.index')}}">News</a></li>
                <li class="breadcrumb-item active">CREATE</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>News - CREATE</h1></div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.news.index')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All News</a>
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

                    <news_editor
                        :csrf="{{json_encode(csrf_token())}}"
                        :url_action="{{json_encode(route('manage.news.store'))}}"
                        :data="null"
                        :old_input="{{json_encode(Session::getOldInput())}}"
                    ></news_editor>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
