<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationCustumerRequest;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Custumer;
use App\Models\TestCenter;
use App\Services\AvailabilityService;

class ReservationController extends Controller
{
    protected $availabilityService;

    public function __construct(AvailabilityService $availabilityService)
    {
        $this->availabilityService = $availabilityService;
    }

    public function index()
    {
        return ReservationResource::collection(Reservation::all());
    }

    public function store(ReservationRequest $request)
    {
        $reservation = Reservation::create($request->validated());
        return new ReservationResource($reservation);
    }

    public function storeWithCustumer(ReservationCustumerRequest $request)
    {
        $testCenter = TestCenter::findOrFail($request->validated('test_center_id'));

        if(!$this->availabilityService->verifyTimeSlotsExists($testCenter, $request->validated("reservation_time"))){
            return response()->json([
                "error" => true,
                "message" => "Merci de vérifier le créneau horaire"
            ],404);
        }

        if(!$this->availabilityService->checkIfSlotIsAvailable($testCenter, $request->validated("reservation_time"))) {
            return response()->json([
                "error" => true,
                "message" => "Le créneau demandé n'est plus disponible"
            ],404);
        }

        if(!$this->availabilityService->checkVehicleAvaible($testCenter, $request->validated("reservation_time"), $request->validated('vehicle_id'))) {
            return response()->json([
                "error" => true,
                "message" => "La voiture demandé n'est plus disponible"
            ],404);
        }

        $custumer = Custumer::create($request->validated());
        $reservation = new Reservation();

        $reservation->custumer_id = $custumer->id;
        $reservation->test_center_id = $request->validated('test_center_id');
        $reservation->instructor_id = $request->validated("instructor_id");
        $reservation->reservation_time = $request->validated("reservation_time");
        $reservation->vehicle_id = $request->validated('vehicle_id');

        $reservation->save();

        return new ReservationResource($reservation);
    }

    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation);
    }

    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $reservation->update($request->validated());
        return new ReservationResource($reservation);
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->noContent();
    }
}
