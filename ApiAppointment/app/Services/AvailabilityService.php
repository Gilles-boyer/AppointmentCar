<?php
namespace App\Services;

use App\Models\Reservation;
use App\Models\Vehicle;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateTime;

class AvailabilityService
{


    public function getAvailableSlotsForVehicle($vehicle, $testCenter)
    {
        $slots = $this->generateTimeSlots($testCenter);
        $vehicleReservations = Reservation::where('vehicle_id', $vehicle->id)->where('test_center_id', $testCenter->id)->get();
        return $this->slotsAvailableVehicle($vehicleReservations,$slots);
    }

    public function slotsAvailableVehicle($vehicleReservations, $slots)
    {
        foreach($slots as $key => $slot) {
            foreach($vehicleReservations as $reservation) {
                if( $reservation->reservation_time == $slot) {
                    unset($slots[$key]);
                }
            }
        }
        return $slots;
    }

    public function getAvailableSlotsForInstructor($testCenter, $slotsVehicleAvailable, $vehicle)
    {
        $instructors = $testCenter->instructors;

        foreach($instructors as $key => $instructor) {
            $instructors[$key] = $this->slotsAvailableInsttructor($instructor, $slotsVehicleAvailable, $testCenter);
            $instructors[$key]['vehicle'] = $vehicle;
        }

        return $instructors;
    }

    public function slotsAvailableInsttructor($instructor, $slotsVehicleAvailable, $testCenter)
    {
        $reservations = Reservation::where('instructor_id', $instructor->id)->where('test_center_id', $testCenter->id)->get();

        foreach($slotsVehicleAvailable as $key => $slot) {
            foreach($reservations as $reservation) {
                if( $reservation->reservation_time == $slot) {
                    unset($slotsVehicleAvailable[$key]);
                }
            }
        }
        $instructor["slotAvailable"] = $slotsVehicleAvailable;
        return $instructor;
    }

    private function generateTimeSlots($testCenter)
    {
        $duration = $testCenter->default_duration;
        $slots = [];

        $periods = [
            ['start' => $testCenter->start_time_am, 'end' => $testCenter->end_time_am],
            ['start' => $testCenter->start_time_pm, 'end' => $testCenter->end_time_pm]
        ];

        foreach ($periods as $period) {
            if ($period['start'] && $period['end']) {
                $start = Carbon::parse($period['start']);
                $end = Carbon::parse($period['end']);

                while ($start <= $end) {
                    $slots[] = $start->copy()->format('H:i:s');
                    $start->addMinutes($duration);
                }
            }
        }

        return $slots;
    }

    public function verifyTimeSlotsExists($testCenter, $time)
    {
        $time = Carbon::parse($time);
        $time = $time->copy()->format('H:i:s');
        $result = false;
        $slots = $this->generateTimeSlots($testCenter);
        foreach($slots as $slot) {
            if($time == $slot) {
                $result = true;
            }
        }

        return $result;
    }

    public function checkIfSlotIsAvailable($testCenter, $time)
    {
        $time = Carbon::parse($time);
        $time = $time->copy()->format('H:i:s');
        $maxSlot = count($testCenter->instructors);
        $reservations = array_filter($testCenter->reservations->toArray(), function($reservation) use ($time) { return $reservation['reservation_time'] == $time; });
        $nbrReservation = count($reservations);

        if($nbrReservation < $maxSlot) {
            return true;
        } else {
            return false;
        }
    }

    public function checkVehicleAvaible($testCenter, $time, $Vehicle_id) {
        $time = Carbon::parse($time);
        $time = $time->copy()->format('H:i:s');
        $reservations = array_filter($testCenter->reservations->toArray(), function($reservation) use ($time, $Vehicle_id) { return $reservation['reservation_time'] == $time && $reservation['vehicle_id'] == $Vehicle_id; });
        if(count($reservations) > 0) {
            return false;
        }
        return true;
    }
}
