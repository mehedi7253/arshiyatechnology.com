<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = "All Category";
        $categories = Category::all();
        return view('admin.category.index', compact('categories', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "Add Category";
        $categories = Category::whereNull('parent_id')->where('status', 'active')->get();
        return view('admin.category.create', compact('page', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|unique:categories,category_name',
        ], [
            'category_name.required' => 'Please enter category name',
            'category_name.unique' => 'Category name already exists',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        $category->save();
        $notification = [
           'message' => 'Category added successfully',
            'alert-type' =>'success',
        ];
        return redirect()->route('admin.categories.index')->with($notification);
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
        $page = "Update Category";
        $category = Category::find($id);
        $categories = Category::whereNull('parent_id')->where('status', 'active')->get();
        return view('admin.category.edit', compact('page', 'category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'category_name' => 'required|unique:categories,category_name,' . $id,
        ], [
            'category_name.required' => 'Please enter category name',
            'category_name.unique' => 'Category name already exists',
        ]);

        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        $category->save();

        $notification = [
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        $notification = [
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
