<div class="col-sm-6">
    <div class="card mb-3">
        <a href="{{route('site.blog.detail', ['slug' => $post_item->slug])}}">
            <img class="card-img-top" src="{{asset('images/post/' . $post_item->image)}}" style="width: 633x; height: 400px" alt="{{$post_item->image}}">
        </a>
        <div class="card-body">
            <a class="text-dark text-decoration-none" href="{{route('site.blog.detail', ['slug' => $post_item->slug])}}">
                <h5 class="card-title">{{$post_item->title}}</h5>
            </a>
            <p class="card-text">
                <small class="text-muted">Cập nhật {{$post_item->created_at}}</small>
            </p>
        </div>
    </div>
</div>