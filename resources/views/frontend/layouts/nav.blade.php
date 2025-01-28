<div class="header-top">
    <div class="container">
        <div class="header-left">
            <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
        </div><!-- End .header-left -->

        <div class="header-right">
          social icon
        </div><!-- End .header-right -->
    </div><!-- End .container -->
</div><!-- End .header-top -->

<div class="header-middle">
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-lg-3 col-xl-3 col-xxl-2">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                <a href="index.html" class="logo">
                    <img src="{{ asset('frontend') }}/assets/images/demos/demo-14/logo.png" alt="Molla Logo" width="105" height="25">
                </a>
            </div><!-- End .col-xl-3 col-xxl-2 -->

            <div class="col col-lg-9 col-xl-9 col-xxl-10 header-middle-right">
                <div class="row">
                    <div class="col-lg-8 col-xxl-4-5col d-none d-lg-block">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>

                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div><!-- End .col-xxl-4-5col -->

                    <div class="col-lg-4 col-xxl-5col d-flex justify-content-end align-items-center">
                        <div class="header-dropdown-link">
                          
                            <a href="wishlist.html" class="wishlist-link">
                                <i class="icon-heart-o"></i>
                                <span class="wishlist-count">3</span>
                                <span class="wishlist-txt">Wishlist</span>
                            </a>

                            <div class="dropdown cart-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">2</span>
                                    <span class="cart-txt">Cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header-bottom sticky-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-lg-3 col-xl-3 col-xxl-2 header-left">
                <div class="dropdown category-dropdown show is-on" data-visible="true">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                        Browse Categories
                    </a>
                    <div class="dropdown-menu show">
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                <li class="megamenu-container">
                                    <a class="sf-with-ul" href="#"><i class="icon-laptop"></i>Electronics</a>

                                    <div class="megamenu">
                                        <div class="row no-gutters">
                                            <div class="col-md-8">
                                                <div class="menu-col">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="menu-title">Laptops & Computers</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">Desktop Computers</a></li>
                                                                <li><a href="#">Monitors</a></li>
                                                                <li><a href="#">Laptops</a></li>
                                                                <li><a href="#">iPad & Tablets</a></li>
                                                                <li><a href="#">Hard Drives & Storage</a></li>
                                                                <li><a href="#">Printers & Supplies</a></li>
                                                                <li><a href="#">Computer Accessories</a></li>
                                                            </ul>

                                                            <div class="menu-title">TV & Video</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">TVs</a></li>
                                                                <li><a href="#">Home Audio Speakers</a></li>
                                                                <li><a href="#">Projectors</a></li>
                                                                <li><a href="#">Media Streaming Devices</a></li>
                                                            </ul>
                                                        </div><!-- End .col-md-6 -->

                                                        <div class="col-md-6">
                                                            <div class="menu-title">Cell Phones</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">Carrier Phones</a></li>
                                                                <li><a href="#">Unlocked Phones</a></li>
                                                                <li><a href="#">Phone & Cellphone Cases</a></li>
                                                                <li><a href="#">Cellphone Chargers </a></li>
                                                            </ul>

                                                            <div class="menu-title">Digital Cameras</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="#">Digital SLR Cameras</a></li>
                                                                <li><a href="#">Sports & Action Cameras</a></li>
                                                                <li><a href="#">Camcorders</a></li>
                                                                <li><a href="#">Camera Lenses</a></li>
                                                                <li><a href="#">Photo Printer</a></li>
                                                                <li><a href="#">Digital Memory Cards</a></li>
                                                                <li><a href="#">Camera Bags, Backpacks & Cases</a></li>
                                                            </ul>
                                                        </div><!-- End .col-md-6 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-8 -->

                                            <div class="col-md-4">
                                                <div class="banner banner-overlay">
                                                    <a href="category.html" class="banner banner-menu">
                                                        <img src="{{ asset('frontend') }}/assets/images/demos/demo-13/menu/banner-1.jpg" alt="Banner">
                                                    </a>
                                                </div><!-- End .banner banner-overlay -->
                                            </div><!-- End .col-md-4 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu -->
                                </li>

                                <li><a href="#"><i class="icon-blender"></i>Home Appliances</a></li>
                                <li><a href="#"><i class="icon-heartbeat"></i>Healthy & Beauty</a></li>
                                <li><a href="#"><i class="icon-shoe-prints"></i>Shoes & Boots</a></li>
                                <li><a href="#"><i class="icon-map-signs"></i>Travel & Outdoor</a></li>
                                <li><a href="#"><i class="icon-mobile-alt"></i>Smart Phones</a></li>
                                <li><a href="#"><i class="icon-tv"></i>TV & Audio</a></li>
                                <li><a href="#"><i class="icon-shopping-bag"></i>Backpack & Bag</a></li>
                                <li><a href="#"><i class="icon-music"></i>Musical Instruments</a></li>
                                <li><a href="#"><i class="icon-gift"></i>Gift Ideas</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6 col-xl-6 col-xxl-8 header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li>
                            <a href="#" class="sf-with-ul">Pages</a>

                            <ul>
                                <li>
                                    <a href="about.html" class="sf-with-ul">About</a>

                                    <ul>
                                        <li><a href="about.html">About 01</a></li>
                                        <li><a href="about-2.html">About 02</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.html" class="sf-with-ul">Contact</a>

                                    <ul>
                                        <li><a href="contact.html">Contact 01</a></li>
                                        <li><a href="contact-2.html">Contact 02</a></li>
                                    </ul>
                                </li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="faq.html">FAQs</a></li>
                                <li><a href="404.html">Error 404</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col col-lg-3 col-xl-3 col-xxl-2 header-right">
                <i class="la la-lightbulb-o"></i><p>Clearance Up to 30% Off</span></p>
            </div>
        </div>
    </div>
</div>
