<div class="container my-5">
    <h2 class="text-center">Sản phẩm khuyến mãi</h2>
    <div class="row">
        @foreach ($listsale as $product)
        <x-product-card :product="$product" />
        @endforeach
    </div>
    <div class="text-center">
        <button class="btn btn-light" type="button">
            <a href="" class="text-dark text-decoration-none">
                Xem thêm
            </a>
        </button>
    </div>
</div>