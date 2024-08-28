<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestCenterInstructorRequest extends FormRequest
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
            'test_center_id' => 'required|exists:test_centers,id',
            'instructor_id' => 'required|exists:instructors,id',

        ];
    }
}
