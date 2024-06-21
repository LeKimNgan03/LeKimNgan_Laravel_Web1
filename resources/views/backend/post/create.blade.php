@extends('layout.admin')
@section('title', 'Bài viết')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm bài viết</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                <div class="card-header text-right">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm bài viết
                    </button>
                    <a href="{{route('admin.post.index')}}" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            @csrf
                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title">Tên bài viết</label>
                                <input type="text" value="{{old('title')}}" name="title" id="title" class="form-control">
                                @error('title')
                                {{ $message }}
                                @enderror
                            </div>

                            <!-- Detail -->
                            <div class="mb-3">
                                <label for="detail">Chi tiết</label>
                                <textarea name="detail" id="detail" rows="6" class="form-control">
                                {{old('detail')}}
                                </textarea>
                                @error('detail')
                                {{ $message }}
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" rows="6" class="form-control">
                                {{old('description')}}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- topic_id -->
                            <div class="mb-3">
                                <label for="topic_id">Chủ đề</label>
                                <select name="topic_id" id="topic_id" class="form-control">
                                    <option value="0">Chọn chủ đề</option>
                                    <!-- csdl -->
                                    {!! $htmltopicid !!}
                                </select>
                            </div>

                            <!-- Type -->
                            <div class="mb-3">
                                <label for="type">Kiểu</label>
                                <textarea name="type" id="type" rows="3" class="form-control">
                                {{old('type')}}
                                </textarea>
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<!-- /.CONTENT -->
 
@endsection