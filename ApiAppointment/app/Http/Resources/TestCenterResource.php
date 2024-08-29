<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestCenterResource extends JsonResource
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
            'date' => $this->date,
            'start_time_am' => $this->start_time_am,
            'end_time_am' => $this->end_time_am,
            'start_time_pm' => $this->start_time_pm,
            'end_time_pm' => $this->end_time_pm,
            'default_duration' => $this->default_duration,
            'banner_image' => $this->banner_image,
            'logo_image' => $this->logo_image,
            'dealership' => $this->dealership,
            'vehicles' => $this->vehicles,
            'instructors' => $this->instructors
        ];
    }
}
