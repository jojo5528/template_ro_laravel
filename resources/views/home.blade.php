@extends('layouts.landing')

@section('content')

<div>
    <status_server :status="'{{env('APP_STATUS', 'ONLINE')}}'" :online="{{$count['online']}}" :account="{{$count['account']}}"></status_server>
</div>

<div class="container bg-white py-3 mt-3 rounded shadow-lg px-5">

    @include('area.news')
    <hr class="border-dark">

    <h1 class="text-center"><i class="fas fa-question-circle fa-2x text-primary"></i> SUPPORT MENU</h1>
    <hr>
    <div class="row justify-content-center menu_support">
        <div class="col-md-4 my-1">
            <a href="{{route('register')}}" class="btn btn-lg btn-block rounded-pill text-left">
                <span class="fa-stack fa-2x text-center">
                    <i class="fa-stack-2x fas fa-circle"></i>
                    <i class="fa-stack fas fa-pencil-alt text-white"></i>
                </span>
                REGISTER
            </a>
            <a href="{{route('page','vote')}}" class="btn btn-lg btn-block rounded-pill text-left">
                <span class="fa-stack fa-2x text-center">
                    <i class="fa-stack-2x fas fa-circle"></i>
                    <i class="fa-stack fas fa-hand-holding-heart text-white"></i>
                </span>
                VOTE SERVER
            </a>
            <a href="{{route('page','donate')}}" class="btn btn-lg btn-block rounded-pill text-left">
                <span class="fa-stack fa-2x text-center">
                    <i class="fa-stack-2x fas fa-circle"></i>
                    <i class="fa-stack fas fa-hand-holding-usd text-white"></i>
                </span>
                DONATE
            </a>
        </div>
        <div class="col-md-4 offset-md-4 my-1">
            <a href="{{route('page','information')}}" class="btn btn-lg btn-block rounded-pill text-right">
                SERVER INFO
                <span class="fa-stack fa-2x text-center">
                    <i class="fa-stack-2x fas fa-circle"></i>
                    <i class="fa-stack fas fa-info text-white"></i>
                </span>
            </a>
            <a href="{{route('page','share')}}" class="btn btn-lg btn-block rounded-pill text-right">
                SHARE EVENT
                <span class="fa-stack fa-2x text-center">
                    <i class="fa-stack-2x fas fa-circle"></i>
                    <i class="fa-stack fas fa-gift text-white"></i>
                </span>
            </a>
            <a href="{{env('APP_FB_GROUP_URL', '#!')}}" target="_blank" class="btn btn-lg btn-block rounded-pill text-right">
                FB GROUP
                <span class="fa-stack fa-2x text-center">
                    <i class="fa-stack-2x fas fa-circle"></i>
                    <i class="fa-stack fab fa-facebook-f text-white"></i>
                </span>
            </a>
        </div>
    </div>
    <hr class="border-dark">

    <h1 class="text-center"><i class="fas fa-crown fa-2x text-danger"></i> RANKING</h1>
    <hr>
    <div class="row justify-content-center text-center">
        <ranking_table
            :title="'VOTE'"
            :data="{{json_encode($ranking['vote'])}}"
            :css_bg="'bg-primary'"
            :name="'ID'"
        ></ranking_table>

        <ranking_table
            :title="'MVP'"
            :data="{{json_encode($ranking['mvp'])}}"
            :css_bg="'bg-warning'"
            :name="'ตัวละคร'"
        ></ranking_table>

        <ranking_table
            :title="'PVP'"
            :data="{{json_encode($ranking['pvp'])}}"
            :css_bg="'bg-success'"
            :name="'ตัวละคร'"
        ></ranking_table>

        <ranking_table
            :title="'SHARE'"
            :data="{{json_encode($ranking['share'])}}"
            :css_bg="'bg-danger'"
            :name="'ID'"
        ></ranking_table>
    </div>
    <hr class="border-dark">

    <h1 class="text-center"><i class="fas fa-flag fa-2x text-danger"></i> WOE REPORT</h1>
    <hr>
    <div class="row justify-content-center text-center box-warreport p-5">
        <div class="col-md-3">a</div>
        <div class="col-md-6">a</div>
        <div class="col-md-3">a</div>
    </div>

</div>

@endsection
