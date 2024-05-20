<!DOCTYPE html>
<html lang="en">
   <head>
     @include('frontend.layouts.header')
   </head>
   <body>
      <!-- ======= Top Bar ======= -->
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
                        <li><a class="active" href="#">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#products">Products</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#client">Clients</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
            </div>
        </header>
      <!-- End Header -->
      <!-- ======= Hero Section ======= -->
      <section id="hero">
        <div id="carouselExampleIndicators" class="header-slider carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              @foreach($banners as $key => $slider)
                  <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                    <img src="{{ $slider->banner_image }}" class="d-block w-100" alt="" height="300px">
                  </div>
              @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      </section>
      <!-- End Hero -->
      <main id="main">
         <!-- ======= Featured Section ======= -->
         <section id="featured" class="featured">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="icon-box">
                        <i class="bi bi-card-checklist"></i>
                        <h3>Vission</h3>
                        <p>
                            {!! $mission_vision->vision !!}
                        </p>
                     </div>
                  </div>
                  <div class="col-lg-6 mt-4 mt-lg-0">
                     <div class="icon-box">
                        <i class="bi bi-bar-chart"></i>
                        <h3>Mission</h3>
                        <p>{!! $mission_vision->mission !!}</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- End Featured Section -->
         <!-- ======= About Section ======= -->
         <section id="about" class="about">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6">
                     <img src="{{ $about_us->image }}" class="img-fluid" alt="About us" height="500px" width="auto">
                  </div>
                  <div class="col-lg-6 pt-4 pt-lg-0 content">
                     <h3>{{ $about_us->title }}</h3>
                     <p class="text-justify" style="text-align: justify;">
                        {!! $about_us->description!!}
                     </p>
                  </div>
               </div>
            </div>
         </section>
         <!-- End About Section -->
         <!-- ======= Services Section ======= -->
         <section id="products" class="services">
            <div class="container">
               <div class="section-title">
                  <h2>Our porducts</h2>
               </div>
               <div class="swiper mySwiper">
                  <div class="swiper-wrapper">
                    @foreach ($products as $product)
                        <div class="swiper-slide">
                            <div class="card" style="border: 1px solid #70ced9;">
                                <a href="{{ $product->slug }}">
                                    <img src="{{ $product->image }}" class="img-thumbnail card-img-top p-0 rounded-1 border-0" style="height: 200px">
                                </a>
                                <div class="card-body">
                                    <a href="{{ $product->slug }}">{{ $product->product_name }}</a>
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
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary quantity-decrease" data-id="{{ $product->id }}" type="button">-</button>
                                            </div>
                                            <input type="number" id="quantity_{{ $product->id }}" class="form-control text-center" value="1" min="1">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary quantity-increase" data-id="{{ $product->id }}" type="button">+</button>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary add-to-cart" data-id="{{ $product->id }}">Add to Cart</button>
                                        {{-- <button class="btn btn-info btn-sm mt-2">Add To Cart</button> --}}
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
         <!-- End Services Section -->
         <section id="services" class="services">
            <div class="container">
               <div class="section-title">
                  <h2>Services, Facilities & Values </h2>
               </div>
               <div class="row">
                  <div class="col-md-4 col-sm-12">
                     <div>
                        <h3 style="font-weight: bold;">Services</h3>
                        <p>
                            {!! $sfv->services !!}
                        </p>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                     <div>
                        <h3 style="font-weight: bold;">Facilities</h3>
                        <p>
                            {!! $sfv->facilities !!}
                        </p>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                     <div>
                        <h3 style="font-weight: bold;">Values</h3>
                        <p>
                            {!! $sfv->values !!}
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- ======= Clients Section ======= -->
         <section id="client" class="clients">
            <div class="container">
               <div class="section-title">
                  <h2>Our Clients</h2>
               </div>
               <div class="clients-slider swiper">
                  <div class="swiper-wrapper align-items-center">
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/acme.webp')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/apex.png')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/astra.jpeg')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/central.jpeg')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/eastwes.png')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/eskayef.png')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/generel.png')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/isphani.jpeg')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/jayson.jpeg')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/kisarganj.jpg')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/Mymensingh.jpeg')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/navana.png')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/paragon.jpeg')}}" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="{{ asset('uploads/clients/rakhen.png')}}" class="img-fluid" alt=""></div>
                  </div>
                  <div class="swiper-pagination"></div>
               </div>
            </div>
         </section>
         <!-- End Clients Section -->
      </main>
      <!-- End #main -->
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
      <!-- Vendor JS Files -->
      <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
      <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <!-- Template Main JS File -->
      <script src="assets/js/main.js"></script>
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
      <script>
         var swiper = new Swiper(".mySwiper", {
           slidesPerView: 4,
           spaceBetween: 10,
           enterslides: true,
           grabcursor: true,
           loop: true,
           breakpoints: {
               1920: {
               slidesPerView: 5,
               spaceBetween: 15
               },
               1028: {
               slidesPerView: 5,
               spaceBetween: 15
               },
               320: {
               slidesPerView: 2,
               spaceBetween: 10
               }
             },
           pagination: {
             el: ".swiper-pagination",
             clickable: true,
           },
         });

      </script>
      <script>
        $(document).ready(function() {
            $(".quantity-increase").click(function() {
                var id = $(this).data("id");
                var quantity = parseInt($("#quantity_" + id).val());
                $("#quantity_" + id).val(quantity + 1);
            });

            $(".quantity-decrease").click(function() {
                var id = $(this).data("id");
                var quantity = parseInt($("#quantity_" + id).val());
                if (quantity > 1) {
                    $("#quantity_" + id).val(quantity - 1);
                }
            });

            $(".add-to-cart").click(function(e) {
                e.preventDefault();

                var id = $(this).data("id");
                var quantity = $("#quantity_" + id).val();

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: id,
                        quantity: quantity
                    },
                    success: function(response) {
                        alert(response.success);
                    }
                });
            });
        });
        </script>
   </body>
</html>
