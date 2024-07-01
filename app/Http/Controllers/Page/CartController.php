<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = Session::get('cart', []);
        $productId = $request->product_id;
        $quantity = $request->quantity;

        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }

        Session::put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function updateCart(Request $request)
    {
        $cart = Session::get('cart', []);
        $productId = $request->product_id;
        $quantity = $request->quantity;

        if ($quantity > 0) {
            $cart[$productId] = $quantity;
        } else {
            unset($cart[$productId]);
        }

        Session::put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function getCart()
    {
        $cart = Session::get('cart', []);
        return response()->json(['cart' => $cart]);
    }


    /// using package
    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        Cart::add([
            'id'    => $product->id,
            'name'   => $product->product_name,
            'qty'    => $request->quantity,
            'price'  => $product->discount_price ?? $product->price,
            'weight' => 0,
            'options' => [''],
        ]);

        // Cart::add($product->id, $request->name, $request->quantity, $request->price, $request->weight, $request->options);
        return redirect()->route('cart.index')->with('success', 'Item added to cart!');
    }
    public function index()
    {
        $cartContent = Cart::content();
        return view('frontend.pages.cart2', compact('cartContent'));
    }

    public function remove($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request->quantity);
        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function clear()
    {
        Cart::destroy();
        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }
}
