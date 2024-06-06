<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCulturePriceRequest;
use App\Http\Requests\UpdateCulturePriceRequest;
use App\Models\CulturePrice;
use Illuminate\Http\Request;

class CulturePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $culturePrices = CulturePrice::all();
        return response()->json($culturePrices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCulturePriceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCulturePriceRequest $request)
    {
        $culturePrice = CulturePrice::create($request->validated());
        return response()->json(['message' => 'Culture Price Created Successfully', 'culture_price' => $culturePrice], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CulturePrice  $culturePrice
     * @return \Illuminate\Http\Response
     */
    public function show(CulturePrice $culturePrice)
    {
        return response()->json($culturePrice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCulturePriceRequest  $request
     * @param  \App\Models\CulturePrice  $culturePrice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCulturePriceRequest $request, CulturePrice $culturePrice)
    {
        $culturePrice->update($request->validated());
        return response()->json(['message' => 'Culture Price Updated Successfully', 'culture_price' => $culturePrice]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CulturePrice  $culturePrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(CulturePrice $culturePrice)
    {
        $culturePrice->delete();
        return response()->json(['message' => 'Culture Price Deleted Successfully']);
    }
}
