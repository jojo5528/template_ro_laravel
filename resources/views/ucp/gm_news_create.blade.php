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

                    <form method="POST" action="{{route('manage.news.store')}}" autocomplete="off">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">TYPE</label>
                            <div class="col-md-6">
                                <select class="custom-select custom-select-lg mb-3" name="type">
                                    <option value="1" selected>NEWS</option>
                                    <option value="2">EVENT</option>
                                    <option value="3">PROMOTION</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">LINK_URL <small class="text-danger">ถ้าไม่ต้องการโยงลิงก์ภายนอก ให้เว้นว่างไว้</small></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('link_url') is-invalid @enderror" name="link_url" value="{{old('link_url')}}" placeholder="LINK_URL">
                                @error('link_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">IMAGE_URL <small class="text-danger">ฝากไฟล์จากเว็บอื่นแล้วนำ URL รูปมาใส่</small></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('image_url') is-invalid @enderror" name="image_url" value="{{old('image_url')}}" required placeholder="IMAGE_URL">
                                @error('image_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">TITLE</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title')}}" required placeholder="TITLE">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">DESC</label>
                            <div class="col-md-6">
                                <textarea name="desc" rows="3" class="form-control @error('desc') is-invalid @enderror" placeholder="DESC">{{old('desc')}}</textarea>
                                @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 align-items-center">
                            <div class="col">
                                <button type="submit" class="btn btn-outline-success btn-lg"><i class="fas fa-paper-plane"></i> CREATE</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
