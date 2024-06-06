<?php

namespace App\Http\Controllers;

use App\Models\Antibiotic;
use App\Http\Requests\StoreAntibioticRequest;
use App\Http\Requests\UpdateAntibioticRequest;
use Illuminate\Http\Request;

class AntibioticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); 
        $antibiotics = Antibiotic::paginate($perPage);
        return response()->json($antibiotics);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method typically returns a view to create a new antibiotic.
        // If you are using API only, you might not need this method.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAntibioticRequest $request)
    {
        $validatedData = $request->validated();
        $antibiotic = Antibiotic::create($validatedData);
        return response()->json($antibiotic, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Antibiotic $antibiotic)
    {
        return response()->json($antibiotic);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Antibiotic $antibiotic)
    {
        // This method typically returns a view to edit the specified antibiotic.
        // If you are using API only, you might not need this method.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAntibioticRequest $request, Antibiotic $antibiotic)
    {
        $validatedData = $request->validated();
        $antibiotic->update($validatedData);
        return response()->json($antibiotic, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Antibiotic $antibiotic)
    {
        $antibiotic->delete();
        return response()->json(null, 204);
    }
}
