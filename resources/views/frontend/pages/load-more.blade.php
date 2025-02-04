@foreach ($allProducts as $product)
    <div class="col-lg-3 col-6">
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
                    <form action="{{route('page.add-to-cart')}}" method="POST">
                        @csrf
                        <input hidden name="product_id" value="{{ $product->id }}">
                        <input hidden name="quantity" value="1">
                        <button type="submit" class="btn-product btn-cart form-control col-12"><span>add to cart</span></button>
                    </form>
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
@endforeach
