<div class="col-md-3 mb-4">
    <div class="card h-100">
        <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
            <img src="{{asset('images/product/' . $product->image)}}" class="card-img-top">
        </a>
        <div class="card-body">
            <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}" class="text-dark  text-decoration-none">
                <h5 class="card-title">{{$product->name}}</h5>
            </a>
            @if ($product->pricesale == 0)
                <p class="card-text">{{number_format($product->price)}}₫</p>
            @else
            <div class="row">
                <div class="col-6">
                    <del class="card-text">{{number_format($product->price)}}₫</del>
                </div>
                <div class="col-6">
                    <p class="card-text">{{number_format($product->pricesale)}}₫</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>