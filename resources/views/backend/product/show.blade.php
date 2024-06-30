@extends('layout.admin')
@section('title', 'Sản Phẩm')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết sản phẩm</h1>
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
                        <a href="{{route('admin.product.edit', $agrs)}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i> Sửa
                        </a>
                        <a href="{{route('admin.product.delete', $agrs)}}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Xóa
                        </a>
                        <a href="{{route('admin.product.index')}}" class="btn btn-sm btn-info">
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
                            <td>Category_id</td>
                            <td>{{$row->categoryid}}</td>
                        </tr>
                        <tr>
                            <td>Brand_id</td>
                            <td>{{$row->brandid}}</td>
                        </tr>
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td>{{$row->name}}</td>
                        </tr>
                        <tr>
                            <td>Slug</td>
                            <td>{{$row->slug}}</td>
                        </tr>
                        <tr>
                            <td>Giá tiền</td>
                            <td>{{$row->price}}</td>
                        </tr>
                        <tr>
                            <td>Giá khuyến mãi</td>
                            <td>{{$row->pricesale}}</td>
                        </tr>
                        <tr>
                            <td>Hình ảnh</td>
                            <td>
                                <img style='width:100px;' src="{{ asset('images/product/'.$row->image) }}" alt="{{$row->image}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Số lượng</td>
                            <td>{{$row->qty}}</td>
                        </tr>
                        <tr>
                            <td>Chi tiết sản phẩm</td>
                            <td>{{$row->detail}}</td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td>{{$row->description}}</td>
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