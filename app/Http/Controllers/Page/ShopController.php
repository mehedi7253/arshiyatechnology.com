<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $page = "Shop";
        $categories = Category::where('status', 'active')->get();
        return view('frontend.pages.shop.index', compact('page','categories'));
    }
}
