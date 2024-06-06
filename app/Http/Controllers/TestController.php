<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Test::latest()->where('separated', 1)->get();
        return response()->json($tests, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);
    
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
    
        $testData = [
            'parent_id' => null,
            'category_id' => $request->category_id, // Assuming category_id is passed in the request
            'name' => $request->name,
            'shortcut' => $request->shortcut,
            'sample_type' => $request->sample_type,
            'price' => $request->price,
            'precautions' => $request->precautions,
            'separated' => 1,
        ];
    
        $test = Test::create($testData);
    
        if($request->title){
            foreach($request->title as $item){
                Test::create([
                    'parent_id' => $test->id,
                    'category_id' => $test->category_id, // Ensure category_id is consistent
                    'name' => $item,
                    'title' => 1,
                    'separated' => 0, // Titles should not be separated
                    'price' => null, // Titles should not have a price
                ]);
            }
        }
    
        if($request->component_name){
            $componentFieldData = $request->only('component_name', 'component_unit', 'result', 'reference_range', 'separated', 'component_price');
    
            foreach ($componentFieldData['component_name'] as $key => $value) {
                $separated = isset($componentFieldData['separated'][$key]) ? 1 : 0;
                $price = $separated ? ($componentFieldData['component_price'][$key] ?? 0) : null;
    
                Test::create([
                    'parent_id' => $test->id,
                    'category_id' => $test->category_id, // Ensure category_id is consistent
                    'name' => $componentFieldData['component_name'][$key],
                    'unit' => $componentFieldData['component_unit'][$key],
                    'shortcut' => $test->shortcut,
                    'sample_type' => $test->sample_type,
                    'type' => $componentFieldData['result'][$key],
                    'reference_range' => $componentFieldData['reference_range'][$key],
                    'separated' => $separated,
                    'price' => $price,
                ]);
            }
        }
    
        return response()->json($test, 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $test = Test::find($id);
        if (!$test) {
            return response()->json(['message' => 'Test Not Found'], 404);
        }

        $allTests = Test::where('parent_id', $test->id)
            ->orWhere('id', $test->id)
            ->get();

        return response()->json($allTests, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $test = Test::find($id);
        if (!$test) {
            return response()->json(['message' => 'Test Not Found'], 404);
        }

        $allTests = Test::where('id', $test->id)->orWhere('id', $test->parent_id)->orWhere('parent_id', $test->parent_id)->orWhere('parent_id', $test->id)->get();

        return response()->json($allTests, 200);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        $test = Test::findOrFail($id);
    
        $testData = [
            'parent_id' => null,
            'category_id' => $request->category_id, // Assuming category_id is passed in the request
            'name' => $request->name,
            'shortcut' => $request->shortcut,
            'sample_type' => $request->sample_type,
            'price' => $request->price,
            'precautions' => $request->precautions,
            'separated' => 1,
        ];
    
        $test->update($testData);
    
        // Update titles
        if ($request->title) {
            // Remove old titles
            Test::where('parent_id', $test->id)->where('title', 1)->delete();
    
            // Add new titles
            foreach ($request->title as $item) {
                Test::create([
                    'parent_id' => $test->id,
                    'category_id' => $test->category_id, // Ensure category_id is consistent
                    'name' => $item,
                    'title' => 1,
                    'separated' => 0, // Titles should not be separated
                    'price' => null, // Titles should not have a price
                ]);
            }
        }
    
        // Update components
        if ($request->component_name) {
            // Remove old components
            Test::where('parent_id', $test->id)->where('title', 0)->delete();
    
            // Add new components
            $componentFieldData = $request->only('component_name', 'component_unit', 'result', 'reference_range', 'separated', 'component_price');
    
            foreach ($componentFieldData['component_name'] as $key => $value) {
                $separated = isset($componentFieldData['separated'][$key]) ? 1 : 0;
                $price = $separated ? ($componentFieldData['component_price'][$key] ?? 0) : null;
    
                Test::create([
                    'parent_id' => $test->id,
                    'category_id' => $test->category_id, // Ensure category_id is consistent
                    'name' => $componentFieldData['component_name'][$key],
                    'unit' => $componentFieldData['component_unit'][$key],
                    'shortcut' => $test->shortcut,
                    'sample_type' => $test->sample_type,
                    'type' => $componentFieldData['result'][$key],
                    'reference_range' => $componentFieldData['reference_range'][$key],
                    'separated' => $separated,
                    'price' => $price,
                ]);
            }
        }
    
        return response()->json(['message' => 'Test Updated Successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $test = Test::find($id);
        if (!$test) {
            return response()->json(['message' => 'Test Not Found'], 404);
        }
        $test->delete();
        return response()->json(['message' => 'Test Deleted Successfully'], 200);
    }
}
