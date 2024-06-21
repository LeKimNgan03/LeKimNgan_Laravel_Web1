<div class="container my-5">
    <h2 class="text-center">Sản phẩm mới</h2>
    <div class="row">
        @foreach ($listproduct as $product)
        <x-product-card :product="$product" />
        @endforeach
    </div>
</div>