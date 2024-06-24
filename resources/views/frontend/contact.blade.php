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
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="message">Nội dung</label>
                    <textarea class="form-control" id="message" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-light">Gửi</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <h2 class="text-center">Location</h2>
        <div class="col-md-12">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387372.17868910836!2d-74.25986599999999!3d40.6971494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sca!4v1591133350450!5m2!1sen!2sca" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

@endsection