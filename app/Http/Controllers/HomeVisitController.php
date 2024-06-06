<?php
namespace App\Http\Controllers;

use App\Models\HomeVisit;
use App\Http\Requests\StoreHomeVisitRequest;
use App\Http\Requests\UpdateHomeVisitRequest;
use Illuminate\Http\Request;
use App\Models\Patient;

class HomeVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Number of items per page
        $homeVisits = HomeVisit::paginate($perPage);
        foreach ($homeVisits as $homeVisit) {
           $patient= Patient::where('id', $homeVisit->patient_id)->first();
            $homeVisit->name= $patient->name;
            $homeVisit->phone= $patient->phone;
            $homeVisit->dob= $patient->dob;
            $homeVisit->gender= $patient->gender;
        }
        return response()->json($homeVisits);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method typically returns a view to create a new home visit.
        // If you are using API only, you might not need this method.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeVisitRequest $request)
    {
        $validatedData = $request->validated();
        $homeVisit = HomeVisit::create($validatedData);
        return response()->json($homeVisit, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeVisit $homeVisit)
    {
        return response()->json($homeVisit);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeVisit $homeVisit)
    {
        // This method typically returns a view to edit the specified home visit.
        // If you are using API only, you might not need this method.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeVisitRequest $request, HomeVisit $homeVisit)
    {
        $validatedData = $request->validated();
        $homeVisit->update($validatedData);
        return response()->json($homeVisit, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeVisit $homeVisit)
    {
        $homeVisit->delete();
        return response()->json(null, 204);
    }
}


?>