@extends('layout.admin')
@section('title', 'Menu')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Thêm Menu</h1>
                </div>
            </div>
        </div>
    </section>

    <form action="{{route('admin.menu.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <button type="submit" class="btn btn-sm btn-success" name="CHANGEADD">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm menu
                    </button>
                    <a href="{{route('admin.menu.index')}}" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label>Tên menu</label>
                                <input type="text" name="name" id="name" placeholder="Nhập tên menu" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Link</label>
                                <input type="text" name="link" id="link" placeholder="Nhập link" class="form-control" value="{{old('link')}}">
                            </div>

                            <div class="mb-3">
                                <label>Type</label>
                                <input type="text" name="type" id="type" placeholder="Nhập type" class="form-control" value="{{old('type')}}">
                            </div>
                            <div class="mb-3">
                                <label>Vị trí</label>
                                <input type="text" name="position" id="position" placeholder="Nhập vị trí" class="form-control" value="{{old('position')}}">
                                <!-- csdl -->
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label>Bảng</label>
                                <select name="table_id" class="form-control">
                                    <option value="1">None</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="parent_id">Danh mục cha</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">Cấp cha</option>
                                    <!-- csdl -->
                                    {!! $htmlparentid !!}
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="sort_order">Sắp xếp</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="0">None</option>
                                    <!-- csdl -->
                                    {!! $htmlsortorder !!}
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
<!-- END CONTENT-->

@endsection