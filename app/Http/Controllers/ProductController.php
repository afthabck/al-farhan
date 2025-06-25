<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Size;
use App\Models\Thickness;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['size', 'thickness'])->latest()->get();
        return Inertia::render('Masters/Product/Index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sizes = Size::where('status',1)->get();
        $thicknesses = Thickness::where('status',1)->get();
        return Inertia::render('Masters/Product/Create',['sizes'=>$sizes,'thicknesses'=>$thicknesses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:255',
            'size' => 'required',
            'thickness' => 'required',
            'status' => 'required|in:0,1',
        ]);

        $data=[
            'product_name'=>$request->product_name,
            'product_code'=>$request->product_code,
            'size_id'=>$request->size,
            'thickness_id'=>$request->thickness,
            'status'=>$request->status,
            'custom_size'=>$request->custom_size,
            'custom_thickness'=>$request->custom_thickness
        ];
        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $sizes = Size::where('status',1)->get();
        $thicknesses = Thickness::where('status',1)->get();
        return Inertia::render('Masters/Product/Edit',['product'=>$product,'sizes'=>$sizes,'thicknesses'=>$thicknesses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'product_name' => 'required|string|max:255',
        'product_code' => 'required|string|max:255',
        'size' => 'required',
        'thickness' => 'required',
        'status' => 'required|in:0,1',
     ]);
        $product = Product::find($id);

        $product->update([
        'product_name' => $request->product_name,
        'product_code' => $request->product_code,
        'size_id' => $request->size,
        'thickness_id' => $request->thickness,
        'status' => $request->status,
        'custom_size' => $request->custom_size,
        'custom_thickness' => $request->custom_thickness
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
