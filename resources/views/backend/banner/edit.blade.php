@extends('layout.admin')
@section('title', 'Banner')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa Banner</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <form action="{{route('admin.banner.update', ['id' => $banner->id])}}" method="post" enctype="multipart/form-data">
                <div class="card-header text-right">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Cập nhật
                    </button>
                    <a href="{{route('admin.banner.index')}}" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            @csrf
                            @method("PUT")
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name">Tên banner</label>
                                <input type="text" value="{{old('name', $banner->name)}}" name="name" id="name" class="form-control">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>

                            <!-- Detail -->
                            <div class="mb-3">
                                <label for="detail">Chi tiết</label>
                                <textarea name="detail" id="detail" rows="6" class="form-control">
                                {{old('detail', $banner->detail)}}
                                </textarea>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" rows="6" class="form-control">
                                {{old('description', $banner->description)}}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Position -->
                            <div class="mb-3">
                                <label for="position">Vị trí</label>
                                <input type="text" value="{{old('position', $banner->position)}}" name="position" id="position" class="form-control">
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

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image">Hình ảnh</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{($banner->status==1)?'selected':''}}>Xuất bản</option>
                                    <option value="2" {{($banner->status==2)?'selected':''}}>Chưa xuất bản</option>
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