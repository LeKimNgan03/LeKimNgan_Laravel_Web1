@extends('layout.admin')
@section('title', 'Sản phẩm')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chỉnh sửa sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <form action="{{route('admin.product.update', ['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                <div class="card-header text-right">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Cập nhật
                    </button>
                    <a href="{{route('admin.product.index')}}" class="btn btn-sm btn-info">
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
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" value="{{old('name', $product->name)}}" name="name" id="name" class="form-control">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>

                            <!-- Detail -->
                            <div class="mb-3">
                                <label for="detail">Chi tiết</label>
                                <textarea name="detail" id="detail" rows="6" class="form-control">
                                {{old('detail', $product->detail)}}
                                </textarea>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" rows="6" class="form-control">
                                {{old('description', $product->description)}}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Category_id -->
                            <div class="mb-3">
                                <label for="category_id">Danh mục</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="0">Chọn danh mục</option>
                                    <!-- csdl -->
                                    {!! $htmlcategoryid !!}
                                </select>
                            </div>

                            <!-- Brand_id -->
                            <div class="mb-3">
                                <label for="brand_id">Thương hiệu</label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="0">Chọn thương hiệu</option>
                                    <!-- csdl -->
                                    {!! $htmlbrandid !!}
                                </select>
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <label for="price">Giá</label>
                                <input type="number" value="{{old('price', $product->price)}}" name="price" id="price" class="form-control">
                                @error('price')
                                {{ $message }}
                                @enderror
                            </div>

                            <!-- Price sale -->
                            <div class="mb-3">
                                <label for="pricesale">Giá khuyến mãi</label>
                                <input type="number" value="{{old('pricesale', $product->pricesale)}}" name="pricesale" id="pricesale" class="form-control">
                            </div>

                            <!-- Quantity -->
                            <div class="mb-3">
                                <label for="qty">Số lượng</label>
                                <input type="number" value="{{old('qty', $product->qty)}}" name="qty" id="qty" class="form-control">
                                @error('qty')
                                {{ $message }}
                                @enderror
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
                                    <option value="1" {{($product->status==1)?'selected':''}}>Xuất bản</option>
                                    <option value="2" {{($product->status==2)?'selected':''}}>Chưa xuất bản</option>
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