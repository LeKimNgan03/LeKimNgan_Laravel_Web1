<div class="container my-5">
    <div class="row">
        @foreach ($product_list as $product)
        <x-product-card :product="$product" />
        @endforeach
    </div>
</div>