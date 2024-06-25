@extends('layout.site')
@section('title', 'Danh mục sản phẩm')
@section('content')
<x-main-menu />

<div class="container my-5">
    <h2 class="text-center">{{$row_category->name}}</h2>
    <div class="row">
        @foreach ($list_product as $product)
        <x-product-card :$product />
        @endforeach
    </div>
    <div class="row mt-3 d-flex justify-content-center">
        {{ $list_product->links() }}
    </div>
</div>

@endsection