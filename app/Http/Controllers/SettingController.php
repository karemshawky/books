<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function index(Setting $setting)
    {
        $setting = Setting::first();
        return view('backend.setting.read',compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('backend.setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'title'       => 'nullable|string',
            'description' => 'nullable|string',
            'tags'        => 'nullable',
            'facebook'    => 'nullable|url',
            'twitter'     => 'nullable|url',
            'instagram'   => 'nullable|url',
            'pintrest'    => 'nullable|url',
            'mail'        => 'nullable|email',
        ]);

        $setting->update(request()->all());

        return back()->with([
            'url'     => 'settings.index',
            'type'    => 'success',
            'message' => 'تم تعديل بيانات الموقع بنجاح '
        ]);
    }

}
