<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Machine;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = Machine::latest()->get();
        return Inertia::render('Masters/Machines/Index',['machines'=>$machines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Masters/Machines/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'machine_name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            ]);

            $data = [
                'name'=>$request->machine_name,
                'status'=>$request->status
            ];
            $machine = Machine::create($data);
            if($machine){
                return redirect()->route('machines.index')->with('success', 'Material type created successfully.');
            }
            return redirect()->route('machines.index')->with('error', 'Failed to create material type.');
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
         $machine = Machine::findOrFail($id);
        return Inertia::render('Masters/Machines/Edit', [
        'machine' => $machine
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            'machine_name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            ]);
        $machine = Machine::findOrFail($id);
        $machine->Update([
            'name'=> $request->machine_name,
            'status'=>$request->status
        ]);

         return redirect()->route('machines.index')->with('success', 'Machine type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $machine = Machine::findOrFail($id);
        $machine->delete();
        return redirect()->route('machines.index')->with('success', 'Machine type deleted successfully.');
    }
}
