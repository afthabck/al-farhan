<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\RawMaterial;

class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $raw_materials = RawMaterial::latest()->get();
        return Inertia::render('Masters/RawMaterial/Index',['raw_materials'=>$raw_materials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Masters/RawMaterial/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'unit'=>'required'
            ]);
        $data =[
            'name'=>$request->name,
            'unit'=>$request->unit,
            'status'=>$request->status,
        ];
        RawMaterial::create($data);
        return redirect()->route('raw_materials.index')->with('success', 'Raw Material created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $raw_material = RawMaterial::findOrFail($id);
        return Inertia::render('Masters/RawMaterial/Edit', [
            'raw_material' => $raw_material
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'unit'=>'required'
            ]);
        $raw_material = RawMaterial::findOrFail($id);
        $raw_material->name = $request->name;
        $raw_material->unit = $request->unit;
        $raw_material->status = $request->status;
        $raw_material->save();
        return redirect()->route('raw_materials.index')->with('success', 'Raw Material Updated  Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $raw_material = RawMaterial::findOrFail($id);
        $raw_material->delete();
        return redirect()->route('raw_materials.index')->with('success', 'Raw Material deleted successfully.');
    }
}
