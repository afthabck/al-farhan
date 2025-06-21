<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\AdminConfig;
use Illuminate\Support\Facades\Storage;

class AdminConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config = AdminConfig::all();
        return Inertia::render('AdminConfig/Index',['config'=>$config]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $config = AdminConfig::findOrFail($id);
        return Inertia::render('AdminConfig/Edit',['config'=>$config]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $config = AdminConfig::findOrFail($id);

    // Force correct type based on known config keys
    switch ($config->key) {
        case 'website_logo':
            $request->merge(['type' => 1]);
            break;

        case 'website_name':
        case 'sidebar_label':
        case 'dashboard_title':
            $request->merge(['type' => 0]);
            break;

        default:
            // Leave type as submitted (0 or 2)
            break;
    }

    // Define validation rules
    $rules = [
        'type' => 'required|in:0,1,2',
    ];

    switch ($config->key) {
        case 'website_logo':
            if ($request->hasFile('value')) {
                $rules['value'] = 'required|image|mimes:png,jpg,jpeg,webp|max:2048';
            }
            break;

        case 'website_name':
        case 'sidebar_label':
        case 'dashboard_title':
            $rules['value'] = 'required|string|max:255';
            break;

        default:
            if ($request->type == 0 || $request->type == 2) {
                $rules['value'] = 'required|string';
            } else {
                $rules['value'] = 'nullable';
            }
            break;
    }

    $validated = $request->validate($rules);

    // Update value based on key
    switch ($config->key) {
        case 'website_logo':
            if ($request->hasFile('value')) {
                $config->deleteImage('value');
                $config->value = $config->uploadImage($request->file('value'), $config->getImageDirectory());
            }
            break;

        case 'website_name':
        case 'sidebar_label':
        case 'dashboard_title':
            $config->value = $request->value;
            break;

        default:
            if ($request->type == 0 || $request->type == 2) {
                $config->value = $request->value;
            }
            break;
    }

    // Update type (to make sure type stays consistent in DB)
    $config->type = $request->type;
    $config->save();

    return to_route('admin_settings.index')->with('success', 'Config updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
