<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\MissionVission;
use App\Models\ServiceFacilitesValues;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function applicationSetting()
    {
        $page = "Application Settings";
        $application_setting = SiteSetting::find(1);
        return view('admin.application-setting.index', compact('application_setting', 'page'));
    }

    public function updateApplicationSetting(Request $request)
    {
        $site_setting = SiteSetting::firstOrFail();
        $site_setting->name         = $request->name;
        $site_setting->email        = $request->email;
        $site_setting->phone        = $request->phone;
        $site_setting->address      = $request->address;
        $site_setting->facebook     = $request->facebook;
        $site_setting->linkedin     = $request->linkedin;
        $site_setting->twitter      = $request->twitter;
        $site_setting->copyright    = $request->copyright;
        $site_setting->keywords     = $request->keywords;
        $site_setting->meta_description    = $request->meta_description;
        $site_setting->additional_phone    = $request->additional_phone;

        //update logo
        if ($request->hasFile('logo')) {
            deleteImage($site_setting->logo);
            $image = saveImage($request->logo, '/uploads/setting/');
            $site_setting->update(['logo' => $image]);
        }

        //update favicon
        if ($request->hasFile('favicon')) {
            deleteImage($site_setting->favicon);
            $image = saveImage($request->favicon, '/uploads/setting/');
            $site_setting->update(['favicon' => $image]);
        }

        $site_setting->save();
        $notification = [
           'message' => 'Application Settings updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function aboutUs()
    {
        $page = "About Us";
        $about_us = AboutUs::find(1);
        return view('admin.application-setting.about', compact('about_us', 'page'));
    }

    public function updateAboutUs(Request $request)
    {
        $this->validate($request,[
            'title' =>'required',
            'description' =>'required',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $about = AboutUs::firstOrFail();
        $about->title       = $request->title;
        $about->description = $request->description;
        if ($request->hasFile('image')) {
            deleteImage($about->image);
            $image = saveImage($request->image, '/uploads/setting/');
            $about->update(['image' => $image]);
        }
        $about->save();

        $notification = [
           'message' => 'About Us updated successfully',
            'alert-type' =>'success',
        ];

        return redirect()->back()->with($notification);
    }

    public function missionVision()
    {
        $page = "Mission & Vision";
        $mission_vision = MissionVission::find(1);
        return view('admin.application-setting.mission-vission', compact('mission_vision', 'page'));
    }

    public function updateMissionVision(Request $request)
    {
        $mission_vision = MissionVission::firstOrFail();
        $mission_vision->mission = $request->mission;
        $mission_vision->vision  = $request->vision;
        $mission_vision->save();
        $notification = [
           'message' => 'Mission & Vision updated successfully',
           'alert-type' =>'success',
        ];
        return redirect()->back()->with($notification);
    }

    public function getService()
    {
        $page = "Service Facilities and Values";
        $sfv = ServiceFacilitesValues::find(1);
        return view('admin.application-setting.service-facilities-values', compact('sfv', 'page'));
    }

    public function updateSFV(Request $request)
    {
        $service_facilities = ServiceFacilitesValues::firstOrFail();
        $service_facilities->services = $request->services;
        $service_facilities->facilities = $request->facilities;
        $service_facilities->values = $request->values;
        $service_facilities->save();
        $notification = [
           'message' => 'updated successfully',
           'alert-type' =>'success',
        ];
        return redirect()->back()->with($notification);
    }
}
