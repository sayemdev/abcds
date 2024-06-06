<?php

namespace App\Http\Controllers;

use App\Models\RolePermission;
use App\Http\Requests\StoreRolePermissionRequest;
use App\Http\Requests\UpdateRolePermissionRequest;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rolePermissions = RolePermission::all();
        return response()->json($rolePermissions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method typically returns a view to create a new role permission.
        // If you are using API only, you might not need this method.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolePermissionRequest $request)
    {
        $validatedData = $request->validated();
        $rolePermission = RolePermission::create($validatedData);
        return response()->json($rolePermission, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(RolePermission $rolePermission)
    {
        return response()->json($rolePermission);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RolePermission $rolePermission)
    {
        // This method typically returns a view to edit the specified role permission.
        // If you are using API only, you might not need this method.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolePermissionRequest $request, RolePermission $rolePermission)
    {
        $validatedData = $request->validated();
        $rolePermission->update($validatedData);
        return response()->json($rolePermission, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RolePermission $rolePermission)
    {
        $rolePermission->delete();
        return response()->json(null, 204);
    }
}
