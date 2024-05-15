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
               <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:arshiyatechnology@gmail.com">arshiyatechnology@gmail.com</a></i>
               <i class="bi bi-phone d-flex align-items-center ms-4"><span>+88 01632652745</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
               <!-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> -->
               <a href="https://www.facebook.com/ArshiyaTechnology"  target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
               <!-- <a href="#" class="instagram"><i class="bi bi-instagram"></i></a> -->
               <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> -->
            </div>
         </div>
      </section>
      <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="logo">
                    <h1><a href="index.html">
                        <img src="assets/img/logo.png">
                        </a>
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
         <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
               <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
               <div class="carousel-inner" role="listbox">
                  <!-- Slide 1 -->
                  <div class="carousel-item active" style="background-image: url(assets/img/banner1.jpeg)">
                     <div class="carousel-container">
                        <div class="carousel-content">
                           <!-- <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Arshiya Technology</span></h2>
                              <p class="animate__animated animate__fadeInUp">Arshiya Technology is best quality Printer Toner, Cartridge, ribbon Medical devices, IT Accessories like- PC, Laptop, UPS, Projector, Hardware accessories, Structured LAN design and installation, PA System, Attendance system, IP CCTV, AHD CCTV,  IT Gadget etc supplier in Bangladesh. </p>
                              -->
                        </div>
                     </div>
                  </div>
                  <!-- Slide 2 -->
                  <!-- <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
                     <div class="carousel-container">
                       <div class="carousel-content">
                         <h2 class="animate__animated fanimate__adeInDown">Lorem <span>Ipsum Dolor</span></h2>
                         <p class="animate__animated animate__fadeInUp"></p>
                         <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                       </div>
                     </div>
                     </div> -->
                  <!-- Slide 3 -->
                  <!-- <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
                     <div class="carousel-container">
                       <div class="carousel-content">
                         <h2 class="animate__animated animate__fadeInDown">Sequi ea <span>Dime Lara</span></h2>
                         <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                         <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                       </div>
                     </div>
                     </div> -->
               </div>
               <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
               <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
               </a>
               <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
               <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
               </a>
            </div>
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
                        <p>“The Click of Confidence”</p>
                        <p>Customer reliability is our main assets. We want make our Customer happy with confidence. </p>
                     </div>
                  </div>
                  <div class="col-lg-6 mt-4 mt-lg-0">
                     <div class="icon-box">
                        <i class="bi bi-bar-chart"></i>
                        <h3>Mission</h3>
                        <p>To achieve customer satisfaction, confidence by providing premium quality products and professional service on time in the most cost effective and environment friendly manner. </p>
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
                     <img src="assets/img/about.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-6 pt-4 pt-lg-0 content">
                     <h3>About Us</h3>
                     <p class="text-justify" style="text-align: justify;">
                        Arshiya Technology is best quality Printer Toner, Cartridge, ribbon Medical devices, IT Accessories like- PC, Laptop, UPS, Projector, Hardware accessories, Structured LAN design and installation, PA System, Attendance system, IP CCTV, AHD CCTV,  IT Gadget etc supplier in Bangladesh. We started our journey  in the year 2020 with a narrow setup. With the course of time we are now able to handle all biggest clients.
                     </p>
                     <p class="text-justify" style="text-align: justify;">
                        <b>Engr. Md. Anisuzzaman Tarafder,</b> Proprietor of this company is a versatile and highly experienced person in IT Field and he has 16 years working experience in several Pharmaceuticals Company as well as Group of company in Bangladesh as Head of IT.
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
                     <div class="swiper-slide">
                        <div class="card" style="border: 1px solid #70ced9;">
                           <img src="assets/img/20230426094625a3599ddd7c7019fc-500x500-c.webp" class="img-thumbnail card-img-top p-0 rounded-1 border-0">
                           <div class="card-body" style="height: 203px; ">
                              <a href="#">CF258A CF258X CF259A CF259X 76X</a>
                              <hr/>
                              <label>Model: AHP-CF259A</label>
                              <label>Brand: ASTA / ODM</label>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="card" style="border: 1px solid #70ced9;">
                           <img src="assets/img/product-2.webp" class="img-thumbnail card-img-top p-0 rounded-1 border-0">
                           <div class="card-body" style="height: 203px;">
                              <a href="#">CF410A CF411A CF412A CF413A 410A</a>
                              <hr/>
                              <label>Model: AHP-CF410A CF411A CF412A CF413A 410A</label>
                              <label>Brand: ASTA / ODM</label>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="card" style="border: 1px solid #70ced9;">
                           <img src="assets/img/product.webp" class="img-thumbnail card-img-top p-0 rounded-1 border-0">
                           <div class="card-body" style="height: 203px;" >
                              <a href="#">W1105A W1106A W1107A 105A 106A 107A</a>
                              <hr/>
                              <label>Model: AHP-W1105A</label>
                              <label>Brand: ASTA / ODM</label>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="card" style="border: 1px solid #70ced9;">
                           <img src="assets/img/product.webp" class="img-thumbnail card-img-top p-0 rounded-1 border-0">
                           <div class="card-body" style="height: 203px; ">
                              <a href="#">Universal-CE505A 05A CF280A 80A CRG-319</a>
                              <hr/>
                              <label>Model: AHP-CE505AU</label>
                              <label>Brand: ASTA / ODM</label>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="card" style="border: 1px solid #70ced9;">
                           <img src="assets/img/product.webp" class="img-thumbnail card-img-top p-0 rounded-1 border-0">
                           <div class="card-body" style="height: 203px; ">
                              <a href="#">TN-2410 TN-2420 DR-2425</a>
                              <hr/>
                              <label>Model: TN-2410 TN-2420</label>
                              <label>Brand: ASTA / ODM</label>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="card" style="border: 1px solid #70ced9;">
                           <img src="assets/img/product.webp" class="img-thumbnail card-img-top p-0 rounded-1 border-0">
                           <div class="card-body" style="height: 203px; ">
                              <a href="#">CF217A 17A</a>
                              <hr/>
                              <label>Model: AHP-CF21</label>
                              <label>Brand: ASTA / ODM</label>
                           </div>
                        </div>
                     </div>
                     <div class="swiper-slide">
                        <div class="card" style="border: 1px solid #70ced9;">
                           <img src="assets/img/product.webp" class="img-thumbnail card-img-top p-0 rounded-1 border-0">
                           <div class="card-body" style="height: 203px; ">
                              <a href="#">CF226A 26A</a>
                              <hr/>
                              <label>Model: AHP-CF226A</label>
                              <label>Brand: ASTA / ODM</label>
                           </div>
                        </div>
                     </div>
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
                        <ul>
                           <li>	Toner, Cartridge, Ribbon Supplies.</li>
                           <li>	CCTV Solution </li>
                           <li>	PA System </li>
                           <li>	PC Servicing. </li>
                           <li>	Total IT Support. </li>
                           <li>	Structured LAN </li>
                           <li>	IT Consultancy </li>
                           <li>	Medical Devices Supply </li>
                           <li>	IT Accessories Supply </li>
                           <li>	Laptop, Desktop, Projector etc Supply </li>
                           <li>	Software Development. </li>
                           <li>	Web Development </li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                     <div>
                        <h3 style="font-weight: bold;">Facilities</h3>
                        <ul>
                           <li>	Ensure quality product supply </li>
                           <li>	Better service.</li>
                           <li>	Competitive Price.</li>
                           <li>	Door steps delivery.</li>
                           <li>	Warranty & Guaranty.</li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-12">
                     <div>
                        <h3 style="font-weight: bold;">Values</h3>
                        <ul>
                           <li>	Customer's satisfaction and delight. </li>
                           <li>	Superior quality of performance.</li>
                           <li>	Concern for the environment and the community.</li>
                           <li>	Passionate about excellence.</li>
                           <li>	Fair to all.</li>
                           <li>	To provide a safe workplace and promote healthy work habits</li>
                        </ul>
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
                     <div class="swiper-slide"><img src="assets/img/clients/acme.webp" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/apex.png" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/astra.jpeg" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/central.jpeg" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/eastwes.png" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/eskayef.png" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/generel.png" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/isphani.jpeg" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/jayson.jpeg" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/kisarganj.jpg" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/Mymensingh.jpeg" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/navana.png" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/paragon.jpeg" class="img-fluid" alt=""></div>
                     <div class="swiper-slide"><img src="assets/img/clients/rakhen.png" class="img-fluid" alt=""></div>
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
                        2/1/A, Golden Street, <br>
                        Ring road, Shymoli, Dhaka-1207.<br>
                        <br>
                        <strong>Phone:</strong> +88 01632652745,<br/>
                        +88 01886664949, <br>
                        +88 09677 333777
                        <br>
                        <strong>Email:</strong> arshiyatechnology@gmail.com<br>
                     </p>
                  </div>
                  <div class="col-lg-3 col-md-6 footer-info">
                     <h3>About Arshiya</h3>
                     <p style="text-align: justify;">Arshiya Technology is best quality Printer Toner, Cartridge, ribbon Medical devices, IT Accessories like- PC, Laptop, UPS, Projector, Hardware accessories, Structured LAN design and installation, PA System, Attendance system, IP CCTV, AHD CCTV,  IT Gadget etc supplier in Bangladesh.</p>
                     <div class="social-links mt-3">
                        <a href="https://www.facebook.com/ArshiyaTechnology" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
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
               slidesPerView: 6,
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
   </body>
</html>
