<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInterventionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assignment_id' => [
                'sometimes',
                'exists:assignments,id',
            ],

            'started_at' => [
                'sometimes',
                'nullable',
                'date',
            ],

            'completed_at' => [
                'sometimes',
                'nullable',
                'date',
                'after_or_equal:started_at',
            ],

            'status' => [
                'sometimes',
                'in:scheduled,on_the_way,in_progress,completed,cancelled',
            ],

            'technician_notes' => [
                'sometimes',
                'nullable',
                'string',
            ],
        ];
    }
}