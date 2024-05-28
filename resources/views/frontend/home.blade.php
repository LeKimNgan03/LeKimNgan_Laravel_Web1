@extends('layout.site')
@section('title', 'Home')
@section('content')
<x-slider />
<x-product-new />
<x-product-category />
<x-flash-sale />
<x-last-post />
@endsection