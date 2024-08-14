<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layouts.header')
</head>
<style>
    .btn_cls{
        padding: 2px;
        border-bottom: none;
        font-size: 16px;
        font-weight: 600;
    }
    .accordion-button:not(.collapsed){
        background-color: white !important;
        box-shadow: none !important;
    }
    .sub_cat{
        padding: 15px;
        font-size: 14px;
        color: black;
    }
    .accordion-body{
        padding: 0px !important;
    }
</style>
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
                    <a href="/"> <img src="{{ siteSetting()->logo }}"></a>
                </h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="active" href="">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="{{ route('shop.index')}}" target="_blank">Shop Now</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#client">Clients</a></li>
                    <li><a href="{{ route('cart.index')}}"><i class="bi bi-basket" style="font-size: 25px"></i><sup class="text-info" style="font-size: 15px"><span id="total_product">0</span></sup></a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
  <!-- End Header -->
    <main id="main" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 py-3">
                    <div class="card" style="border: 1px solid #70ced9">
                        <div class="border-bottom p-2">
                            <h5 class="font-weight-bolder"> Product Category</h5>
                        </div>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach (Category() as $i=>$mainCategory)
                                <div class="accordion-item p-2">
                                    <h2 class="accordion-header" id="heading{{$i}}">
                                        <button class="accordion-button collapsed shadow-none btn_cls" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$i}}"  aria-expanded="false"  aria-controls="collapse{{$i}}">
                                            {{ $mainCategory->category_name }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{$i}}" class="accordion-collapse collapse" aria-labelledby="heading{{$i}}" data-bs-parent="#accordionExample">
                                        @foreach ($mainCategory->childCategories as $childCategory)
                                            <div class="accordion-body">
                                                <a href="#" class="sub_cat">{{ $childCategory->category_name }}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>

                <div class="row col-md-9 col-sm-12 py-3">
                    <div class="col-lg-4 col-6">
                        <div class="card rounded-1" style="border: 1px solid #70ced9">
                            <a href="" class="card-body">
                                <img src="{{ asset('uploads/product/57621162.webp') }}" class="card-img-top rounded-1" alt="...">
                                <div class="card-title">Product 1</div>
                                <div class="card-text">$20.00</div>

                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>

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
    @include('frontend.layouts.script')
</body>
</html>
