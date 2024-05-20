<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Banner;
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
        $quantity = $request->input('quantity');

        $cart = session()->get('cart', []);

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $product = Product::find($productId);
            $cart[$productId] = [
                "name" => $product->product_name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['success' => 'Product added to cart successfully!']);
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => 'Cart updated successfully']);
        }
    }

    public function cart()
    {
        $cart = session()->get('cart');
        return $cart;
        return view('frontend.cart.index', compact('cart'));
    }
}
