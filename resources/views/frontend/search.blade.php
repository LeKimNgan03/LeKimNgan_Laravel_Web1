@extends('layout.site')
@section('title', 'Tất cả sản phẩm')
@section('content')
<x-main-menu />

@if ($products->count() > 0)
<div class="container my-5">
    <h2 class="text-center">Tất cả sản phẩm</h2>
    <div class="row">
        @foreach ($list_product as $product)
        <x-product-card :$product />
        @endforeach
    </div>
    <div class="row mt-3 d-flex justify-content-center">
        {{ $list_product->links() }}
    </div>
</div>

@else
<p>Không tìm thấy sản phẩm.</p>
@endif

@endsection