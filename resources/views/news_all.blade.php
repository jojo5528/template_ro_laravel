@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('news.all')}}">News</a></li>
                <li class="breadcrumb-item active">All</li>
            </ol>
        </div>
    </div>

    <news_filter
        :url_action="{{json_encode(route('api.news.filter'))}}"
    ></news_filter>
</div>
@endsection
