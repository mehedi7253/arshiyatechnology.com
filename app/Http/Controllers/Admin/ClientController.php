<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = "All Clients";
        $clients = Client::all();
        return view('admin.client.index', compact('clients', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = "Add New Client";
        return view('admin.client.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'client_logo' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'url'   => 'nullable',
            'status' => 'required',
        ]);

        $client = new Client();
        $client->url    = $request->url;
        $client->status = $request->status;

        if ($request->hasFile('client_logo')) {
            $image = saveImage($request->client_logo, '/uploads/clients/');
            $client->client_logo = $image;
        }
        $client->save();

        $notification = [
            'message' => 'New Client added successfully',
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
        $page = "Update Client";
        $client = Client::find($id);
        return view('admin.client.edit', compact('client', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'client_logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'url'   => 'nullable',
            'status' => 'required',
        ]);

        $client = Client::find($id);
        $client->url    = $request->url;
        $client->status = $request->status;
        if ($request->hasFile('client_logo')) {
            deleteImage($client->client_logo);
            $image = saveImage($request->client_logo, '/uploads/clients/');
        } else {
            $image = $client->client_logo;
        }
        $client->save();

        $notification = [
            'message' => 'Client updated successfully',
             'alert-type' =>'success',
        ];
        return redirect()->route('admin.clients.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        deleteImage($client->image);
        $client->delete();

        $notification = [
           'message' => 'Client delete successfully',
            'alert-type' =>'success',
        ];
        return redirect()->back()->with($notification);
    }
}
