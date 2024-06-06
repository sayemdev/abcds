<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use App\Models\Designation;
use App\Models\LeaveSetting;
use App\Http\Requests\StoreLeaveRequestRequest;
use App\Http\Requests\UpdateLeaveRequestRequest;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::all();
        $processedLeaveRequests = [];
    
        foreach ($leaveRequests as $leaveRequest) {
            $employee = Employee::with('designation')->find($leaveRequest->employee_id);
            $leave = LeaveSetting::where('id', $leaveRequest->leave_id)->first();
    
            $employeeName = $employee ? $employee->name : null;
            $designation = $employee ? Designation::where('id', $employee->designation)->first()->name : null;
    
            $leaveRequest->setAttribute('employee_name', $employeeName);
            $leaveRequest->setAttribute('designation', $designation);
            $leaveRequest->setAttribute('leave_type', $leave ? $leave->name : null);
    
            $processedLeaveRequests[] = $leaveRequest;
        }
    
        return response()->json($processedLeaveRequests);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveRequestRequest $request)
    {
        $validatedData = $request->validated();
        $leaveRequest = LeaveRequest::create($validatedData);
        return response()->json($leaveRequest, 201);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveRequestRequest $request, LeaveRequest $leaveRequest)
    {
        $validatedData = $request->validated();
        $leaveRequest->update($validatedData);
        return response()->json($leaveRequest, 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaveRequest $leaveRequest)
    {
        $leaveRequest->delete();
        return response()->json(null, 204);
    }
}
