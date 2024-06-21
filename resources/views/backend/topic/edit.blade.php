@extends('layout.admin')
@section('title', 'Chủ đề')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Chỉnh sửa chủ đề</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header text-right">
                <a href="{{route('admin.topic.index')}}" class="btn btn-sm btn-info">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    Về danh sách
                </a>
            </div>

            <div class="card-body">
                <form action="{{route('admin.topic.update', ['id' => $topic->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name">Tên chủ đề</label>
                        <input type="text" value="{{old('name', $topic->name)}}" name="name" id="name" class="form-control">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description">Mô tả</label>
                        <textarea name="description" id="description" rows="6" class="form-control">
                        {{old('description', $topic->description)}}
                        </textarea>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="form-control">
                            <option value="1" {{($topic->status==1)?'selected':''}}>Xuất bản</option>
                            <option value="2" {{($topic->status==2)?'selected':''}}>Chưa xuất bản</option>
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