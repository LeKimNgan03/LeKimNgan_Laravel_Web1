@extends('layout.admin')
@section('title', 'Menu')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết Menu</h1>
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
                        <a href="{{route('admin.menu.edit', $agrs)}}" class="btn btn-sm btn-primary">
                            <i class="far fa-edit"></i> Sửa
                        </a>
                        <a href="{{route('admin.menu.delete', $agrs)}}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                        <a href="{{route('admin.menu.index')}}" class="btn btn-sm btn-info">
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
                            <td>Tên menu</td>
                            <td>{{$row->name}}</td>
                        </tr>
                        <tr>
                            <td>Link</td>
                            <td>{{$row->link}}</td>
                        </tr>
                        <tr>
                            <td>table_id</td>
                            <td>{{$row->table_id}}</td>
                        </tr>
                        <tr>
                            <td>Danh mục cha</td>
                            <td>{{$row->parent_id}}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>{{$row->type}}</td>
                        </tr>
                        <tr>
                            <td>Position</td>
                            <td>{{$row->position}}</td>
                        </tr>
                        <tr>
                            <td>Sắp xếp</td>
                            <td>{{$row->sort_order}}</td>
                        </tr>
                        <tr>
                            <td>Created_at</td>
                            <td>{{$row->created_at}}</td>
                        </tr>
                        <tr>
                            <td>updated_at</td>
                            <td>{{$row->updated_at}}</td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td>{{$row->status}}</td>
                        </tr>
                        <tr>
                            <td>created_by</td>
                            <td>{{$row->created_by}}</td>
                        </tr>
                        <tr>
                            <td>updated_by</td>
                            <td>{{$row->updated_by}}</td>
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