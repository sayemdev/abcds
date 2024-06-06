<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCultureOptionRequest;
use App\Http\Requests\UpdateCultureOptionRequest;
use App\Models\CultureOption;
use Illuminate\Http\Request;

class CultureOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cultureOptions = CultureOption::all();
        $cultureOptions->each(function ($cultureOption) {
            $options = is_array($cultureOption->options) ? $cultureOption->options : json_decode($cultureOption->options);
            $cultureOption->options = $options;
        });
        return response()->json($cultureOptions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCultureOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCultureOptionRequest $request)
{
    $data = $request->validated();
    
    // Check if the 'options' field exists in the request
    if (isset($data['options'])) {
        // If the 'options' field is already an array, use it directly
        $data['options'] = is_array($data['options']) ? $data['options'] : json_decode($data['options']);
    }
    
    $cultureOption = CultureOption::create($data);

    return response()->json(['message' => 'Culture Option Created Successfully', 'culture_option' => $cultureOption], 201);
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CultureOption  $cultureOption
     * @return \Illuminate\Http\Response
     */
    public function show(CultureOption $cultureOption)
    {
        return response()->json($cultureOption);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCultureOptionRequest  $request
     * @param  \App\Models\CultureOption  $cultureOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCultureOptionRequest $request, CultureOption $cultureOption)
    {
        $data = $request->validated();
        
        // Check if the 'options' field exists in the request
        if (isset($data['options'])) {
            // If the 'options' field is already an array, use it directly
            $data['options'] = is_array($data['options']) ? $data['options'] : json_decode($data['options']);
        }
        
        $cultureOption->update($data);
    
        return response()->json(['message' => 'Culture Option Updated Successfully', 'culture_option' => $cultureOption]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CultureOption  $cultureOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(CultureOption $cultureOption)
    {
        $cultureOption->delete();
        return response()->json(['message' => 'Culture Option Deleted Successfully']);
    }
}
