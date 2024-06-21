<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #90A17D;">
    <div class="container justify-content-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="collapse navbar-collapse" id="navbarNavDropdown"> -->
        <ul class="nav navbar-nav">
            <!-- <li class="nav-item">
                <a class="nav-link text-white" href="#">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Danh mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Thương hiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Bài viết</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Liên hệ</a>
            </li> -->
            @foreach ($listmenu as $rowmenu)
            <x-main-menu-item :rowmenu="$rowmenu" />
            @endforeach
        </ul>
        <!-- </div> -->
    </div>
</nav>