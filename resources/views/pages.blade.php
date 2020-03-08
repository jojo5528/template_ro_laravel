@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">{{$page->name}}</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h1>{{strtoupper($page->name)}}</h1>
                    <p class="m-0 text-left">สร้างเมื่อ {{$page->created_at}}</p>
                    <p class="m-0 text-left">อัพเดทล่าสุด {{$page->updated_at}}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('home')}}" class="btn btn-lg btn-dark"><i class="fas fa-home"></i> Home</a>
                        </div>
                    </div>
                    <hr>
                    
                    <div>{!!$page->html!!}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
