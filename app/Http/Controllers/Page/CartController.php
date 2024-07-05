<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
    public function removeProduct(Request $request)
    {
        $cart = session()->get('cart');
        $productId = $request->product_id;
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']--;

            if ($cart[$productId]['quantity'] == 0) {
                unset($cart[$productId]);
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully.');
    }

    public function getCart()
    {
        $cart = Session::get('cart', []);
        $products = Product::whereIn('id', array_keys($cart))->get();
        return view('frontend.pages.cart', compact('cart', 'products'));

        // return response()->json(['cart' => $cart]);
    }


}
