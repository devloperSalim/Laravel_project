<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoiceRequest extends FormRequest
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

            'invoice_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('invoices', 'invoice_number'),
            ],

            'subtotal' => [
                'required',
                'numeric',
                'min:0',
            ],

            'tax' => [
                'sometimes',
                'numeric',
                'min:0',
            ],

            'total' => [
                'required',
                'numeric',
                'min:0',
            ],

            'status' => [
                'sometimes',
                'in:draft,sent,paid,cancelled',
            ],

            'issued_at' => [
                'nullable',
                'date',
            ],

            'due_at' => [
                'nullable',
                'date',
            ],

            'paid_at' => [
                'nullable',
                'date',
            ],
        ];
    }
}
