<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeaveSettingRequest;
use App\Http\Requests\UpdateLeaveSettingRequest;
use App\Models\LeaveSetting;
use Illuminate\Http\Request;

class LeaveSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaveSettings = LeaveSetting::all();
        return response()->json($leaveSettings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveSettingRequest $request)
    {
        $leaveSetting = LeaveSetting::create($request->validated());
        return response()->json($leaveSetting, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveSetting  $leaveSetting
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveSetting $leaveSetting)
    {
        return response()->json($leaveSetting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LeaveSetting  $leaveSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveSettingRequest $request, LeaveSetting $leaveSetting)
    {
        $leaveSetting->update($request->validated());
        return response()->json($leaveSetting);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveSetting  $leaveSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveSetting $leaveSetting)
    {
        $leaveSetting->delete();
        return response()->json(null, 204);
    }
}
