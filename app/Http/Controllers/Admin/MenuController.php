<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = "All Menu";
        $menus = Menu::all();
        return view('admin.menu.index', compact('page', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "Add New Menu";
        $menus = Menu::whereNull('parent_id')->get();
        return view('admin.menu.create', compact('page', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required',
            'url' =>'required',
            'is_active' =>'required',
        ]);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->parent_id = $request->parent_id;
        $menu->url = $request->url;
        $menu->icon = $request->icon;
        $menu->order = $request->order ?? 0;
        $menu->is_active = $request->is_active;
        $menu->is_open_new_tab = $request->is_open_new_tab;
        $menu->save();

        $notification = [
            'message' => 'New Menu added successfully',
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
        $page = "Update Menu";
        $menu = Menu::find($id);
        $menuData = Menu::whereNull('parent_id')->get();
        return view('admin.menu.edit', compact('page','menu', 'menuData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request,[
            'name'      =>'required',
            'url'       =>'required',
            'is_active' =>'required',
        ]);
        if($request->parent_id == $menu->id) {
            $notification = [
               'message' => 'Cannot assign parent to itself',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($notification);
        }else{
            $menu->name = $request->name;
            $menu->parent_id = $request->parent_id;
            $menu->url = $request->url;
            $menu->icon = $request->icon;
            $menu->order = $request->order ?? 0;
            $menu->is_active = $request->is_active;
            $menu->is_open_new_tab = $request->is_open_new_tab;
            $menu->update();
            $notification = [
                'message' => 'Menu updated successfully',
                'alert-type' =>'success',
            ];
            return redirect()->route('admin.menus.index')->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Menu::destroy($id);
        $notification = [
            'message' => 'Menu Delete successfully',
            'alert-type' =>'success',
        ];
        return redirect()->route('admin.menus.index')->with($notification);
    }
}
