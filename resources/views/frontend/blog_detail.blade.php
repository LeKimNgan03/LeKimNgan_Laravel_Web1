@extends('layout.site')
@section('title', 'Chi tiết bài viết')
@section('content')
<x-main-menu />

<div class="container mt-5">
    <div class="m-3">
        <h3 class="pb-0 fw-bold text-uppercase">{{$post->title}}</h3>
        <hr />
        <div class="row">
            <div class="col-md-6">
                <img class="img-size" src="{{asset('images/post/' . $post->image)}}" style="width: 633x; height: 400px" alt="{{$post->image}}">
            </div>
            <div class="col-md-6">
                Mô tả:
                <p>{{$post->detail}}</p>
                Chi tiết bài viết:
                <p>{{$post->description}}</p>
            </div>
        </div>
    </div>
    <hr>
    <!-- Blog Related -->
    <div class="row">
        <h2 class="text-center">Bài viết liên quan</h2>
        @foreach ($list_post as $rowpost)
        <x-post-item :rowpost="$rowpost" />
        @endforeach
    </div>
</div>

@endsection