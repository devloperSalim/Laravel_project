<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_category_id' => [
                'sometimes',
                'exists:service_categories,id',
            ],

            'title' => [
                'sometimes',
                'string',
                'max:255',
            ],

            'description' => [
                'sometimes',
                'string',
            ],

            'address' => [
                'sometimes',
                'string',
                'max:255',
            ],

            'city' => [
                'sometimes',
                'string',
                'max:255',
            ],

            'priority' => [
                'sometimes',
                'in:low,medium,high,urgent',
            ],

            'status' => [
                'sometimes',
                'in:pending,assigned,in_progress,completed,cancelled',
            ],

            'preferred_date' => [
                'nullable',
                'date',
            ],
        ];
    }
}
