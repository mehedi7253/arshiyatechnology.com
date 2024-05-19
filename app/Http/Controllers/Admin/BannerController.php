<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = "All banner's";
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "Add New Banner";
        return view('admin.banner.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'banner_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $banner = new Banner();
        $banner->banner_link        = $request->banner_link;
        $banner->status             = $request->status;
        if ($request->hasFile('banner_image')) {
            $location = '/uploads/banner/';
            $image = $request->file('banner_image');
            $image = saveImage($image, $location);
        }

        $banner->banner_image        = $image;
        $banner->save();

        $notification = [
           'message' => 'New banner added successfully',
            'alert-type' => 'success',
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
        $page = "Edit Banner";
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'banner_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $banner = Banner::find($id);
        $banner->banner_link        = $request->banner_link;
        $banner->status             = $request->status;
        if ($request->hasFile('banner_image')) {
            deleteImage($banner->banner_image);
            $image = saveImage($request->banner_image, '/uploads/banner/');
        } else {
            $image = $banner->banner_image;
        }
        $banner->banner_image        = $image;
        $banner->save();

        $notification = [
           'message' => 'Banner update successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        deleteImage($banner->image);
        $banner->delete();

        $notification = [
            'message' => 'Banner delete successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }
}
