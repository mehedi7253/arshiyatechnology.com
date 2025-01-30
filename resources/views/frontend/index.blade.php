@extends('frontend.layouts.app')
@section('content')
<div class="mb-lg-2"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 col-xxl-8 offset-lg-3 offset-xxl-2">
            <div class="intro-slider-container slider-container-ratio mb-2">
                <div class="intro-slider owl-carousel owl-simple owl-nav-inside" id="slider">
                    @forelse ($banners as $banner)
                        <div class="intro-slide">
                            <figure class="slide-image">
                                <picture>
                                    <source media="(max-width: 300px)" srcset="{{ $banner->banner_image }}">
                                    <img src="{{ $banner->banner_image }}" alt="Image Desc"  style="height: 300px">
                                </picture>
                            </figure>
                        </div>
                    @empty
                        <p>No Banner</p>
                    @endforelse
                </div>
                <span class="slider-loader"></span>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="section-title">
                <h2 class="section-title-heading mt-4">Our Clients</h2>
            </div>
            <div class="owl-carousel owl-simple" id="clients" style="border: 0.3px solid #70ced9; border-radius: 3px; ">
                @forelse ($clients as $client)
                    <a href="{{ $client->url }}" target="_blank" class="brand">
                        <img src="{{ $client->client_logo }}" alt="Our Client" style="height: auto; width: 87px; margin-top: 6rem; margin-bottom: 6rem">
                    </a>
                @empty
                    <p class="text-danger">Not Clients found</p>
                @endforelse
                {{-- <div class="owl-dots"></div> --}}
            </div>
        </div>
    </div>
</div>


<div class="container-fluid bg-light">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="section-title text-center">
                <h2 class="section-title-heading mt-4">Offer Product</h2>
                <hr/>
            </div>
            <div class="owl-carousel owl-simple" id="products" style="border: 0.3px solid #70ced9; border-radius: 3px; padding: 1rem">
                @forelse ($products as $product)
                <div class="product text-center" style="border: 1px solid #70ced9;">
                    <figure class="product-media">
                        <a href="product.html">
                            <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}" class="product-image">
                        </a>
                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><span>add to wishlist</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <div class="product-action">
                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
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
                @empty
                    <p>No Product Found</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 mb-4">
            <div class="section-title text-center">
                <h2 class="section-title-heading mt-4">Get Everything Here</h2>
                <hr/>
            </div>
            <div class="row">
                <div id="product-container" class="row">
                    @include('frontend.pages.load-more', ['allProducts' => $allProducts])
                </div>
                <div class="mx-auto col-md-12">
                    <div class="col-md-12" style="text-align: center">
                        <button class="mt-3 btn btn-secondary btn-sm load-more-data">
                            <i class="mdi mdi-vanish"></i>
                            Load More...
                        </button>
                        <button class="mt-3 btn btn-secondary btn-sm auto-load" style="display: none;">
                            <i class="mdi mdi-vanish mdi-spin"></i>
                            Loading...
                        </button>
                        <span class="no-more-product" style="display: none;">No More Product Found!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#slider').owlCarousel({
                loop: false,
                items : 1,
                autoplay: false,
                autoplayTimeout: 3000,
            });
            $('#clients').owlCarousel({
                nav: true,
                dots: true,
                margin: 10,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                responsive: {
                    1920: {
                        items: 7
                    },
                    1028: {
                        items: 7
                    },
                    600: {
                        items: 3
                    },
                    320: {
                        items: 2
                    }
                }
            });
            $('#products').owlCarousel({
                nav: true,
                dots: true,
                margin: 10,
                loop: false,
                autoplay: false,
                autoplayTimeout: 3000,
                responsive: {
                    1920: {
                        items: 5
                    },
                    1028: {
                        items: 5
                    },
                    600: {
                        items: 3
                    },
                    320: {
                        items: 3
                    }
                }
            });
        });


        var url = "{{ route('page.all-product') }}";
        var page = 1;

        $(".load-more-data").click(function() {
            page++;
            infinteLoadMore(page);
        });
        function infinteLoadMore(page) {
            $.ajax({
                    url: url + "?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function() {
                        $('.load-more-data').hide();
                        $('.auto-load').show();
                    }
                })
                .done(function(response) {
                    if (response.html == '') {
                        $('.load-more-data').hide();
                        $('.auto-load').hide();
                        $('.no-more-product').show();
                        return true;
                    }
                    $('.auto-load').hide();
                    $('.load-more-data').show();
                    $("#product-container").append(response.html);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
            });
        }

    </script>
@endpush
