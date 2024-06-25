@extends('layout.site')
@section('title', 'Bài viết')
@section('content')
<x-main-menu />

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="text-center">Bài viết</h2>
    <div class="row">
        @foreach ($list_post as $row)
        <div class="col-sm-6">
            <div class="card mb-3">
                <img class="card-img-top" src="{{asset('images/post/' . $row->image)}}" alt="{{$row->image}}">
                <div class="card-body">
                    <h5 class="card-title">{{$row->title}}</h5>
                    <p class="card-text">{{$row->detail}}</p>
                    <p class="card-text">
                        <small class="text-muted">Cập nhật {{$row->created_at}}</small>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection