<div class="container mt-5">
    <h2 class="text-center">Bài viết</h2>
    <div class="row">
        @foreach ($list_post as $rowpost)
        <x-post-item :rowpost="$rowpost" />
        @endforeach
    </div>
    <div class="text-center">
        <button class="btn btn-light" type="button">
            <a href="{{ route('site.blog') }}" class="text-dark text-decoration-none">
                Xem thêm
            </a>
        </button>
    </div>
</div>