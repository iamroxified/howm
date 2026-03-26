<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'fullname' => 'sometimes|required|string|max:255',
            'matric_no' => 'sometimes|required|string|unique:students,matric_no,' . $this->student->id,
            'phone' => 'sometimes|required|string|max:255',
            'department' => 'sometimes|required|string|max:255',
            'level' => 'sometimes|required|in:ND,HND',
            'supervisor' => 'sometimes|required|string|max:255',
        ];
    }
}
