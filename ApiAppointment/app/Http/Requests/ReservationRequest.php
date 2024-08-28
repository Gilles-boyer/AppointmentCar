<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
        return [
            'custumer_id' => 'required|exists:custumers,id',
            'test_center_id' => 'required|exists:test_centers,id',
            'instructor_id' => 'required|exists:instructors,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'reservation_time' => 'required|date_format:H:i',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i',
            'client_arrived' => 'boolean',
        ];
    }
}
