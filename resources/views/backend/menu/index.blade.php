@extends('layout.admin')
@section('title', 'Menu')
@section('content')
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="d-inline">Tất cả Menu</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header text-right">
                <button class="btn btn-sm btn-success">
                    <i class="fa fa-save" aria-hidden="true"></i>
                    Lưu
                </button>
            </div>
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-md-3">
                        <div class="accordion" id="accordionExample">
                            <div class="card mb-0 p-3">
                                <select name="postion" class="form-control">
                                    <option value="mainmenu">Main Menu</option>
                                    <option value="footermenu">Footer Menu</option>
                                </select>
                            </div>
                            <div class="card mb-0">
                                <div class="card-header" id="headingCategory">
                                    <strong data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                                        Danh mục sản phẩm
                                    </strong>
                                </div>
                                <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionExample">
                                    <div class="card-body p-3">
                                        <div class="form-check">
                                            <input name="categoryId[]" class="form-check-input" type="checkbox" id="categoryId">
                                            <label class="form-check-label" for="categoryId">
                                                Default checkbox
                                            </label>
                                        </div>
                                        <div class="my-3">
                                            <button name="ADDCATEGORY" class="btn btn-sm btn-success form-control">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-0">
                                <div class="card-header" id="headingBrand">
                                    <strong data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true" aria-controls="collapseBrand">
                                        Thương hiệu
                                    </strong>
                                </div>
                                <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand" data-parent="#accordionExample">
                                    <div class="card-body p-3">
                                        <div class="form-check">
                                            <input name="BrandId[]" class="form-check-input" type="checkbox" id="BrandId">
                                            <label class="form-check-label" for="BrandId">
                                                Default checkbox
                                            </label>
                                        </div>
                                        <div class="my-3">
                                            <button name="ADDBRAND" class="btn btn-sm btn-success form-control">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-0">
                                <div class="card-header" id="headingTopic">
                                    <strong data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true" aria-controls="collapseTopic">
                                        Chủ đề bài viết
                                    </strong>
                                </div>
                                <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic" data-parent="#accordionExample">
                                    <div class="card-body p-3">
                                        <div class="form-check">
                                            <input name="TopicId[]" class="form-check-input" type="checkbox" id="TopicId">
                                            <label class="form-check-label" for="TopicId">
                                                Default checkbox
                                            </label>
                                        </div>
                                        <div class="my-3">
                                            <button name="ADDTOPIC" class="btn btn-sm btn-success form-control">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-0">
                                <div class="card-header" id="headingPage">
                                    <strong data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
                                        Trang đơn
                                    </strong>
                                </div>
                                <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionExample">
                                    <div class="card-body p-3">
                                        <div class="form-check">
                                            <input name="PageId[]" class="form-check-input" type="checkbox" id="PageId">
                                            <label class="form-check-label" for="PageId">
                                                Default checkbox
                                            </label>
                                        </div>
                                        <div class="my-3">
                                            <button name="ADDPAGE" class="btn btn-sm btn-success form-control">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-0">
                                <div class="card-header" id="headingCustom">
                                    <strong data-toggle="collapse" data-target="#collapseCustom" aria-expanded="true" aria-controls="collapseCustom">
                                        Tuỳ liên kết
                                    </strong>
                                </div>
                                <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom" data-parent="#accordionExample">
                                    <div class="card-body p-3">
                                        <div class="mb-3">
                                            <label>Tên menu</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label>Liên kết</label>
                                            <input type="text" name="link" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button name="ADDCUSTOM" class="btn btn-sm btn-success form-control">Thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:30px;">#</th>
                                    <th>Tên Menu</th>
                                    <th>Liên kết</th>
                                    <th>Vị trí</th>
                                    <th class="text-center" style="width:190px">Chức năng</th>
                                    <th class="text-center" style="width:30px">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                <tr class="row">
                                    <td><input type="checkbox"></td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->link}}</td>
                                    <td>{{$row->type}}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-success">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.menu.show', ['id' => $row->id])}}" class="btn btn-sm btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.menu.edit', ['id' => $row->id])}}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{route('admin.menu.trash')}}" class="btn btn-sm btn-danger">
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
<!-- END CONTENT-->
@endsection