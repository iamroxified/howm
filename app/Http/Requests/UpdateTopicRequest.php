<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTopicRequest extends FormRequest
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
        $topicId = $this->route('topic')->id;

        return [
            'topic' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('topics')->where(function ($query) {
                    return $query->where('department', $this->department)
                                 ->where('level', $this->level);
                })->ignore($topicId),
            ],
            'department' => 'sometimes|required|string|max:255',
            'level' => 'sometimes|required|in:ND,HND',
        ];
    }
}
