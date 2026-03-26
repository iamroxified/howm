<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'topic_id' => 'required|exists:topics,id|unique:projects,topic_id',
            'student_id' => 'required|exists:students,id',
            'project_cost' => 'required|numeric',
            'amount_paid' => 'required|numeric',
            'project_status' => 'required|in:pending,in_progress,completed',
            'supervisor_fee' => 'nullable|numeric',
            'amt_paid_to_supervisor' => 'nullable|numeric',
            'amt_paid_to_developer' => 'nullable|numeric',
        ];
    }
}
