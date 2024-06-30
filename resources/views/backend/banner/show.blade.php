@extends('layout.admin')
@section('title', 'Banner')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết banner</h1>
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
                        <a href="{{route('admin.banner.edit', $agrs)}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i> Sửa
                        </a>
                        <a href="{{route('admin.banner.delete', $agrs)}}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Xóa
                        </a>
                        <a href="{{route('admin.banner.index')}}" class="btn btn-sm btn-info">
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
                            <td>Tên banner</td>
                            <td>{{$row->name}}</td>
                        </tr>
                        <tr>
                            <td>Link</td>
                            <td>{{$row->slug}}</td>
                        </tr>
                        <tr>
                            <td>Hình</td>
                            <td><img style='width:100px;' src="{{asset('images/banner/' . $row->image)}}"></td>
                        </tr>
                        <tr>
                            <td>Vị trí</td>
                            <td>{{$row->position}}</td>
                        </tr>
                        <tr>
                            <td>Sắp xếp</td>
                            <td>{{$row->sort_order}}</td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td>{{$row->description}}</td>
                        </tr>
                        <tr>
                            <td>Ngày tạo</td>
                            <td>{{$row->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Ngày sửa</td>
                            <td>{{$row->updated_at}}</td>
                        </tr>
                        <tr>
                            <td>Trạng thái</td>
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