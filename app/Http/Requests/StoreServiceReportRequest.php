<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'intervention_id' => [
                'required',
                'exists:interventions,id',
            ],

            'diagnosis' => [
                'nullable',
                'string',
            ],

            'work_performed' => [
                'required',
                'string',
            ],

            'parts_used' => [
                'nullable',
                'string',
            ],

            'recommendations' => [
                'nullable',
                'string',
            ],
        ];
    }
}