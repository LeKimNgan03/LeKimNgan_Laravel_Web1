@extends('layout.site')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<x-main-menu />

<!-- Main Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 shadow-sm rounded">
            <img src="{{asset('images/product/' . $product->image)}}" class="img-fluid w-100">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <hr>
            <div class="row">
                @if ($product->pricesale > 0 && $product->pricesale < $product->price)
                    <div class="col-12">
                        <p class="fw-bold fs-4 d-inline-block">Giá: {{number_format($product->pricesale)}}₫</p>
                        <del class="card-text d-inline-block">{{number_format($product->price)}}₫</del>
                    </div>
                    @else
                    <div class="col-12">
                        <p class="fw-bold fs-4">Giá: {{number_format($product->price)}}₫</p>
                    </div>
                    @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="fw-bold">Dung Tích:</p>
                </div>
                <div class="d-flex flex-nowrap">
                    <div class="order-1 p-2">
                        <button class="btn btn-outline-dark">100ML</button>
                    </div>
                    <div class="order-2 p-2">
                        <button class="btn btn-outline-dark">50ML</button>
                    </div>
                    <div class="order-3 p-2">
                        <button class="btn btn-outline-dark">10ML</button>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <input type="number" class="form-control text-center" id="qty" value="1" min="1">
                </div>
                <div class="col-6">
                    <button type="button" class="btn btn-light" onclick="handleAddCart()">Thêm vào giỏ hàng</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2 class="mt-5">Mô tả sản phẩm</h2>
            <hr>
            <p>{!! $product->detail !!}</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Sản phẩm liên quan</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Đánh giá</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="row mt-4">
                        @foreach ($list_product as $product)
                        <x-product-card :$product />
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    Đánh giá
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script>
    function handleAddCart(productid) {
        let qty = document.getElementById("qty").value;
        $.ajax({
            type: "GET",
            url: "{{ route('site.cart.addcart') }}",
            data: {
                productid: productid,
                qty: qty
            },
            success: function(result, status, xhr) {
                document.getElementById("showqty").innerHTML = result;
                alert("Thêm vào giỏ hàng thành công");
            },
            error: function(xhr, status, error) {
                alert(error);
            }
        })
    }
</script>
@endsection