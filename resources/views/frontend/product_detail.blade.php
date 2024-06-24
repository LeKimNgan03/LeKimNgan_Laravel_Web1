@extends('layout.site')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<x-main-menu />

<!-- Main Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="https://images.unsplash.com/photo-1522071829824-f3c702921201?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="Jean Paul Gaultier Le Male Lover EDP" class="product-image">
        </div>
        <div class="col-md-6">
            <h1>Jean Paul Gaultier Le Male Lover EDP</h1>
            <p>Hãng: Jean Paul Gaultier</p>
            <p>Giá: 2.850.000₫</p>
            <div class="col-auto">
                <div class="input-group">
                    <button class="btn btn-outline-secondary" type="button">-</button>
                    <input type="number" class="form-control text-center" id="quantity-input" value="1" min="1">
                    <button class="btn btn-outline-secondary" type="button">+</button>
                </div>
            </div>
            <button type="button" class="btn btn-primary">Thêm vào giỏ hàng</button>
        </div>
    </div>
</div>
@endsection