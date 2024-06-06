<?php
namespace App\Http\Controllers;

use App\Models\CustomPolicy;
use App\Models\Employee;
use App\Models\Designation;
use Illuminate\Http\Request;

class CustomPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customPolicies = CustomPolicy::all();
        foreach ($customPolicies as  $value) {
            $employeeIds = $value->employee_ids;
            $employees = Employee::whereIn('id', $employeeIds)->get();
        
            $employeesFormatted = $employees->map(function ($employee) {
                return [
                    'id' => $employee->id,
                    'name' => $employee->name,
                    'designation_id'=>$employee->designation,
                    'designation'=>Designation::where('id',$employee->designation)->first()->name
                ];
            });

            $value->employees=$employeesFormatted;

        }
        return response()->json($customPolicies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomPolicyRequest $request)
    {
        $validated = $request->validated();
        $customPolicy = CustomPolicy::create($validated);
        return response()->json($customPolicy, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomPolicy $customPolicy)
    {

        $employeeIds = $customPolicy->employee_ids;
            $employees = Employee::whereIn('id', $employeeIds)->get();
        
            $employeesFormatted = $employees->map(function ($employee) {
                return [
                    'id' => $employee->id,
                    'name' => $employee->name,
                    'designation_id'=>$employee->designation,
                    'designation'=>Designation::where('id',$employee->designation)->first()->name
                ];
            });

            $customPolicy->employees=$employeesFormatted;


       
    
        return response()->json($customPolicy);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomPolicyRequest $request, CustomPolicy $customPolicy)
    {
        $validated = $request->validated();
        $customPolicy->update($validated);
        return response()->json($customPolicy);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomPolicy $customPolicy)
    {
        $customPolicy->delete();
        return response()->json(null, 204);
    }
}
