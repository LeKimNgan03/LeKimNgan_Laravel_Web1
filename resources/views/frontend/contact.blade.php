@extends('layout.site')
@section('title', 'Liên hệ')
@section('content')
<x-main-menu />

<!-- Main Content -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Thông tin liên hệ</h2>
            <p class="fw-bold">Perfume - Nhà cung cấp nước hoa chính hãng</p>
            <ul>
                <li>Địa chỉ: </li>
                <li>Số điện thoại: </li>
                <li>Email: </li>
            </ul>
            <p>Cảm ơn mọi người đã quan tâm đến sản phẩm của cửa hàng chúng tôi.</p>
            <div class="ratio ratio-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96714.68291250926!2d-74.05953969406828!3d40.75468158321536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2sManhattan%2C%20Nowy%20Jork%2C%20Stany%20Zjednoczone!5e0!3m2!1spl!2spl!4v1672242259543!5m2!1spl!2spl" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="col-md-6">
            <h2 class="text-center">Liên hệ với chúng tôi</h2>
            <form action="{{route('admin.contact.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Name -->
                <div class="form-group">
                    <label for="name">Họ và tên</label>
                    <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>

                <!--  -->
                <div class="row">
                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="form-group mt-5">
                            <label for="email">Email</label>
                            <input type="email" value="{{old('email')}}" class="form-control" id="email" name="email">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">
                        <div class="form-group mt-5">
                            <label for="phone">Số điện thoại</label>
                            <input type="number" value="{{old('phone')}}" class="form-control" id="phone" name="phone">
                            @error('phone')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="form-group mt-5">
                    <label for="content">Nội dung</label>
                    <textarea class="form-control" id="content" rows="5" name="content">
                    {{old('content')}}
                    </textarea>
                </div>
                <button type="submit" class="btn text-white mt-5" style="background-color: #829460;">
                    Gửi
                </button>
            </form>
        </div>
    </div>
</div>

@endsection