<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationCustumerRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'postal_code' => 'string|max:10',
            'city' => 'string|max:255',
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
