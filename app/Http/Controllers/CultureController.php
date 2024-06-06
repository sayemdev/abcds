<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCultureRequest;
use App\Http\Requests\UpdateCultureRequest;
use App\Models\Culture;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cultures = Culture::all();
        return response()->json($cultures);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCultureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCultureRequest $request)
    {
        $culture = Culture::create($request->validated());
        return response()->json(['message' => 'Culture Created Successfully', 'culture' => $culture], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Culture  $culture
     * @return \Illuminate\Http\Response
     */
    public function show(Culture $culture)
    {
        return response()->json($culture);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCultureRequest  $request
     * @param  \App\Models\Culture  $culture
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCultureRequest $request, Culture $culture)
    {
        $culture->update($request->validated());
        return response()->json(['message' => 'Culture Updated Successfully', 'culture' => $culture]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Culture  $culture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Culture $culture)
    {
        $culture->delete();
        return response()->json(['message' => 'Culture Deleted Successfully']);
    }
}
