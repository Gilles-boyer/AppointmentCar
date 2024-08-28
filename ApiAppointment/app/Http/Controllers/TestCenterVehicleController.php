<?php

namespace App\Http\Controllers;

use App\Models\TestCenterVehicle;
use App\Http\Requests\TestCenterVehicleRequest;
use App\Models\TestCenter;
use App\Models\Vehicle;

class TestCenterVehicleController extends Controller
{
    public function store(TestCenterVehicleRequest $request)
    {
        $testCenter = TestCenter::findOrFail($request->test_center_id);
        $vehicle = Vehicle::findOrFail($request->vehicle_id);

        $testCenter->vehicles()->attach($vehicle);

        return response()->json(['message' => 'Vehicle added to Test Center successfully.'], 201);
    }

    public function destroy(TestCenterVehicleRequest $request)
    {
        $testCenter = TestCenter::findOrFail($request->test_center_id);
        $vehicle = Vehicle::findOrFail($request->vehicle_id);

        $testCenter->vehicles()->detach($vehicle);

        return response()->json(['message' => 'Vehicle removed from Test Center successfully.'], 200);
    }
}
