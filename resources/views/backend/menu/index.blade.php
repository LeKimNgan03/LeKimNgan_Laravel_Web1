@extends('layout.admin')
@section('title', 'Menu')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Quản lý menu</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header text-right">
                <a href="{{route('admin.menu.create')}}" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i> Thêm Menu</a>
                <a href="{{route('admin.menu.trash')}}" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Thùng rác</a>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center">Tên menu</th>
                            <th class="text-center">Liên kết</th>
                            <th class="text-center">Vị trí</th>
                            <th class="text-center" style="width:170px">Chức năng</th>
                            <th class="text-center" style="width:40px">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                        <tr class="datarow">
                            <td><input type="checkbox"></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->link}}</td>
                            <td>{{$row->position}}</td>
                            <td>
                                @php
                                $agrs = ['id' => $row->id]
                                @endphp

                                @if ($row->status == 1)
                                <a href="{{route('admin.menu.status', $agrs)}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                @else
                                <a href="{{route('admin.menu.status', $agrs)}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                @endif

                                <a href="{{route('admin.menu.show', $agrs)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.menu.edit', $agrs)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.menu.delete', $agrs)}}" class="btn btn-sm btn-danger">
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
<!-- END CONTENT-->

@endsection