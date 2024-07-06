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
                $('#total_product').text(`${totalProducts}`);
                // total price calculation


                $('.product').each(function() {
                    let productId = $(this).data('id');
                    let quantity = cart[productId] || 0;
                    if (quantity > 0) {
                        $(this).find('.add-to-cart').hide();
                        $(this).find('.quantity-controls').show();
                        $(this).find('.quantity').text(quantity);
                        updatePrice(productId, quantity);
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
                let price = parseFloat($(this).closest('.product').data('price'));
                cart[productId] = (cart[productId] || 0) + 1;
                localStorage.setItem('cart', JSON.stringify(cart));
                $.post('/cart/add', {product_id: productId, quantity: 1}, function(response) {
                    updateUI();
                });
            });

            // Plus button
            $('.plus').click(function() {
                let productId = $(this).closest('.product').data('id');
                let price = parseFloat($(this).closest('.product').data('price'));
                cart[productId]++;
                localStorage.setItem('cart', JSON.stringify(cart));
                $.post('/cart/update', {product_id: productId, quantity: cart[productId]}, function(response) {
                    updateUI();
                });
            });

            // Minus button
            $('.minus').click(function() {
                let productId = $(this).closest('.product').data('id');
                let price = parseFloat($(this).closest('.product').data('price'));
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

            // Remove product from cart
            $('.remove').click(function() {
                let productId = $(this).closest('.product').data('id');
                delete cart[productId];
                localStorage.setItem('cart', JSON.stringify(cart));
                $.post('/cart/remove', {product_id: productId, quantity: 1}, function(response) {
                    toastr.success("Item remove success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                    updateUI();
                });
            });

            // Update price based on quantity
            function updatePrice(productId, quantity) {
                let price = parseFloat($(`.product[data-id="${productId}"]`).data('price'));
                let totalPrice = price * quantity;
                $(`.product[data-id="${productId}"] .price[data-id="${productId}"]`).text(`${totalPrice.toFixed(2)}`);

                //sum price
                let sum = 0;
                $('.price').each(function() {
                    sum += parseFloat($(this).text());
                });
                $('#total_price').text(`${sum.toFixed(2)}`);
            }

            //checkout and remove all storage items
            $('#checkout').click(function() {
                localStorage.clear();
                // updateUI();
                // location.href = '/checkout';
            });

        });
