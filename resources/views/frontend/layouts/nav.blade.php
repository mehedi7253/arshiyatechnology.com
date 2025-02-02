
<div class="header-top">
    <div class="container-fluid">
        <div class="header-left">
            <a href="tel:#"><i class="icon-phone"></i>Call: {{ $siteData->phone }}</a>
        </div>


        <div class="header-right">
            <div class="social-icons social-icons-color">
                <a href="{{ $siteData->facebook }}" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f" style="color: white"></i></a>
                <a href="{{ $siteData->twitter }}" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter" style="color: white"></i></a>
                <a href="{{ $siteData->linkedin }}" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin" style="color: white"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="header-middle">
    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-lg-3 col-xl-3 col-xxl-2">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>
                <a href="/" class="logo">
                    <img src="{{ $siteData->logo }}" alt="Molla Logo" width="57%" height="auto">
                </a>
            </div>

            <div class="col col-lg-9 col-xl-9 col-xxl-10 header-middle-right d-none d-lg-block">
                <div class="row">
                    <div class="col-lg-8 col-xxl-4 ">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>

                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4 col-xxl-5col d-flex justify-content-end align-items-center">
                        <div class="header-dropdown-link">
                            <div class="dropdown compare-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                    <i class="icon-user"></i>
                                    @auth
                                        <span class="compare-txt">{{ Auth::user()->name }}</span>
                                    @else
                                        <span class="compare-txt">Login/SignUp</span>
                                    @endauth
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="compare-products">
                                        @auth
                                            @if (Auth::user()->type == '1')
                                                <li class="compare-product">
                                                    <h6 class="compare-product-title"><a href="{{ route('user.dashboard') }}"><i class="icon-home"></i> Dashboard</a></h6>
                                                </li>

                                                <li class="compare-product">
                                                    <h6 class="compare-product-title"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-sign-out"></i> Logout</a></h6>
                                                </li>
                                            @else
                                                <li class="compare-product">
                                                    <h6 class="compare-product-title"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i> Dashboard</a></h6>
                                                </li>

                                                <li class="compare-product">
                                                    <h6 class="compare-product-title"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-sign-out"></i> Logout</a></h6>
                                                </li>
                                            @endif
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        @endauth
                                    </ul>
                                    @guest
                                    <ul class="compare-products">
                                        <li class="compare-product">
                                            <a href="{{ route('login') }}" class="text-capitalize">Login</a>
                                        </li>
                                        <li class="compare-product">
                                            <a href="{{ route('register') }}" class="text-capitalize">Registration</a>
                                        </li>
                                    </ul>
                                    @endguest
                                </div><!-- End .dropdown-menu -->
                            </div><!-- End .compare-dropdown -->


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

                    @if (Route::currentRouteName() == 'page.welcome')
                        <div class="dropdown-menu show">
                        @else
                        <div class="dropdown-menu">
                    @endif
                        @php
                            $categories = App\Models\Category::where('parent_id', null)->where('status', 'active')->get();
                        @endphp
                        <nav class="side-nav">
                            <ul class="menu-vertical sf-arrows">
                                @foreach ($categories as $category)
                                    @if ($category->childCategories->count() > 0)
                                        <li class="megamenu-container">
                                            <a class="sf-with-ul" href="#"><i class="icon-laptop"></i>{{ $category->category_name }} </a>
                                            <div class="megamenu">
                                                <div class="row no-gutters">
                                                    <div class="col-md-8">
                                                        <div class="menu-col">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <ul>
                                                                        @foreach ($category->childCategories as $childCategory)
                                                                            <li><a href="{{ route('page.category.product', $childCategory->slug) }}">{{ $childCategory->category_name }}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End .row -->
                                            </div>
                                        </li>
                                    @else
                                        <li><a href="#"><i class="icon-gift"></i>{{ $category->category_name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6 col-xl-6 col-xxl-8 header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        @foreach ($getMenus as $menu)
                            @if ($menu->children->count() > 0)
                                <li>
                                    <a href="#" class="sf-with-ul text-capitalize">{{ $menu->name }}</a>

                                    <ul>
                                        @foreach ($menu->children as $child)
                                        <li>
                                            <a href="{{ $child->url }}" class="text-capitalize">{{$child->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>

                                </li>
                            @else
                                <li>
                                    <a href="{{ $menu->url }}" class="text-capitalize">{{ $menu->name }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col col-lg-3 col-xl-3 col-xxl-2 header-right">
                <nav class="main-nav">
                  <a href="" class="btn btn-info" style="height: 4rem; border-radius: 10rem">Special Offer</a>
                </nav>
            </div>
        </div>
    </div>
</div>
