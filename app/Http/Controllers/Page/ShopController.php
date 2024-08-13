<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $page = "Shop";
        return view('frontend.pages.shop.index', compact('page'));
    }
}
