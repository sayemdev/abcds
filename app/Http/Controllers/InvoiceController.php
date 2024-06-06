<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with(['tests', 'cultures'])->get();
        return response()->json($invoices);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceRequest $request)
    {
        $validatedData = $request->validated();
        
        // Create the invoice
        $invoice = Invoice::create($validatedData);
        
        // Create invoice tests
        if ($request->has('tests')) {
            foreach ($validatedData['tests'] as $test) {
                $invoice->tests()->attach($test['id'], ['price' => $test['price']]);
            }
        }
        
        if ($request->has('cultures')) {
            foreach ($validatedData['cultures'] as $culture) {
                $invoice->cultures()->attach($culture['id'], ['price' => $culture['price']]);
            }
        }
    
        return response()->json(['message' => 'Invoice created successfully', 'invoice' => $invoice], 201);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('tests', 'cultures');
        return response()->json($invoice);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvoiceRequest  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        $validatedData = $request->validated();
        
        // Update the invoice
        $invoice->update($validatedData);
    
        // Handle the tests
        if ($request->has('tests')) {
            $testData = [];
            foreach ($validatedData['tests'] as $test) {
                $testData[$test['id']] = ['price' => $test['price']];
            }
            $invoice->tests()->sync($testData);
        } else {
            $invoice->tests()->detach();
        }
    
        // Handle the cultures
        if ($request->has('cultures')) {
            $cultureData = [];
            foreach ($validatedData['cultures'] as $culture) {
                $cultureData[$culture['id']] = ['price' => $culture['price']];
            }
            $invoice->cultures()->sync($cultureData);
        } else {
            $invoice->cultures()->detach();
        }
    
        return response()->json(['message' => 'Invoice updated successfully', 'invoice' => $invoice]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return response()->json(['message' => 'Invoice deleted successfully']);
    }
}
