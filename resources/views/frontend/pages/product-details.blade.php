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
                <div class="col-md-6">
                    <div class="product-gallery">
                        <figure class="product-main-image">
                            <img id="product-zoom" src="{{ asset($product->thumbnail) }}" data-zoom-image="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" style="height: 500px; width: 500px">
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

                <div class="col-md-6">
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
                            </div>

                            <div class="product-details-action">
                                <div class="details-action-wrapper">
                                    <button type="submit" class="btn-product btn-cart"><span>add to cart</span></button>
                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                </div>
                            </div>
                        </form>

                        <div class="product-details-footer">
                            <div class="product-cat">
                                <span>Category:</span>
                                <a href="#">Women</a>,
                                <a href="#">Shoes</a>,
                                <a href="#">Sandals</a>,
                                <a href="#">Yellow</a>
                            </div><!-- End .product-cat -->

                            <div class="social-icons social-icons-sm">
                                <span class="social-label">Share:</span>
                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            </div>
                        </div><!-- End .product-details-footer -->
                    </div><!-- End .product-details -->
                </div><!-- End .col-md-6 -->
            </div><!-- End .row -->
        </div><!-- End .product-details-top -->
    </div><!-- End .container -->

    <div class="product-details-tab product-details-extended">
        <div class="container">
            <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
                </li>
            </ul>
        </div><!-- End .container -->

        <div class="tab-content">
            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                <div class="product-desc-content">
                    <div class="product-desc-row bg-image"  style="background-image: url('assets/images/products/single/extended/bg-1.jpg')">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-sm-6 col-lg-4">
                                    <h2>Product Information</h2>
                                    <ul>
                                        <li>Faux suede fabric upper</li>
                                        <li>Tie strap buckle detail</li>
                                        <li>Block heel</li>
                                        <li>Open toe</li>
                                        <li>Heel Height: 7cm / 2.5 inches</li>
                                    </ul>
                                </div><!-- End .col-lg-4 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .product-desc-row -->

                    <div class="product-desc-row bg-image text-white"  style="background-image: url('assets/images/products/single/extended/bg-2.jpg')">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>Design</h2>
                                    <p>The perfect choice for the summer months. These wedges are perfect for holidays and home, with the thick cross-over strap design and heel strap with an adjustable buckle fastening. Featuring chunky soles with an espadrille and cork-style wedge. </p>
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <h2>Fabric & care</h2>
                                    <p>As part of our Forever Comfort collection, these wedges have ultimate cushioning with soft padding and flexi soles. Perfect for strolls into the old town on holiday or a casual wander into the village.</p>
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->

                            <div class="mb-5"></div><!-- End .mb-3 -->

                            <img src="assets/images/products/single/extended/sign.png" alt="" class="ml-auto mr-auto">
                        </div><!-- End .container -->
                    </div><!-- End .product-desc-row -->

                    <div class="product-desc-row bg-image"  style="background-image: url('assets/images/products/single/extended/bg-3.jpg')">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5">
                                    <blockquote>
                                        <p>“ Everything is important - <br>that success is in the details. ”</p>

                                        <cite>– Steve Jobs</cite>
                                    </blockquote>
                                    <p>Nullam mollis. Ut justo. Suspendisse potenti. Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. </p>
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .product-desc-row -->
                </div><!-- End .product-desc-content -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                <div class="product-desc-content">
                    <div class="container">
                        <h3>Information</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. </p>

                        <h3>Fabric & care</h3>
                        <ul>
                            <li>Faux suede fabric</li>
                            <li>Gold tone metal hoop handles.</li>
                            <li>RI branding</li>
                            <li>Snake print trim interior </li>
                            <li>Adjustable cross body strap</li>
                            <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                        </ul>

                        <h3>Size</h3>
                        <p>one size</p>
                    </div><!-- End .container -->
                </div><!-- End .product-desc-content -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                <div class="product-desc-content">
                    <div class="container">
                        <h3>Delivery & returns</h3>
                        <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                        We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                    </div><!-- End .container -->
                </div><!-- End .product-desc-content -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                <div class="reviews">
                    <div class="container">
                        <h3>Reviews (2)</h3>
                        <div class="review">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <h4><a href="#">Samanta J.</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    </div><!-- End .rating-container -->
                                    <span class="review-date">6 days ago</span>
                                </div><!-- End .col -->
                                <div class="col">
                                    <h4>Good, perfect size</h4>

                                    <div class="review-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum dolores assumenda asperiores facilis porro reprehenderit animi culpa atque blanditiis commodi perspiciatis doloremque, possimus, explicabo, autem fugit beatae quae voluptas!</p>
                                    </div><!-- End .review-content -->

                                    <div class="review-action">
                                        <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                        <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                    </div><!-- End .review-action -->
                                </div><!-- End .col-auto -->
                            </div><!-- End .row -->
                        </div><!-- End .review -->

                        <div class="review">
                            <div class="row no-gutters">
                                <div class="col-auto">
                                    <h4><a href="#">John Doe</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                    </div><!-- End .rating-container -->
                                    <span class="review-date">5 days ago</span>
                                </div><!-- End .col -->
                                <div class="col">
                                    <h4>Very good</h4>

                                    <div class="review-content">
                                        <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi, quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                    </div><!-- End .review-content -->

                                    <div class="review-action">
                                        <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                        <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                    </div><!-- End .review-action -->
                                </div><!-- End .col-auto -->
                            </div><!-- End .row -->
                        </div><!-- End .review -->
                    </div><!-- End .container -->
                </div><!-- End .reviews -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .product-details-tab -->

</div><!-- End .page-content -->
@endsection
