<div class="col-md-3 mb-4">
    <div class="card h-100">
        <img src="{{asset('images/product/' . $product->image)}}" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">{{$product->price}}</p>
            <a href="#" class="btn btn-primary w-100">
                <i class="fa-solid fa-cart-plus"></i>
            </a>
        </div>
    </div>
</div>