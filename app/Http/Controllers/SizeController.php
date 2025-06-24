<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes = Size::latest()->get();
        return Inertia::render('Masters/Size/Index',['sizes'=>$sizes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Masters/Size/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'size' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            ]);
            $data =[
                'size'=>$request->size,
                'status'=>$request->status,
            ];
            Size::create($data);
            return redirect()->route('sizes.index')->with('success', 'Size created successfully.');
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
        $size = Size::find($id);
        return Inertia::render('Masters/Size/Edit',['size'=>$size]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'size' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            ]);
        $size = Size::findOrFail($id);
        $size->Update([
            'size'=> $request->size,
            'status'=>$request->status
        ]);

         return redirect()->route('sizes.index')->with('success', 'Size updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::find($id);
        $size->delete();
        return redirect()->route('sizes.index')->with('success', 'Size deleted successfully.');
    }
}
