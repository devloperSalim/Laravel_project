<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => [
                'required',
                'exists:users,id',
            ],

            'service_category_id' => [
                'required',
                'exists:service_categories,id',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'required',
                'string',
            ],

            'address' => [
                'required',
                'string',
                'max:255',
            ],

            'city' => [
                'required',
                'string',
                'max:255',
            ],

            'priority' => [
                'required',
                'in:low,medium,high,urgent',
            ],

            'preferred_date' => [
                'nullable',
                'date',
            ],
        ];
    }
}
