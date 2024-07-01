<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart</title>
    <meta content="{{ siteSetting()->meta_description }}" name="description">
    <meta content="{{ siteSetting()->keywords }}" name="keywords">
    <!-- Favicons -->
    <link href="{{ siteSetting()->favicon }}" rel="icon">
    <link href="{{ siteSetting()->logo }}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @include('frontend.layouts.tag')
</head>
<body>
    <h3 id="total_product">cart item: </h3>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <div class="card col-3 p-3 m-2">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="Product Image" style="height: 200px">
                        <div class="card-body">
                            <h3>{{ $product->product_name }}</h3>
                            <p>{{ $product->discount_price }} {{ $product->price }}</p>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input name="quantity" value="1">

                            <button class="add-to-cart" type="submit">Add to Cart</button>
                            {{-- <div class="quantity-controls" style="display: none;">
                                <button class="minus">-</button>
                                <span class="quantity">0</span>
                                <button class="plus">+</button>
                            </div>
                            <button class="remove-from-cart">Remove</button> --}}
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</body>
</html>
