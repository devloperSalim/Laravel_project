<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInterventionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assignment_id' => [
                'required',
                'exists:assignments,id',
            ],

            'started_at' => [
                'nullable',
                'date',
            ],

            'completed_at' => [
                'nullable',
                'date',
                'after_or_equal:started_at',
            ],

            'status' => [
                'required',
                'in:scheduled,on_the_way,in_progress,completed,cancelled',
            ],

            'technician_notes' => [
                'nullable',
                'string',
            ],
        ];
    }
}