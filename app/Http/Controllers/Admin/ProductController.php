<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductUpdateRequest;
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
            'name'              => 'required|string|max:255',
            'slug'              => 'required|string|max:255',
            'sku'               => 'required|string|max:255|unique:products,sku',
            'regular_price'     => 'required|numeric',
            'discount_price'    => 'nullable|numeric',
            'thumbnail'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id'       => 'required|array',
            'description'       => 'required'
        ],[
            'name.required'             => 'Product name is required',
            'name.string'               => 'Product name must be a string',
            'name.max'                  => 'Product name must not be greater than 255 characters',
            'slug.required'             => 'Product slug is required',
            'slug.string'               => 'Product slug must be a string',
            'slug.max'                  => 'Product slug must not be greater than 255 characters',
            'sku.required'              => 'Product SKU is required',
            'sku.string'                => 'Product SKU must be a string',
            'sku.max'                   => 'Product SKU must not be greater than 255 characters',
            'sku.unique'                => 'Product SKU must be unique',
            'regular_price.required'    => 'Product regular price is required',
            'regular_price.numeric'     => 'Product regular price must be a number',
            'discount_price.numeric'    => 'Product discount price must be a number',
            'thumbnail.required'        => 'Product thumbnail is required',
            'thumbnail.image'           => 'Product thumbnail must be an image',
            'thumbnail.mimes'           => 'Product thumbnail must be a file of type: jpeg, png, jpg, gif, svg',
            'thumbnail.max'             => 'Product thumbnail must not be greater than 2048 kilobytes',
            'category_id.required'      => 'Product category is required',
            'category_id.array'         => 'Product category must be an array',
            'description.required'      => 'Product description is required',
        ]);

        $product = new Product();
        $product->name             = $request->name;
        $product->sku              = $request->sku;
        $product->slug             = $request->slug;
        $product->description      = $request->description;
        $product->regular_price    = $request->regular_price;
        $product->discount_price   = $request->discount_price;
        $product->is_stock         = $request->is_stock ?? false;
        $product->is_featured      = $request->is_featured ?? false;
        $product->is_active        = $request->is_active ?? true;
        $product->is_trending      = $request->is_trending ?? false;
        $product->is_bestseller    = $request->is_bestseller ?? false;
        $product->is_offers        = $request->is_offers ?? false;
        $product->is_new           = $request->is_new ?? false;
        $product->tags             = $request->tags;


        if ($request->hasFile('thumbnail')) {
            $location               = '/uploads/products/';
            $image                  = $request->file('thumbnail');
            $image                  = saveImage($image, $location);
            $product->thumbnail     = $image;
        }
        if ($request->hasFile('gallery')) {
            $images = [];
            foreach ($request->file('gallery') as $image) {
                $images[] = saveImage($image, '/uploads/products/');
            }
            $product->gallery = json_encode($images);
        }

        $product->save();
        if (!empty($request->category_id)) {
            $product->categories()->sync($request->category_id);
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
        $page = "Update product";
        $product = Product::find($id);
        $categories = Category::whereNull('parent_id')->where('status', 'active')->get();
        return view('admin.product.edit', compact('product', 'page', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->name             = $request->name;
        $product->sku              = $request->sku;
        $product->slug             = $request->slug;
        $product->description      = $request->description;
        $product->regular_price    = $request->regular_price;
        $product->discount_price   = $request->discount_price;
        $product->is_stock         = $request->is_stock ?? false;
        $product->is_featured      = $request->is_featured ?? false;
        $product->is_active        = $request->is_active ?? true;
        $product->is_trending      = $request->is_trending ?? false;
        $product->is_bestseller    = $request->is_bestseller ?? false;
        $product->is_offers        = $request->is_offers ?? false;
        $product->is_new           = $request->is_new ?? false;
        $product->tags             = $request->tags;

        if ($request->hasFile('thumbnail')) {
            if (file_exists(public_path($product->thumbnail))) {
                deleteImage($product->thumbnail);
            }
            $location               = '/uploads/products/';
            $image                  = $request->file('thumbnail');
            $image                  = saveImage($image, $location);
            $product->thumbnail     = $image;
        }

        if ($request->hasFile('gallery')) {
            $gallery = json_decode($product->gallery);
            $images = [];
            foreach ($request->file('gallery') as $image) {
                $images[] = saveImage($image, '/uploads/products/');
            }
            $product->gallery = json_encode(array_merge($gallery, $images));
        }
        $product->save();
        $product->categories()->sync($request->category_id);

        $notification = [
           'message' => 'New product added successfully',
            'alert-type' =>'success',
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);

        if (file_exists(public_path($products->thumbnail))) {
            deleteImage($products->thumbnail);
        }
        if (!empty(json_decode($products->gallery))) {
            foreach (json_decode($products->gallery) as $image) {
                if (file_exists(public_path($image))) {
                    deleteImage($image);
                }
            }
        }
        $products->categories()->detach();
        $products->delete();

        $notification = [
           'message' => 'Product delete successfully',
            'alert-type' =>'success',
        ];
        return redirect()->back()->with($notification);
    }
    public function galleryImageDelete(Product $product, $galleryImageKey)
    {
        $gallery = json_decode($product->gallery);
        if (file_exists(public_path($gallery[$galleryImageKey]))) {
            deleteImage($gallery[$galleryImageKey]);
        }
        unset($gallery[$galleryImageKey]);
        $product->gallery = json_encode(array_values($gallery));
        $product->save();
        $notification = [
           'message' => 'Product gallery image deleted successfully',
            'alert-type' =>'success',
        ];
        return redirect()->back()->with($notification);
    }
}
