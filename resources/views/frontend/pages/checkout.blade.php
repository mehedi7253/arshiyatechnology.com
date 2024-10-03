<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Check out</title>
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
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
           <div class="contact-info d-flex align-items-center">
              <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{ siteSetting()->email }}">{{ siteSetting()->email }}</a></i>
              <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ siteSetting()->phone }}</span></i>
           </div>
           <div class="social-links d-none d-md-flex align-items-center">
              <a href="{{ siteSetting()->twitter ?? '' }}" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="{{ siteSetting()->facebook ?? '' }}"  target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="{{ siteSetting()->linkedin ?? '' }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
           </div>
        </div>
     </section>
     <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <h1>
                    <a href="/"> <img src="{{ siteSetting()->logo }}"></a>
                </h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="active" href="/">Home</a></li>
                    <li><a href="/">About Us</a></li>
                    <li><a href="/">Shop Now</a></li>
                    <li><a href="/">Services</a></li>
                    <li><a href="/">Clients</a></li>
                    <li><a href="{{ route('cart.index')}}"><i class="bi bi-basket" style="font-size: 25px"></i><sup class="text-info" style="font-size: 15px"><span id="total_product">0</span></sup></a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <!-- ======= Hero Section ======= -->
    <main id="main" class="product py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto py-5">
                   <div class="card">
                        <div class="card-body">
                            <form action="{{ route('orders.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">First Name <sup class="text-danger">*</sup></label>
                                        <input type="text" name="first_name" class="form-control @error ('first_name') is-invalid @enderror" placeholder="Enter First Name" value="{{ old('first_name')}}">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Last Name <sup class="text-danger">*</sup></label>
                                        <input type="text" name="last_name" class="form-control @error ('last_name') is-invalid @enderror" placeholder="Enter last Name" value="{{ old('last_name')}}">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 pt-3">
                                        <label for="name">Email <sup class="text-danger">*</sup></label>
                                        <input type="email" name="email" class="form-control @error ('email') is-invalid @enderror" placeholder="Enter email" value="{{ old('email')}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 pt-3">
                                        <label for="name">Phone Number <sup class="text-danger">*</sup></label>
                                        <input type="text" name="phone" class="form-control @error ('phone') is-invalid @enderror" placeholder="Enter phone number" value="{{ old('phone')}}">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 pt-3">
                                        <label for="name">Address <sup class="text-danger">*</sup></label>
                                        <textarea name="address" class="form-control @error ('address') is-invalid @enderror">{{ old('address') }}</textarea>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 pt-3">
                                        <label for="name">Order Note </label>
                                        <textarea name="order_note" class="form-control @error ('order_note') is-invalid @enderror">{{ old('order_note') }}</textarea>
                                        @error('order_note')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group pt-4">
                                        <button class="btn btn-success" id="checkout" onclick="purchase()">Place Order</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </main>




    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#products">prodcuts</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#client">Clients</a></li>
                    </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Toner, Cartridge, Ribbon Supplies.</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">CCTV Solution</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">PA System</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">PC Servicing.</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Total IT Support.</a></li>
                    </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <p>
                        {{ siteSetting()->address }}
                        <br>
                        <strong>Phone:</strong> {{ siteSetting()->phone }},<br/>
                        {{ siteSetting()->additional_phone }} <br>
                        <strong>Email:</strong> {{ siteSetting()->email }}<br>
                    </p>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-info">
                    <h3>About Arshiya</h3>
                    <p style="text-align: justify;">{{ siteSetting()->meta_description }}</p>
                    <div class="social-links mt-3">
                        <a href="{{ siteSetting()->facebook ?? '' }}" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="{{ siteSetting()->twitter ?? '' }}" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="{{ siteSetting()->linkedin ?? '' }}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Arshiya Technology </span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/cart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
         @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
    </script>
    {{-- <script>
        function purchase() {
            dataLayer.push({
                event    : "purchase",
                ecommerce: {
                    value         : "{{ totalPrice() }}",
                    shipping      : "{{0.00}}",
                    currency      : "BDT",
                    items         : [@foreach ($cartData as $orderProduct){
                        item_name    : "{{$orderProduct['name']}}",
                        item_id      : "{{$orderProduct['productId']}}",
                        price        : "{{$orderProduct['price'] * $orderProduct['quantity'] }}",
                        quantity     : "{{$orderProduct['quantity']}}",
                        currency     : "BDT"
                    },@endforeach]
                }
            });
        }
        dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
        dataLayer.push({
            event    : "begin_checkout",
            ecommerce: {
                items: [@foreach ($cartData as $cart_item){
                    item_name     : "{{ $cart_item['name'] }}",
                    item_id       : "{{ $cart_item['productId'] }}",
                    price         : "{{ $cart_item['price'] * $cart_item['quantity'] }}",
                    quantity      : "{{ $cart_item['quantity'] }}",
                    currency      : "BDT"
                },@endforeach]
            }
        });
    </script> --}}
</body>
</html>
