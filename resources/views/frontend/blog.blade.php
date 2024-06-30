@extends('layout.site')
@section('title', 'Bài viết')
@section('content')
<x-main-menu />

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="text-center">Bài viết</h2>
    <div class="row">
        @foreach ($list_post as $rowpost)
        <x-post-item :rowpost="$rowpost" />
        @endforeach
        <div class="row mt-3 d-flex justify-content-center">
            {{ $list_post->links() }}
        </div>
    </div>
</div>

@endsection