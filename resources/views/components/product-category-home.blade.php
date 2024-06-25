@foreach($category_list as $cat_row)
<div class="container my-5">
    <h2 class="text-center">{{$cat_row->name}}</h2>
    <div class="row">
        <x-product-category :catrow="$cat_row" />
    </div>
    <div class="text-center">
        <button class="btn btn-light" type="button">
            <a href="{{ route('site.product.category', ['slug' => $cat_row->slug]) }}" class="text-dark text-decoration-none">
                Xem thêm
            </a>
        </button>
    </div>
</div>
@endforeach