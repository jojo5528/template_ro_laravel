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
        <div class="col-md-3">
            <table class="table table-sm table-striped table-bordered table-hover text-left">
                <thead class="text-center bg-primary text-white">
                    <tr>
                        <th colspan="3"><h5>RANKING VOTE</h5></th>
                    </tr>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ID</th>
                        <th>แต้ม</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=1;$i<=10;$i++)
                        <tr>
                            <td>{{$i}}</td>
                            <td>test</td>
                            <td>{{rand(100,999)}}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <table class="table table-sm table-striped table-bordered table-hover text-left">
                <thead class="text-center bg-warning text-white">
                    <tr>
                        <th colspan="3"><h5>RANKING MVP</h5></th>
                    </tr>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ตัวละคร</th>
                        <th>แต้ม</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=1;$i<=10;$i++)
                        <tr>
                            <td>{{$i}}</td>
                            <td>test</td>
                            <td>{{rand(100,999)}}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <table class="table table-sm table-striped table-bordered table-hover text-left">
                <thead class="text-center bg-success text-white">
                    <tr>
                        <th colspan="3"><h5>RANKING PVP</h5></th>
                    </tr>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ตัวละคร</th>
                        <th>แต้ม</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=1;$i<=10;$i++)
                        <tr>
                            <td class="text-center"><b class="badge badge-pill badge-dark">{{$i}}</b></td>
                            <td>test</td>
                            <td>{{rand(100,999)}}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <table class="table table-sm table-striped table-bordered table-hover text-left">
                <thead class="text-center bg-danger text-white">
                    <tr>
                        <th colspan="3"><h5>RANKING SHARE</h5></th>
                    </tr>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ID</th>
                        <th>แต้ม</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=1;$i<=10;$i++)
                        <tr>
                            <td>{{$i}}</td>
                            <td>test</td>
                            <td>{{rand(100,999)}}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
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
