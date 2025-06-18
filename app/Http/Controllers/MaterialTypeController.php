<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\MaterialType;

class MaterialTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $material_types = MaterialType::latest()->get();
        return Inertia::render('Masters/MaterialType/Index',['material_types'=>$material_types]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Masters/MaterialType/Create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'material_name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            ]);

            $data = [
                'name'=>$request->material_name,
                'status'=>$request->status
            ];
            $material_type = MaterialType::create($data);
            if($material_type){
                return redirect()->route('material-type.index')->with('success', 'Material type created successfully.');
            }
            return redirect()->route('material-type.index')->with('error', 'Failed to create material type.');
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
        $material_type = MaterialType::findOrFail($id);
        return Inertia::render('Masters/MaterialType/Edit', [
        'material_type' => $material_type
    ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'material_name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            ]);
        $material_type = MaterialType::findOrFail($id);
        $material_type->Update([
            'name'=> $request->material_name,
            'status'=>$request->status
        ]);

         return redirect()->route('material-type.index')->with('success', 'Material type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material_type = MaterialType::findOrFail($id);
        $material_type->delete();
        return redirect()->route('material-type.index')->with('success', 'Material type deleted successfully.');
    }
}
