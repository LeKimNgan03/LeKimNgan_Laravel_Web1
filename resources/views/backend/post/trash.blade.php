@extends('layout.admin')
@section('title', 'Bài biết')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Thùng rác bài viết</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header text-right">
                <a href="{{route('admin.post.index')}}" class="btn btn-sm btn-info">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Về danh sách
                </a>
            </div>

            <div class="card-body p-2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center" style="width:130px">Hình</th>
                            <th class="text-center">Tiêu đề bài viết</th>
                            <th class="text-center">Tên chủ đề</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center" style="width:170px">Chức năng</th>
                            <th class="text-center" style="width:40px">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                        <tr class="datarow">
                            <td><input type="checkbox"></td>
                            <td><img style="width:150px" src="{{asset("images/post/" . $row->image)}}" alt="{{$row->image}}"></td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->topicname}}</td>
                            <td>{{$row->slug}}</td>
                            <td class="">
                                <div class="d-flex justify-content-between">
                                    @php
                                    $agrs = ['id' => $row->id]
                                    @endphp
                                    <a href="{{route('admin.post.show', $agrs)}}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{route('admin.post.restore', $agrs)}}" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-rotate-left"></i>
                                    </a>
                                    <form action="{{route('admin.post.destroy', $agrs)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" name="delete" type="submit">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td> {{ $row->id }}</td>
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