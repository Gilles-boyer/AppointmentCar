<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvailabilityRequest;
use App\Models\TestCenter;
use App\Models\Vehicle;
use App\Services\AvailabilityService;

class AvailabilityController extends Controller
{
    protected $availabilityService;

    public function __construct(AvailabilityService $availabilityService)
    {
        $this->availabilityService = $availabilityService;
    }

    public function checkAvailability(AvailabilityRequest $request)
    {
        $testCenter = TestCenter::findOrFail($request->test_center_id);
        $vehicle = Vehicle::findOrFail($request->vehicle_id);

        $slotsVehicleAvailable = $this->availabilityService->getAvailableSlotsForVehicle($vehicle,$testCenter);
        return $this->availabilityService->getAvailableSlotsForInstructor($testCenter, $slotsVehicleAvailable, $vehicle);

        $availableSlots = $this->availabilityService->getAvailableSlots($testCenter, $instructor, $vehicle, $date);

        return response()->json(['available_slots' => $availableSlots]);
    }
}
