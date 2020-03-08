@extends('layouts.pager')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <ol class="breadcrumb shadow bg-white">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('manage.dashboard')}}">Manage</a></li>
                <li class="breadcrumb-item active">Page</li>
            </ol>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header text-center"><h1>Manage - Page</h1></div>
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('manage.dashboard')}}" class="btn btn-lg btn-dark"><i class="fas fa-angle-left"></i> DASHBOARD</a>
                        </div>
                        <div class="col text-right">
                            <button @click="Truncate({{json_encode(route('manage.page.truncate'))}})" class="btn btn-lg btn-danger"><i class="fas fa-trash-alt"></i> RESET</button>
                            <a href="{{route('manage.page.create')}}" class="btn btn-lg btn-primary">CREATE <i class="fas fa-plus"></i></a>
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
                    
                    <div>
                        {{$page->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container bg-white py-3 mt-5 shadow">
    <h1 class="text-center">DATA</h1>
    <hr>
    <div class="row justify-content-center">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-left">
                        @forelse($page as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{route('manage.page.show', $row->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('manage.page.edit', $row->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <button @click="Delete({{json_encode(route('manage.page.destroy',$row->id))}})" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th colspan="3" class="text-danger text-center"><h3>NO DATA NOW.</h3></th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
