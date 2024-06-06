<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Models\Designation;
use App\Http\Requests\StoreTimesheetRequest;
use App\Http\Requests\UpdateTimesheetRequest;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timesheets = Timesheet::with(['project:id,name', 'employee:id,name,designation'])->get();
        $timesheets->each(function ($timesheet) {
            $des = Designation::where('id',$timesheet->employee->designation)->first();
            $timesheet->employee->designation = $des->name;
        });
        return response()->json($timesheets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $timesheet = Timesheet::create($request->all());
        return response()->json($timesheet, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(Timesheet $timesheet)
    {
        return response()->json($timesheet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Timesheet $timesheet)
    {
        $timesheet->update($request->all());
        return response()->json($timesheet, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timesheet $timesheet)
    {
        $timesheet->delete();
        return response()->json(null, 204);
    }
}
