<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
    'id' => $this->id,
            'client_id' => $this->custumer,
            'test_center_id' => $this->testCenter,
            'instructor_id' => $this->instructor,
            'vehicle_id' => $this->vehicle,
            'reservation_time' => $this->reservation_time,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'client_arrived' => $this->client_arrived,
        ];
    }
}
