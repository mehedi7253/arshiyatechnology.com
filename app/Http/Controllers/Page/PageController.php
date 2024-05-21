<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\MissionVission;
use App\Models\Product;
use App\Models\ServiceFacilitesValues;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', '0')->orderBy('id', 'DESC')->get();
        $mission_vision = MissionVission::first();
        $about_us = AboutUs::first();
        $products = Product::take(10)->get();
        $sfv = ServiceFacilitesValues::first();
        return view('frontend.index', compact('banners','mission_vision', 'about_us','products','sfv'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                "id" => $productId,
                "quantity" => $quantity,
                // Add other product details if needed
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['success' => true, 'cart' => $cart]);
    }


    public function incrementCartItem(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function decrementCartItem(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--;
            session()->put('cart', $cart);
        } elseif (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    // public function cart()
    // {
    //     $cart = session()->get('cart');
    //     return $cart;
    //     return view('frontend.cart.index', compact('cart'));
    // }
    public function getCart()
    {
        $cart = session()->get('cart', []);
        return response()->json(['cart' => $cart]);
    }
}
