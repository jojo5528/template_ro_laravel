@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('news.all')}}">News</a></li>
                <li class="breadcrumb-item active">{{$news->id}}</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h1>NEWS #{{$news->id}}</h1>
                    <p class="m-0 text-left">สร้างเมื่อ {{$news->created_at}}</p>
                    <p class="m-0 text-left">อัพเดทล่าสุด {{$news->updated_at}}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('news.all')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> All News</a>
                            <a href="{{route('home')}}" class="btn btn-lg btn-dark"><i class="fas fa-home"></i> Home</a>
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

                    @if($news->image_url)
                        <div class="d-block text-center"><img class="img-thumbnail" src="{{$news->image_url}}" alt="NEWS-{{$news->id}}"></div>
                        <hr>
                    @endif

                    <h2>{!!$news->type_html()!!}</h2>
                    <h3>{{$news->title}}</h3>
                    <hr>
                    
                    <div>{!!$news->desc!!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
