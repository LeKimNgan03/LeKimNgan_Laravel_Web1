@extends('layout.admin')
@section('title', 'Danh mục')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Thùng rác danh mục</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header text-right">
                <button class="btn btn-sm btn-danger">
                    <a href="{{route('admin.category.index')}}" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
                </button>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:30px">#</th>
                                    <th class="text-center" style="width:130px">Hình ảnh</th>
                                    <th>Tên danh mục</th>
                                    <th>Tên slug</th>
                                    <th class="text-center" style="width:170px">Chức năng</th>
                                    <th class="text-center" style="width:40px">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                <tr class="datarow">
                                    <td><input type="checkbox"></td>
                                    <td><img style="width:100px" src="{{asset('images/categories/' . $row->image)}}" alt="{{$row->image}}"></td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->slug}}</td>
                                    <td>
                                        @php
                                        $agrs = ['id' => $row->id];
                                        @endphp
                                        <a href="{{route('admin.category.show',$agrs)}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.category.restore',$agrs)}}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-rotate-left"></i>
                                        </a>
                                        <form action="{{route('admin.category.destroy',$agrs)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" name="delete" type="submit">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
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