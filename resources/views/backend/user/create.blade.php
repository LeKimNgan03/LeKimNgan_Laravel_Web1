@extends('layout.admin')
@section('title', 'Người dùng')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <form action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm thành viên</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" name="create" class="btn btn-sm btn-success">
                                <i class="fa fa-save"></i> Thêm thành viên
                            </button>
                            <a class="btn btn-sm btn-info" href="{{route('admin.user.index')}}">
                                <i class="fa fa-arrow-left"></i> Về danh sách
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name">Họ tên</label>
                                <input type="text" value="{{old('name')}}" name="name" id="name" class="form-control">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-3">
                                <label for="phone">Điện thoại</label>
                                <input type="number" value="{{old('phone')}}" name="phone" id="phone" class="form-control">
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" value="{{old('email')}}" name="email" id="email" class="form-control">
                            </div>

                            <!-- Gender -->
                            <div class="mb-3">
                                <label for="gender">Giới tính</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                            </div>

                            <!-- Address -->
                            <div class="mb-3">
                                <label for="address">Địa chỉ</label>
                                <input type="text" value="{{old('address')}}" name="address" id="address" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Username -->
                            <div class="mb-3">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" value="{{old('username')}}" name="username" id="username" class="form-control">
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password">Mật khẩu</label>
                                <input type="password" value="{{old('password')}}" name="password" id="password" class="form-control">
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <!-- Roles -->
                            <div class="mb-3">
                                <label for="roles">Quyền</label>
                                <select name="roles" id="roles" class="form-control">
                                    <option value="customer">Khách hàng</option>
                                    <option value="admin">Quản lý</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
<!-- /.CONTENT -->

@endsection