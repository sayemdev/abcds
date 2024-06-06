<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Role;
use App\Models\RolePermission;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use Illuminate\Http\Request;
use App\Models\Permission;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::with('permissions')->get();

        return response()->json($modules);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method typically returns a view to create a new module.
        // If you are using API only, you might not need this method.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->name; 
        $role->save();
        $role_id = $role->id;
        
        $permissions=$request->permissions;

        foreach ($permissions as &$permissionData) { // Note the use of "&" to modify the original array
            // $permissionData['role_id'] = $role_id; // Assign role_id to each permission data
            $permission= new RolePermission();
            $permission->role_id=$role_id;
            $permission->permission_id=$permissionData['permission_id'];
            $permission->save();
        }
        

        // RolePermission::insertOrIgnore($permissions);
        return response()->json("Created successfully");

    
    }

    public function editRolePermisssion(Request $request){
        $role_id=$request->id;
        $modules = Module::with('permissions')->get();

        foreach ($modules as $module) {            
            foreach ($module->permissions as $permission) {

                $exists = RolePermission::where('role_id', $role_id)
                                 ->where('permission_id', $permission->id)
                                 ->exists();

                                 if($exists){
                                    $permission->status=true;
                                 }else{
                                    $permission->status=false;
                                 }

            }
        }

        return response()->json($modules);

    }

    /**
     * Display the specified resource.
     */
    public function show(Module $module)
    {
        return response()->json($module);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Module $module)
    {
        // This method typically returns a view to edit the specified module.
        // If you are using API only, you might not need this method.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuleRequest $request, Module $module)
    {
        $validatedData = $request->validated();
        $module->update($validatedData);
        return response()->json($module, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return response()->json(null, 204);
    }
}
