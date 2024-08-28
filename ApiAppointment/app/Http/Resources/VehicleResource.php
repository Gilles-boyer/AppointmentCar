<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'registration_number' => $this->registration_number,
            'model' => $this->model,
            'trim' => $this->trim,
            'automatic_transmission' => $this->automatic_transmission,
            'dealership_id' => $this->dealership,
        ];
    }
}
