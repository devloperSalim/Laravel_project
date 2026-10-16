<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'intervention_id' => [
                'sometimes',
                'exists:interventions,id',
            ],

            'diagnosis' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'work_performed' => [
                'sometimes',
                'string',
            ],

            'parts_used' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'recommendations' => [
                'sometimes',
                'nullable',
                'string',
            ],
        ];
    }
}