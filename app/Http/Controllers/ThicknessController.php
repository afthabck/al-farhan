<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Thickness;

class ThicknessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $thicknesses = Thickness::latest()->get();
        return Inertia::render('Masters/Thickness/Index',['thicknesses'=>$thicknesses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Masters/Thickness/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'thickness' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            ]);
            $data =[
                'thickness'=>$request->thickness,
                'status'=>$request->status,
            ];
            Thickness::create($data);
            return redirect()->route('thickness.index')->with('success', 'Thickness created successfully.');
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
          $thickness = Thickness::find($id);
        return Inertia::render('Masters/Thickness/Edit',['thickness'=>$thickness]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'thickness' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            ]);
        $thickness = Thickness::findOrFail($id);
        $thickness->Update([
            'thickness'=> $request->thickness,
            'status'=>$request->status
        ]);

         return redirect()->route('thickness.index')->with('success', 'Thickness updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thickness = Thickness::find($id);
        $thickness->delete();
        return redirect()->route('thickness.index')->with('success', 'Thickness deleted successfully.');
    }
}
