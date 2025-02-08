@extends('frontend.layouts.app')
@section('title', $product->name)
@section('meta_title', $product->name)
@section('meta_description', substr(strip_tags($product->description), 0, 200) . '...')
@section('meta_keywords', $product->tags)
@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container d-flex align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="product-details-top mb-2">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="product-gallery">
                        <figure class="product-main-image">
                            <img id="product-zoom" src="{{ asset($product->thumbnail) }}" data-zoom-image="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" style="height: auto; width: 100%;">
                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                <i class="icon-arrows"></i>
                            </a>
                        </figure>
                        <div id="product-zoom-gallery" class="product-image-gallery">
                            @foreach (json_decode($product->gallery) as $gallery)
                                <a class="product-gallery-item" href="#" data-image="{{  asset($gallery) }}" data-zoom-image="{{  asset($gallery) }}">
                                    <img src="{{  asset($gallery) }}" alt="{{ $product->name }}">
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="product-details">
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <div class="product-price">
                            {{ $product->regular_price }}
                        </div>

                        <div class="product-content">
                            <p class="text-justify">
                                {{-- 300 length --}}
                               {{ substr(strip_tags($product->description), 0, 400)}}
                            </p>
                        </div>

                        <form action="{{route('page.add-to-cart')}}" method="POST">
                            @csrf
                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" id="qty" name="quantity" class="form-control" value="1" min="1" step="1" data-decimals="0" required>
                                </div>
                                <button type="submit" class="btn-product btn-cart col-md-4" style="margin-left: 10px"><span>add to cart</span></button>
                            </div>

                            <div class="product-details-action">
                                <div class="details-action-wrapper">
                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                    <a href="#" class="btn-product btn-cart" title="Wishlist"><span>Custom Order</span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="product-details-footer">
                        <div class="product-cat">
                            <span>Category:</span>
                            <a href="#">Women</a>,
                            <a href="#">Dresses</a>,
                            <a href="#">Yellow</a>
                        </div><!-- End .product-cat -->

                        <div class="social-icons social-icons-sm">
                            <span class="social-label">Share:</span>
                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="container">
        <h4>Description:</h4>
        <div class="product-description">
            <p>{!! $product->description !!}</p>
        </div>
    </div>

</div><!-- End .page-content -->
@endsection
