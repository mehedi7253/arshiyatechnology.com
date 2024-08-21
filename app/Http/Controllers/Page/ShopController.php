<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $page = "Shop";
        $categories = Category::where('status', 'active')->get();
        $products = Product::where('status', 'active')->paginate(15);
        return view('frontend.pages.shop.index', compact('page','categories', 'products'));
    }

    public function categoryProduct($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $products = Product::whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id)
                ->where('status', 'active');
        })->paginate(10);
        return view('frontend.pages.shop.category-wise-product', compact('products', 'category'));
    }
}
