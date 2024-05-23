<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\MissionVission;
use App\Models\Product;
use App\Models\ProductImage;
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

    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product_image = ProductImage::where('product_id', $product->id)->get();
        $all_product = Product::take('10')->get();
        return view('frontend.pages.product-details', compact('product','product_image','all_product'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $cart = session()->get('cart', []);

        $product = Product::find($productId);
        $cart[$productId] = [
            "productId" => $product->id,
            "name" => $product->product_name,
            "quantity" => $quantity,
            "price" => $product->discount_price ?? $product->price,
            "image" => $product->image,
            "url" => $product->slug,
        ];


        session()->put('cart', $cart);

        return response()->json(['success' => true, 'quantity' => $cart[$productId]['quantity']]);
    }


    public function increaseQuantity(Request $request)
    {
        $productId = $request->product_id;
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true, 'quantity' => $cart[$productId]['quantity']]);
    }

    public function decreaseQuantity(Request $request)
    {
        $productId = $request->product_id;
        $cart = session()->get('cart', []);

        if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--;
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true, 'quantity' => $cart[$productId]['quantity']]);
    }

    // public function cart()
    // {
    //     $cart = session()->get('cart');
    //     return $cart;
    //     return view('frontend.cart.index', compact('cart'));
    // }
    public function cartItem()
    {
        $cart = session()->get('cart', []);
        // return $cart;
        return view('frontend.pages.cart', compact('cart'));
    }

    public function removeItem($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        $notification = [
            'message' => 'Item Remove successfully',
            'alert-type' =>'success',
         ];
         return redirect()->back()->with($notification);

    }
}
