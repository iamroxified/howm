<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'topic_id' => [
                'sometimes',
                'required',
                'exists:topics,id',
                Rule::unique('projects')->ignore($this->project->id),
            ],
            'student_id' => 'sometimes|required|exists:students,id',
            'project_cost' => 'sometimes|required|numeric',
            'amount_paid' => 'sometimes|required|numeric',
            'project_status' => 'sometimes|required|in:pending,in_progress,completed',
            'supervisor_fee' => 'sometimes|nullable|numeric',
            'amt_paid_to_supervisor' => 'sometimes|nullable|numeric',
            'amt_paid_to_developer' => 'sometimes|nullable|numeric',
        ];
    }
}
