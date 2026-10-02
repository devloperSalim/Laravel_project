<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_request_id' => [
                'required',
                'exists:service_requests,id',
            ],

            'technician_id' => [
                'required',
                'exists:users,id',
            ],

            'assigned_by' => [
                'required',
                'exists:users,id',
            ],

            'assigned_at' => [
                'required',
                'date',
            ],

            'notes' => [
                'nullable',
                'string',
            ],
        ];
    }
}