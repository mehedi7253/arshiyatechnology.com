<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Client;
use App\Models\MissionVission;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ServiceFacilitesValues;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::where('status', '0')->get();
        $data['clients'] = Client::where('status', 'active')->take(15)->get();
        $data['products'] = Product::where('is_active', true)->get();
        $data['allProducts'] = Product::where('is_active', true)->orderBy('id', 'desc')->take('12')->get();
        return view('frontend.index', $data);
    }

    public function allProduct(Request $request)
    {
        $allProducts = Product::paginate(10);
        if ($request->ajax()) {
            $view = view('frontend.pages.load-more', compact('allProducts'))->render();
            return response()->json(['html' => $view]);
        }
        return view('allProducts', compact('allProducts'));
    }
    public function productDetails($slug)
    {
        // $product = Product::where('slug', $slug)->first();
        // $product_image = ProductImage::where('product_id', $product->id)->get();
        // $all_product = Product::take('10')->get();
        // return view('frontend.pages.product-details', compact('product','product_image','all_product'));
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
        $productId = $request->id;
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            $price = number_format($cart[$productId]['quantity'] * $cart[$productId]['price'],2);
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true, 'quantity' => $cart[$productId]['quantity'], 'price' => $price]);
    }

    public function decreaseQuantity(Request $request)
    {
        $productId = $request->id;
        $cart = session()->get('cart', []);

        if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--;
            $price = number_format($cart[$productId]['quantity'] * $cart[$productId]['price'],2);
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true, 'quantity' => $cart[$productId]['quantity'], 'price' => $price]);
    }

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


    public function products()
    {
        $products = Product::all();
        return view('frontend.pages.products', compact('products'));
    }

    // public function details($slug)
    // {
    //     $product = Product::where('slug', $slug)->first();
    //     return view('frontend.pages.details', compact('product'));
    // }
}
