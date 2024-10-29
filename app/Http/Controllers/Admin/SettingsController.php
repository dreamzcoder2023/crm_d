<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\UpdateSettingsRequest;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        return view('admin.settings.edit', ['settings' => $settings]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingsRequest $request, Settings $settings)
    {
        $validator = $request->validated();
        // dd($validator);
        if ($request->hasFile('favicon')) {
            $imageName = uniqid() . "." . $request->favicon->extension();
            $request->favicon->move(public_path('settings'), $imageName);
            if (isset($settings->favicon)) {
                $oldFaviconPath = public_path('settings') . '/' . $settings->favicon;
                if (isset($settings->favicon) && $request->hasFile('favicon')) {
                    unlink($oldFaviconPath);
                }
            }
            $validator['favicon'] = $imageName;
        }
        if ($request->hasFile('logo')) {
            $imageName = uniqid() . "." . $request->logo->extension();
            $request->logo->move(public_path('settings'), $imageName);
            if (isset($settings->logo)) {
                $oldlogoPath = public_path('settings') . '/' . $settings->logo;
                if (isset($settings->favicon) && $request->hasFile('logo')) {
                    unlink($oldlogoPath);
                }
            }
            $validator['logo'] = $imageName;
        }
        if ($request->hasFile('sidebar_logo')) {
            $imageName = uniqid() . "." . $request->sidebar_logo->extension();
            $request->sidebar_logo->move(public_path('settings'), $imageName);
            if (isset($settings->sidebar_logo)) {
                $oldsidebar_logoPath = public_path('settings') . '/' . $settings->sidebar_logo;
                if (isset($settings->favicon) && $request->hasFile('sidebar_logo')) {
                    unlink($oldsidebar_logoPath);
                }
            }
            $validator['sidebar_logo'] = $imageName;
        }
        $settings->update($validator);
        return to_route('admin.settings.edit', $settings->id)->with('success', "Settings Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
