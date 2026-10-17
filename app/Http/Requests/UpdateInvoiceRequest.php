<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInvoiceRequest extends FormRequest
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

            'invoice_number' => [
                'sometimes',
                'string',
                'max:255',
                Rule::unique('invoices', 'invoice_number')
                    ->ignore($this->route('invoice')),
            ],

            'subtotal' => [
                'sometimes',
                'numeric',
                'min:0',
            ],

            'tax' => [
                'sometimes',
                'numeric',
                'min:0',
            ],

            'total' => [
                'sometimes',
                'numeric',
                'min:0',
            ],

            'status' => [
                'sometimes',
                'in:draft,sent,paid,cancelled',
            ],

            'issued_at' => [
                'sometimes',
                'nullable',
                'date',
            ],

            'due_at' => [
                'sometimes',
                'nullable',
                'date',
            ],

            'paid_at' => [
                'sometimes',
                'nullable',
                'date',
            ],
        ];
    }
}
