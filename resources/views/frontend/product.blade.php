<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <script src="https://kit.fontawesome.com/f6b8edfc6e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-light">
            <a class="navbar-brand" href="#">
                <img style="width: 150px;" src="./assets/img/logo.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="san-pham">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="bai-viet">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="lien-he">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- Search Bar -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#"><i class="fa-solid fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="text-center">Products</h2>
        <div class="row">
            <div class="form-group">
                <label for="sort-by">Sort By:</label>
                <select class="form-control" id="sort-by">
                    <option value="name">Name</option>
                    <option value="price">Price</option>
                    <option value="rating">Rating</option>
                </select>
            </div>
            <div class="d-flex flex-wrap align-items-center">
                <div class="col-md-3 card mb-3">
                    <img class="card-img-top" src="./assets/img/perfume-1.png" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title text-center">Product 1</h5>
                        <p class="card-text text-danger">$99.99</p>
                        <a href="chi-tiet-san-pham" class="btn btn-light">Details</a>
                    </div>
                </div>
                <div class="col-md-3 card mb-3">
                    <img class="card-img-top" src="./assets/img/perfume-2.png" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title text-center">Product 2</h5>
                        <p class="card-text text-danger">$99.99</p>
                        <a href="chi-tiet-san-pham" class="btn btn-light">Details</a>
                    </div>
                </div>
                <div class="col-md-3 card mb-3">
                    <img class="card-img-top" src="./assets/img/perfume-3.png" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title text-center">Product 3</h5>
                        <p class="card-text text-danger">$99.99</p>
                        <a href="chi-tiet-san-pham" class="btn btn-light">Details</a>
                    </div>
                </div>
                <div class="col-md-3 card mb-3">
                    <img class="card-img-top" src="./assets/img/perfume-4.png" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title text-center">Product 4</h5>
                        <p class="card-text text-danger">$99.99</p>
                        <a href="chi-tiet-san-pham" class="btn btn-light">Details</a>
                    </div>
                </div>
                <div class="col-md-3 card mb-3">
                    <img class="card-img-top" src="./assets/img/perfume-5.png" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title text-center">Product 5</h5>
                        <p class="card-text text-danger">$99.99</p>
                        <a href="chi-tiet-san-pham" class="btn btn-light">Details</a>
                    </div>
                </div>
                <div class="col-md-3 card mb-3">
                    <img class="card-img-top" src="./assets/img/perfume-6.png" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title text-center">Product 6</h5>
                        <p class="card-text text-danger">$99.99</p>
                        <a href="chi-tiet-san-pham" class="btn btn-light">Details</a>
                    </div>
                </div>
                <div class="col-md-3 card mb-3">
                    <img class="card-img-top" src="./assets/img/perfume-7.png" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title text-center">Product 7</h5>
                        <p class="card-text text-danger">$99.99</p>
                        <a href="chi-tiet-san-pham" class="btn btn-light">Details</a>
                    </div>
                </div>
                <div class="col-md-3 card mb-3">
                    <img class="card-img-top" src="./assets/img/perfume-8.png" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title text-center">Product 8</h5>
                        <p class="card-text text-danger">$99.99</p>
                        <a href="chi-tiet-san-pham" class="btn btn-light">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-light mt-5">
        <footer class="py-5 px-5">
            <div class="row">
                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">About</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-2 mb-3">
                    <h5>Section</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-dark">About</a></li>
                    </ul>
                </div>

                <div class="col-md-5 offset-md-1 mb-3">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                <p>&copy; 2024 Company, Inc. All rights reserved.</p>
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
</body>

</html>