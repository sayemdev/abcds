<?php

namespace App\Http\Controllers;

use App\Models\Overtime;
use App\Http\Requests\StoreOvertimeRequest;
use App\Http\Requests\UpdateOvertimeRequest;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $overtimes = Overtime::all();
        return response()->json($overtimes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method is not applicable for API endpoints
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOvertimeRequest $request)
    {
        $validatedData = $request->validated();
        $overtime = Overtime::create($validatedData);
        return response()->json($overtime, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Overtime $overtime)
    {
        return response()->json($overtime);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Overtime $overtime)
    {
        // This method is not applicable for API endpoints
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOvertimeRequest $request, Overtime $overtime)
    {
        $validatedData = $request->validated();
        $overtime->update($validatedData);
        return response()->json($overtime, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Overtime $overtime)
    {
        $overtime->delete();
        return response()->json(null, 204);
    }
}
