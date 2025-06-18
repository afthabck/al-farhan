<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Machine;
use App\Models\Process;
use App\Models\ProcessToMachine;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $processes = Process::with('machines')->latest()->get();
        return Inertia::render('Masters/Process/Index',['processes'=>$processes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $machines = Machine::where('status',1)->get();
        return Inertia::render('Masters/Process/Create',['machines'=>$machines]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'process_name' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'machine_ids' => 'required|array|min:1',
            'machine_ids.*' => 'exists:machines,id',
            ]);
            $data =[
                'name'=>$request->process_name,
                'status'=>$request->status,
            ];

            $process = Process::create($data);
            foreach ($request->machine_ids as $machineId) {
                try {
                    ProcessToMachine::create([
                        'process_id' => $process->id,
                        'machine_id' => $machineId,
                    ]);
                } catch (\Exception $e) {
                    dd("Insert failed for machine ID $machineId", $e->getMessage());
                }
            }

            if($process){
                return redirect()->route('process.index')->with('success', 'Process created successfully.');
            }
            return redirect()->route('process.index')->with('error', 'Failed to create process.');

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
            $process = Process::with('machines')->findOrFail($id); // include machine relation
            $machines = Machine::where('status', 1)->get();

            return Inertia::render('Masters/Process/Edit', [
                'process' => $process,
                'machines' => $machines,
            ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'process_name' => 'required|string|max:255',
        'status' => 'required|in:0,1',
        'machine_ids' => 'required|array|min:1',
        'machine_ids.*' => 'exists:machines,id',
        ]);

        $process = Process::findOrFail($id);
        $process->update([
            'name' => $request->process_name,
            'status' => $request->status,
        ]);

        // Sync machines
        $process->machines()->sync($request->machine_ids);

        return redirect()->route('process.index')->with('success', 'Process updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $process = Process::findOrFail($id);

        // Detach associated machines (optional if using `sync`)
        $process->machines()->detach();

        // Delete the process
        $process->delete();

        return redirect()->route('process.index')->with('success', 'Process deleted successfully.');
    }
}
