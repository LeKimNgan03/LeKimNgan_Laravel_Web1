@extends('layout.admin')
@section('title', 'Danh mục')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Chỉnh sửa danh mục</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <a href="{{route('admin.category.index')}}" class="btn btn-sm btn-info">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Về danh sách
                </a>
            </div>

            <div class="card-body">
                <form action="{{route('admin.category.update', ['id' => $category->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name">Tên danh mục</label>
                        <input type="text" value="{{old('name', $category->name)}}" name="name" id="name" class="form-control">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>

                    <!-- Parent_id -->
                    <div class="mb-3">
                        <label for="parent_id">Danh mục cha</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0">Cấp cha</option>
                            <!-- csdl -->
                            {!! $htmlparentid !!}
                        </select>
                    </div>

                    <!-- Sort_order -->
                    <div class="mb-3">
                        <label for="sort_order">Sắp xếp</label>
                        <select name="sort_order" id="sort_order" class="form-control">
                            <option value="0">Chọn vị trí</option>
                            <!-- csdl -->
                            {!! $htmlsortorder !!}
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description">Mô tả</label>
                        <textarea name="description" id="description" row="3" class="form-control">
                        {{old('description', $category->description)}}
                        </textarea>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image">Hình đại diện</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="1" {{($category->status==1)?'selected':''}}>Xuất bản</option>
                            <option value="2" {{($category->status==2)?'selected':''}}>Chưa xuất bản</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<!-- /.CONTENT -->

@endsection