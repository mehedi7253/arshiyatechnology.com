<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = "Product Page";
        $products = Product::all();
        return view('admin.product.index', compact('page', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "Add New Product";
        $categories = Category::whereNull('parent_id')->where('status', 'active')->get();
        return view('admin.product.create', compact('page', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_name'      => 'required',
            'short_description' =>'required',
            'price'             =>'required',
            'image'             =>'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'category_id'      => 'required',
        ]);

        $product = new Product();
        $product->product_name      = $request->product_name;
        $product->short_description = $request->short_description;
        $product->long_description  = $request->long_description;
        $product->price             = $request->price;
        $product->discount_price    = $request->discount_price;
        $product->slug              = Str::slug($request->product_name);
        $product->status           = $request->status;

        if ($request->hasFile('image')) {
            $location = '/uploads/product/';
            $image = $request->file('image');
            $image = saveImage($image, $location);
        }
        $product->image            = $image;
        $product->save();

        if (!empty($request->category_id)) {
            $product->categories()->attach($request->category_id);
        }
        if ($request->hasFile('sub_image')) {
            foreach ($request->sub_image as $image) {
                $location = '/uploads/product/';
                $sub_image = saveImage($image, $location);
                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->sub_image = $sub_image;
                $productImage->save();
            }
        }

        $notification = [
           'message' => 'New product added successfully',
            'alert-type' =>'success',
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        deleteImage($product->image);
        $product->delete();

        $notification = [
           'message' => 'Product delete successfully',
            'alert-type' =>'success',
        ];
        return redirect()->back()->with($notification);
    }
}
