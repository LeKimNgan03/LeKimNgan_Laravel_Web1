<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f6b8edfc6e.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        var $j = jQuery.noConflict();
    </script>
    @yield('header')
</head>

<body>
    <!-- Header -->
    <header style="background-color: #829460;">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="{{ route('site.home') }}">
                <img style="width: 120px;" src="./assets/img/logo.png" alt="Logo">
            </a>

            <!-- Search Bar -->
            <!-- <div class="input-group d-flex justify-content-center w-50">
                <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Tìm kiếm" aria-describedby="button-addon2">
                <button class="btn btn-light" type="button" id="button-addon2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div> -->

            <!--  -->
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <form action="{{ route('site.product.search') }}" class="col-12 col-lg-auto mb-3 mb-lg-0 " method="GET">
                    <input type="text" name="query" class="form-control form-control-dark text-bg-white" placeholder="Tìm kiếm" aria-label="Search">
                </form>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('site.cart.index')}}">
                            <i class="fa-solid fa-cart-shopping" aria-hidden="true">
                                @php
                                $count = count(session('carts', []));
                                @endphp
                                <span id="showqty" class="position-absolute translate-middle">
                                    ({{$count}})
                                </span>
                            </i>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('website.getlogin')}}"><i class="fa-solid fa-user"></i></a>
                    </li> -->

                    @if(Auth::check())
                    @php
                    $user = Auth::user();
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('website.logout')}}">
                            {{$user->name}} <i class='fa-solid fa-right-from-bracket'></i>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('website.getlogin')}}">
                            <i class="fa-solid fa-user"></i>
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Menu -->
    <!-- Slider -->

    <main>
        @yield('content')
        <!-- Product Category -->
        <!-- Product New -->
        <!-- Product Sale -->
        <!-- Post New -->
    </main>

    <!-- Footer -->
    <div class="mt-5" style="background-color: #829460;">
        <footer class="py-5 px-5">
            <div class="row">
                <x-footer-menu />

                <div class="col-6 col-md-2 mb-3">
                    <h5 class="text-white">Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5 class="text-white">Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">About</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5 class="text-white">Subscribe to our newsletter</h5>
                        <p class="text-white">Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden text-white">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-light" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p class="text-white">&copy; 2024 Company, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#twitter" />
                            </svg></a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#instagram" />
                            </svg></a></li>
                    <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#facebook" />
                            </svg></a></li>
                </ul>
            </div>
        </footer>
    </div>

    <!-- Các phần còn lại của trang web -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @yield('footer')
</body>

</html>