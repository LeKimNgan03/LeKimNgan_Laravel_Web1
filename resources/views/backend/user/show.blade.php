@extends('layout.admin')
@section('title', 'Người Dùng')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết người dùng</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            @foreach ($list as $row)
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        @php
                        $agrs = ['id' => $row->id]
                        @endphp
                        <a href="{{route('admin.user.edit', $agrs)}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i> Sửa
                        </a>
                        <a href="{{route('admin.user.delete', $agrs)}}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Xóa
                        </a>
                        <a href="{{route('admin.user.index')}}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30%;">
                                <strong>Tên trường</strong>
                            </th>
                            <th class="text-center" style="width:70%;">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{$row->id}}</td>
                        </tr>
                        <tr>
                            <td>Họ tên</td>
                            <td>{{$row->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$row->email}}</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>{{$row->phone}}</td>
                        </tr>
                        <tr>
                            <td>Tên người dùng</td>
                            <td>{{$row->username}}</td>
                        </tr>
                        <tr>
                            <td>Mật khẩu</td>
                            <td>{{$row->password}}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>{{$row->address}}</td>
                        </tr>
                        <tr>
                            <td>Hình ảnh</td>
                            <td><img style='width:100px;' src="{{asset('images/user/' . $row->image)}}" alt="{{$row->image}}"></td>
                        </tr>
                        <tr>
                            <td>Vai trò</td>
                            <td>{{$row->roles}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{$row->status}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </section>
</div>
<!-- /.CONTENT -->

@endsection