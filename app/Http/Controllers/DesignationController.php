<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
use Illuminate\Http\Request;
use App\Models\Department;


class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->per_page!=null){
        $perPage = $request->input('per_page', 10); 
        $designations = Designation::with('department')->paginate($perPage);
        return response()->json($designations);
        }else{
            $designations = Designation::with('department')->get();
        return response()->json($designations); 
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $designation = Designation::create($request->all());
        return response()->json($designation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        $designation->load('department');
        return response()->json($designation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDesignationRequest $request, Designation $designation)
    {
        $designation->update($request->validated());
        return response()->json($designation, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        return response()->json(null, 204);
    }
}
