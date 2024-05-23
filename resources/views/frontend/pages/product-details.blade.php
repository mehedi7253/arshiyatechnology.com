{{-- {{$product}} --}}
{{-- {{ $product->productImage->product_id }} --}}
{{-- @foreach ($product as $sub_image)
    @foreach ($sub_image->productImage as $sub_image2)
        {{ $sub_image2->sub_image }}
    @endforeach
@endforeach () --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product-{{ $product->product_name }}</title>
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
                    <a href="index.html"> <img src="{{ siteSetting()->logo }}"></a>
                </h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="active" href="/">Home</a></li>
                    <li><a href="/">About Us</a></li>
                    <li><a href="/">Shop Now</a></li>
                    <li><a href="/">Services</a></li>
                    <li><a href="/">Clients</a></li>
                    <li><a href="{{route('cart.item')}}"><i class="bi bi-basket" style="font-size: 25px"></i><sup class="text-info" style="font-size: 15px">{{ cartData() }}</sup></a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <!-- ======= Hero Section ======= -->
    <main id="main" class="product py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12" style="height: 347px; border: 1px solid rgba(0,40,100,.08); text-align: center">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper align-items-center">
                            @foreach ($product->productImage as $sub_image)
                                <div class="swiper-slide">
                                    <img src="{{ $sub_image->sub_image }}" alt="{{ $product->product_name }}" style="height: 300px">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 pr-5">
                    <h1 style="font-size: 20px; font-weight: bold">{{ $product->product_name}}</h1>
                    <hr/>
                    <p>{!! $product->short_description !!}</p>
                    <p>
                        <span style="font-size: 20px; font-weight: bold">Price: </span>
                        @if ($product->discount_price == false)
                            <span style="font-size: 20px; font-weight: bold; color: green">{{ number_format($product->price,2) }}</span>
                        @else
                            <span style="font-size: 20px; font-weight: bold; color: green">{{ number_format($product->discount_price,2) }}</span>
                            <del style="font-size: 20px; font-weight: bold; color: red">{{ number_format($product->price,2) }}</del>
                        @endif
                    </p>
                    <div class="py-3">
                        <div class="input-group">
                            <button class="btn btn-sm btn-info" id="minus">-</button>
                            <input type="text" class="quantity col-1 text-center" id="quantity" disabled value="1" min="1">
                            <button class="btn btn-sm  btn-info" id="plus">+</button>
                        </div>
                        <button class="btn btn-outline-info add-to-cart" data-id="{{$product->id}}">Add to cart</button>
                    </div>

                </div>
                <hr />
                <label>Product Description:</label>
                <div class="col-md-12 col-sm-12">
                    <p class="text-justify">{!! $product->long_description !!}</p>
                </div>
            </div>
        </div>
    </main>
    <section class="all_products py-4" style="background-color: whitesmoke">
        <div class="container">
        <h3>Releted Product</h3>
            <div class="swiper all_product_swiper">
                <div class="swiper-wrapper">
                  @foreach ($all_product as $product)
                      <div class="swiper-slide">
                          <div class="card" style="border: 1px solid #70ced9;">
                              <a href="{{ route('product.details', $product->slug) }}">
                                  <img src="{{ $product->image }}" class="img-thumbnail card-img-top p-0 rounded-1 border-0 p-2" style="height: 200px">
                              </a>
                              <div class="card-body">
                                  <a href="{{ route('product.details', $product->slug) }}">{{ $product->product_name }}</a>
                                  <br/>
                                  <div class="mt-2" style="text-align: center">
                                      @if ($product->discount_price == true)
                                          <span class="badge bg-danger">{{ number_format($product->price,2) }}</span>
                                          <span class="badge bg-success">{{ number_format($product->discount_price,2) }}</span>
                                      @else
                                          <span class="badge bg-success">{{ number_format($product->price,2) }}</span>
                                      @endif
                                  </div>
                                  <div class="mt-2 text-center">
                                      <button class="btn btn-primary add-to-cart" data-id="{{ $product->id }}">Add to Cart</button>
                                      <div class="quantity-controls d-none">
                                          <button class="btn btn-secondary decrement" data-id="{{ $product->id }}">-</button>
                                          <span class="quantity">1</span>
                                          <button class="btn btn-secondary increment" data-id="{{ $product->id }}">+</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>



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

        var swiper = new Swiper(".mySwiper", {
            speed: 200,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
           slidesPerView: 1,
           spaceBetween: 10,
           enterslides: true,
           grabcursor: true,
           pagination: {
             el: ".swiper-pagination",
             clickable: true,
           },
        });
        new Swiper('.all_product_swiper', {
            speed: 400,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true
            },
            breakpoints: {
                320: {
                    slidesPerView: 5,
                    spaceBetween: 10
                },
                480: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10
                },
                992: {
                    slidesPerView: 5,
                    spaceBetween: 10
                }
            }
        });

        const minusButton = document.getElementById('minus');
        const plusButton = document.getElementById('plus');
        const inputField = document.getElementById('quantity');

        minusButton.addEventListener('click', event => {
        event.preventDefault();
        const currentValue = Number(inputField.value) || 0;
            if (currentValue <= 1) {
                return;
            }else{
                inputField.value = currentValue - 1;
            }
        });

        plusButton.addEventListener('click', event => {
        event.preventDefault();
        const currentValue = Number(inputField.value) || 0;
            inputField.value = currentValue + 1;
        });

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.add-to-cart').click(function() {
                var productId = $(this).data('id');
                var quantity = inputField.value;
                var button = $(this);
                $.ajax({
                    url: '/cart',
                    method: 'POST',
                    data: { product_id: productId, quantity: quantity },
                    success: function(response) {
                        if (response.success) {
                            toastr.success("product added successfully");
                            //reload after 2 seconds
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
