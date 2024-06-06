<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestPriceRequest;
use App\Http\Requests\UpdateTestPriceRequest;
use App\Models\TestPrice;
use Illuminate\Http\Request;

class TestPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testPrices = TestPrice::all();
        return response()->json($testPrices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTestPriceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestPriceRequest $request)
    {
        $testPrice = TestPrice::create($request->validated());
        return response()->json(['message' => 'Test Price Created Successfully', 'test_price' => $testPrice], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestPrice  $testPrice
     * @return \Illuminate\Http\Response
     */
    public function show(TestPrice $testPrice)
    {
        return response()->json($testPrice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestPriceRequest  $request
     * @param  \App\Models\TestPrice  $testPrice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestPriceRequest $request, TestPrice $testPrice)
    {
        $testPrice->update($request->validated());
        return response()->json(['message' => 'Test Price Updated Successfully', 'test_price' => $testPrice]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestPrice  $testPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestPrice $testPrice)
    {
        $testPrice->delete();
        return response()->json(['message' => 'Test Price Deleted Successfully']);
    }
}
