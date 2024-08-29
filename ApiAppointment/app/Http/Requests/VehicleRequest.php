<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        if(isset($this->vehicle->id)) {
            return [
                'registration_number' => 'required|string|max:255|unique:vehicles,registration_number,' . $this->vehicle->id,
                'model' => 'required|string|max:255',
                'trim' => 'required|string|max:255',
                'automatic_transmission' => 'required|boolean',
                'dealership_id' => 'required|exists:dealerships,id',
            ];
        } else {
            return [
                'registration_number' => 'required|string|max:255|unique:vehicles,registration_number',
                'model' => 'required|string|max:255',
                'trim' => 'required|string|max:255',
                'automatic_transmission' => 'required|boolean',
                'dealership_id' => 'required|exists:dealerships,id',
            ];
        }

    }
}
