@extends('layout.admin')
@section('title', 'Chủ đề')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Tất cả chủ đề</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header text-right">
                <button class="btn btn-sm btn-danger">
                    <a href="{{route('admin.topic.trash')}}" class="text-white">
                        <i class="fa fa-trash"></i>
                        Thùng rác
                    </a>
                </button>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <form action="{{route('admin.topic.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name">Tên chủ đề</label>
                                <input type="text" value="{{old('name')}}" name="name" id="name" class="form-control">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" row="3" class="form-control">
                                {{old('description')}}
                                </textarea>
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-success">Thêm chủ đề</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-9">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:30px">#</th>
                                    <th>Tên chủ đề</th>
                                    <th>Tên slug</th>
                                    <th>Mô tả</th>
                                    <th class="text-center" style="width:170px">Chức năng</th>
                                    <th class="text-center" style="width:40px">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                <tr class="datarow">
                                    <td><input type="checkbox"></td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->slug}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>
                                        @php
                                        $agrs = ['id' => $row->id];
                                        @endphp
                                        <a href="{{route('admin.topic.status', $agrs)}}" class="btn btn-sm btn-success">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.topic.show', $agrs)}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.topic.edit', $agrs)}}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.topic.delete', $agrs)}}" class="btn btn-sm btn-danger">
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
            </div>
        </div>
    </section>
</div>
<!-- /.CONTENT -->

@endsection