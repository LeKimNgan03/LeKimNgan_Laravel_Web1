@extends('layout.site')
@section('title', 'Trang chủ')
@section('content')
<x-main-menu />
<x-slider />
<x-flash-sale />
<x-product-new />
<x-product-category-home />
<x-last-post />
@endsection