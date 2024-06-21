@extends('layout.admin')
@section('title', 'Bài viết')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tất cả bài viết</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{route('admin.post.create')}}" class="btn btn-sm btn-success">
                            <i class="fa fa-plus" aria-hidden="true"></i> Thêm
                        </a>
                        <a href="{{route('admin.post.trash')}}" class="btn btn-sm btn-danger">
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
                            <th class="text-center" style="width:130px">Hình</th>
                            <th>Tiêu đề bài viết</th>
                            <th>Tên chủ đề</th>
                            <th>Slug</th>
                            <th class="text-center" style="width:170px">Chức năng</th>
                            <th class="text-center" style="width:40px">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><img style="width:150px" src="{{asset("images/post/" . $row->image)}}" alt="{{$row->image}}"></td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->topicname}}</td>
                            <td>{{$row->slug}}</td>
                            <td>
                                @php
                                $agrs = ['id' => $row->id];
                                @endphp
                                <a href="{{route('admin.post.status', $agrs)}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.post.show', $agrs)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.post.edit', $agrs)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.post.delete', $agrs)}}" class="btn btn-sm btn-danger">
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