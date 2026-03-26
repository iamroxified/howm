<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'fullname' => 'required|string|max:255',
            // 'matric_no' => 'nullable|string|max:255|unique:students,matric_no',
            // 'phone' => 'nullable|string|max:255',
            'department' => 'required|string|max:255',
            'level' => 'required|in:ND,HND',
            'supervisor' => 'required|string|max:255',
        ];
    }
}
