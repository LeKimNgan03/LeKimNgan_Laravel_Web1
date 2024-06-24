@extends('layout.admin')
@section('title', 'Người dùng')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tất cả người dùng</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{route('admin.user.create')}}" class="btn btn-sm btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> Thêm
                        </a>
                        <a href="{{route('admin.user.trash')}}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i> Thùng rác
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center" style="width:90px">Hình</th>
                            <th>Họ tên</th>
                            <th>Điện thoại</th>
                            <th>Email</th>
                            <th class="text-center" style="width:190px">Chức năng</th>
                            <th class="text-center" style="width:30px">ID</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($list as $row)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><img src="{{asset("public/images/" . $row->image)}}" alt="{{$row->image}}"></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->email}}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.user.show', ['id' => $row->id])}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.user.edit', ['id' => $row->id])}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.user.trash')}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>{{$row->id}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<!-- /.CONTENT -->

@endsection