@extends('frontend.layouts.app')
@section('content')
<div class="page-header text-center" style="background-image: url('{{ asset('frontend/assets/images/page-header-bg.jpg') }}')">
    <div class="container-fluid">
        <h1 class="page-title">{{ $category->category_name }}<span>Home</span></h1>
    </div><!-- End .container-fluid -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->category_name }}</li>
        </ol>
    </div><!-- End .container-fluid -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container-fluid">
        <div class="toolbox">
            <div class="toolbox-left">
                <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Category</a>
            </div><!-- End .toolbox-left -->
            <div class="toolbox-center">
                <div class="toolbox-info">
                    Showing <span> {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }}</span> Products
                </div><!-- End .toolbox-info -->
            </div><!-- End .toolbox-center -->


            <div class="toolbox-right">
                <div class="toolbox-sort">
                    <label for="sortby">Sort by:</label>
                    <div class="select-custom">
                        <form action="{{ route('page.shop-products', $category->slug) }}" method="GET">
                            <select name="sort" onchange="this.form.submit()" id="sortby" class="form-control">
                                <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Date: Newest</option>
                                <option value="old_date" {{ request('sort') == 'old_date' ? 'selected' : '' }}>Date: Old to New</option>
                                <option value="price_low_to_high" {{ request('sort') == 'price_low_to_high' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high_to_low" {{ request('sort') == 'price_high_to_low' ? 'selected' : '' }}>Price: High to Low</option>
                            </select>
                        </form>
                    </div>
                </div><!-- End .toolbox-sort -->
            </div><!-- End .toolbox-right -->
        </div><!-- End .toolbox -->

        <div class="products">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-6 col-md-4 col-lg-4 col-xl-3 col-xxl-2">
                        <div class="product text-center" style="border: 1px solid #70ced9;">
                            <figure class="product-media">
                                <a href="{{route('page.product.details', $product->slug)}}">
                                    <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}" class="product-image">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><span>add to wishlist</span></a>
                                    <a href="{{route('page.product.details', $product->slug)}}" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                </div>

                                <div class="product-action">
                                    <form action="{{route('page.add-to-cart')}}" method="POST">
                                        @csrf
                                        <input hidden name="product_id" value="{{ $product->id }}">
                                        <input hidden name="quantity" value="1">
                                        <button type="submit" class="btn-product btn-cart form-control col-12"><span>add to cart</span></button>
                                    </form>
                                    {{-- <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a> --}}
                                </div>

                            </figure>

                            <div class="product-body">
                                <h3 class="product-title"><a href="">{{ $product->name }}</a></h3>
                                @if ($product->discount_price)
                                    <div class="product-price pt-1">
                                        <span class="new-price">{{ $product->discount_price }}</span>
                                        <span class="old-price">{{ $product->regular_price }}</span>
                                    </div>
                                @else
                                    <div class="product-price">
                                        <span class="new-price">{{ $product->discount_price }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-danger">No Product Found</p>
                @endforelse
            </div><!-- End .row -->
            {{ $products->links('vendor.pagination.bootstrap-5') }}
        </div><!-- End .products -->

        <div class="sidebar-filter-overlay"></div>
        <aside class="sidebar-shop sidebar-filter">
            <div class="sidebar-filter-wrapper">
                <div class="widget widget-clean">
                    <label><i class="icon-close"></i>Filters</label>
                    <a href="#" class="sidebar-filter-clear">Clean All</a>
                </div><!-- End .widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                            Category
                        </a>
                    </h3><!-- End .widget-title -->

                    <div class="collapse show" id="widget-1">
                        <div class="widget-body">
                            <div class="filter-items filter-items-count">
                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-1">
                                        <label class="custom-control-label" for="cat-1">Dresses</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">3</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-2">
                                        <label class="custom-control-label" for="cat-2">T-shirts</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">0</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-3">
                                        <label class="custom-control-label" for="cat-3">Bags</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">4</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-4">
                                        <label class="custom-control-label" for="cat-4">Jackets</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">2</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-5">
                                        <label class="custom-control-label" for="cat-5">Shoes</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">2</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-6">
                                        <label class="custom-control-label" for="cat-6">Jumpers</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">1</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-7">
                                        <label class="custom-control-label" for="cat-7">Jeans</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">1</span>
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="cat-8">
                                        <label class="custom-control-label" for="cat-8">Sportwear</label>
                                    </div><!-- End .custom-checkbox -->
                                    <span class="item-count">0</span>
                                </div><!-- End .filter-item -->
                            </div><!-- End .filter-items -->
                        </div><!-- End .widget-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .widget -->

                <div class="widget widget-collapsible">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                            Size
                        </a>
                    </h3><!-- End .widget-title -->

                    <div class="collapse show" id="widget-2">
                        <div class="widget-body">
                            <div class="filter-items">
                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="size-1">
                                        <label class="custom-control-label" for="size-1">XS</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="size-2">
                                        <label class="custom-control-label" for="size-2">S</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked id="size-3">
                                        <label class="custom-control-label" for="size-3">M</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" checked id="size-4">
                                        <label class="custom-control-label" for="size-4">L</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="size-5">
                                        <label class="custom-control-label" for="size-5">XL</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="size-6">
                                        <label class="custom-control-label" for="size-6">XXL</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->
                            </div><!-- End .filter-items -->
                        </div><!-- End .widget-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .widget -->

                <div class="widget widget-collapsible">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                            Colour
                        </a>
                    </h3><!-- End .widget-title -->

                    <div class="collapse show" id="widget-3">
                        <div class="widget-body">
                            <div class="filter-colors">
                                <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                                <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                                <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                                <a href="#" class="selected" style="background: #cc3333;"><span class="sr-only">Color Name</span></a>
                                <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                                <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                                <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                                <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                            </div><!-- End .filter-colors -->
                        </div><!-- End .widget-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .widget -->

                <div class="widget widget-collapsible">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                            Brand
                        </a>
                    </h3><!-- End .widget-title -->

                    <div class="collapse show" id="widget-4">
                        <div class="widget-body">
                            <div class="filter-items">
                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-1">
                                        <label class="custom-control-label" for="brand-1">Next</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-2">
                                        <label class="custom-control-label" for="brand-2">River Island</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-3">
                                        <label class="custom-control-label" for="brand-3">Geox</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-4">
                                        <label class="custom-control-label" for="brand-4">New Balance</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-5">
                                        <label class="custom-control-label" for="brand-5">UGG</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-6">
                                        <label class="custom-control-label" for="brand-6">F&F</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                                <div class="filter-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="brand-7">
                                        <label class="custom-control-label" for="brand-7">Nike</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .filter-item -->

                            </div><!-- End .filter-items -->
                        </div><!-- End .widget-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .widget -->

                <div class="widget widget-collapsible">
                    <h3 class="widget-title">
                        <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                            Price
                        </a>
                    </h3><!-- End .widget-title -->

                    <div class="collapse show" id="widget-5">
                        <div class="widget-body">
                            <div class="filter-price">
                                <div class="filter-price-text">
                                    Price Range:
                                    <span id="filter-price-range"></span>
                                </div><!-- End .filter-price-text -->

                                <div id="price-slider"></div><!-- End #price-slider -->
                            </div><!-- End .filter-price -->
                        </div><!-- End .widget-body -->
                    </div><!-- End .collapse -->
                </div><!-- End .widget -->
            </div><!-- End .sidebar-filter-wrapper -->
        </aside>
    </div>
</div>
@endsection
@push('scripts')

@endpush
