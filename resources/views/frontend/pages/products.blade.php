<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <h3 id="total_product">cart item: </h3>
    <div id="products">
        <!-- Example product structure -->
        @foreach ($products as $product)
            <div class="product" data-id="{{ $product->id }}">
                <h3>{{ $product->product_name }}</h3>
                <button class="add-to-cart">Add to Cart</button>
                <div class="quantity-controls" style="display: none;">
                    <button class="minus">-</button>
                    <span class="quantity">0</span>
                    <button class="plus">+</button>
                </div>
            </div>
            <a href="{{ route('product.details', $product->slug) }}">view</a>
        @endforeach
        <!-- Add more products as needed -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Load cart from local storage
            let cart = JSON.parse(localStorage.getItem('cart')) || {};

            // Function to update UI
            function updateUI() {
                totalProducts = Object.keys(cart).length;
                $('#total_product').text(`Cart item: ${totalProducts}`);

                $('.product').each(function() {
                    let productId = $(this).data('id');
                    let quantity = cart[productId] || 0;
                    if (quantity > 0) {
                        $(this).find('.add-to-cart').hide();
                        $(this).find('.quantity-controls').show();
                        $(this).find('.quantity').text(quantity);
                    } else {
                        $(this).find('.add-to-cart').show();
                        $(this).find('.quantity-controls').hide();
                    }
                });
            }

            // Initial UI update
            updateUI();

            // Add to cart
            $('.add-to-cart').click(function() {
                let productId = $(this).closest('.product').data('id');
                cart[productId] = (cart[productId] || 0) + 1;
                localStorage.setItem('cart', JSON.stringify(cart));
                $.post('/cart/add', {product_id: productId, quantity: 1}, function(response) {
                    updateUI();
                });
            });

            // Plus button
            $('.plus').click(function() {
                let productId = $(this).closest('.product').data('id');
                cart[productId]++;
                localStorage.setItem('cart', JSON.stringify(cart));
                $.post('/cart/update', {product_id: productId, quantity: cart[productId]}, function(response) {
                    updateUI();
                });
            });

            // Minus button
            $('.minus').click(function() {
                let productId = $(this).closest('.product').data('id');
                if (cart[productId] > 0) {
                    cart[productId]--;
                    if (cart[productId] === 0) {
                        delete cart[productId];
                    }
                    localStorage.setItem('cart', JSON.stringify(cart));
                    $.post('/cart/update', {product_id: productId, quantity: cart[productId]}, function(response) {
                        updateUI();
                    });
                }
            });
        });
    </script>
</body>
</html>
