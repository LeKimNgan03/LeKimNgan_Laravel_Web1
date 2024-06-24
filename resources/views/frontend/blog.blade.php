@extends('layout.site')
@section('title', 'Bài viết')
@section('content')
<x-main-menu />

<!-- Main Content -->
<div class="container mt-5">
    <h2 class="text-center">Posts</h2>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card mb-3">
                <img class="card-img-top" src="./assets/img/blog-1.png" alt="Post 1">
                <div class="card-body">
                    <h5 class="card-title">Post New 1</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-light">See</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card mb-3">
                <img class="card-img-top" src="./assets/img/blog-2.png" alt="Post 1">
                <div class="card-body">
                    <h5 class="card-title">Post New 2</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-light">See</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection