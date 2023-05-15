<?php

namespace App\Http\Controllers;

use App\Models\DashboardSetting;
use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $DashboardSetting = DashboardSetting::first();
            return view('admin.pages.dashboard-settings.dashboard-setting',compact('DashboardSetting'));
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.pages.dashboard-settings.dashboard-setting');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if (!$request->id) {
                $request->validate([
                    'system_title' => 'required',
                    'favicon' => 'required',
                    'logo' => 'required',

                ]);
                $data = new DashboardSetting();
            } else {
                $data = DashboardSetting::findOrFail($request->id);
            }
            if ($request->file('logo')) {
                $file = $request->file('logo');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/dashboard/'), $filename);
                $data->logo = $filename;
            }
            if ($request->file('favicon')) {
                $file = $request->file('favicon');
                $filenamefavicon = time() . $file->getClientOriginalName();
                $file->move(public_path('/image/dashboard'),  $filenamefavicon);
                $data->favicon =  $filenamefavicon;
            }
            $data->title = $request->system_title;
            $data->about = $request->description;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->facebook = $request->facebook;
            $data->linkedin = $request->linkedin;
            $data->twitter = $request->twitter;
            $data->address = $request->address;

            if (!$request->id) {

                $data->save();
                return redirect()->route('admin.dashboard-setting.index')->with('success', 'Create successfull.');
            } else {
                $data->update();
                return redirect()->route('admin.dashboard-setting.index')->with('success', 'Update successfull.');
            }

        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
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
        //
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
        //
    }
}
