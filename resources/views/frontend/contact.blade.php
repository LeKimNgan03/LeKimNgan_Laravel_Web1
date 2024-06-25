@extends('layout.site')
@section('title', 'Liên hệ')
@section('content')
<x-main-menu />

<!-- Main Content -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Liên hệ</h2>
            <form>
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group mt-5">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group mt-5">
                    <label for="message">Nội dung</label>
                    <textarea class="form-control" id="message" rows="5"></textarea>
                </div>
                <button type="submit" class="btn text-white mt-5" style="background-color: #829460;">
                    Gửi
                </button>
            </form>
        </div>
    </div>
</div>

@endsection