@extends('layout.site')
@section('title', 'Chủ đề bài viết')
@section('content')
<x-main-menu />

<div class="container my-5">
    <h2 class="text-center">{{$topic->name}}</h2>
    <div class="row">
        @foreach ($list_post as $rowpost)
        <x-post-item :rowpost="$rowpost" />
        @endforeach
    </div>
    <div class="row mt-3 d-flex justify-content-center">
        {{ $list_post->links() }}
    </div>
</div>

@endsection