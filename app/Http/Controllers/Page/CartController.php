<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartContent = Cart::content();
        return view('frontend.pages.cart', compact('cartContent'));
    }

    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        Cart::add([
            'id'     => $product->id,
            'name'   => $product->name,
            'qty'    => $request->quantity,
            'price'  => ceil($product->discount_price ?? $product->regular_price),
            'weight' => 0,
            'options' => [
                'image'  => $product->thumbnail,
                'url'    => $product->slug,
                'sku'    => $product->sku,
            ],
        ]);

        $notification = [
            'message' => 'Product Add to cart Successful',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

}
