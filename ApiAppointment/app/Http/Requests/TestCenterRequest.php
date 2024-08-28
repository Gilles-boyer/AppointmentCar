<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestCenterRequest extends FormRequest
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
            'date' => 'required|date',
            'start_time_am' => 'required|date_format:H:i',
            'end_time_am' => 'required|date_format:H:i',
            'start_time_pm' => 'nullable|date_format:H:i',
            'end_time_pm' => 'nullable|date_format:H:i',
            'default_duration' => 'required|integer',
            'banner_image' => 'nullable|string|max:255',
            'logo_image' => 'required|string|max:255',
            'dealership_id' => 'required|exists:dealerships,id',
        ];
    }
}
