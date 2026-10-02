<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssignmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_request_id' => [
                'sometimes',
                'exists:service_requests,id',
            ],

            'technician_id' => [
                'sometimes',
                'exists:users,id',
            ],

            'assigned_by' => [
                'sometimes',
                'exists:users,id',
            ],

            'assigned_at' => [
                'sometimes',
                'date',
            ],

            'notes' => [
                'nullable',
                'string',
            ],
        ];
    }
}