<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Invoice;
use Illuminate\Http\JsonResponse;

class InvoiceController extends Controller
{
    public function index(): JsonResponse
    {
        $invoices = Invoice::with([
            'serviceRequest.client',
            'serviceRequest.serviceCategory',
        ])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $invoices,
        ]);
    }

    public function show(Invoice $invoice): JsonResponse
    {
        $invoice->load([
            'serviceRequest.client',
            'serviceRequest.serviceCategory',
        ]);

        return response()->json([
            'success' => true,
            'data' => $invoice,
        ]);
    }

    public function store(StoreInvoiceRequest $request): JsonResponse
    {
        $invoice = Invoice::create(
            $request->validated()
        );

        $invoice->load([
            'serviceRequest.client',
            'serviceRequest.serviceCategory',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Invoice created successfully.',
            'data' => $invoice,
        ], 201);
    }
    public function update(
    UpdateInvoiceRequest $request,
    Invoice $invoice
): JsonResponse {
    $invoice->update(
        $request->validated()
    );

    $invoice->load([
        'serviceRequest.client',
        'serviceRequest.serviceCategory',
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Invoice updated successfully.',
        'data' => $invoice,
    ]);
}

public function destroy(Invoice $invoice): JsonResponse
{
    $invoice->delete();

    return response()->json([
        'success' => true,
        'message' => 'Invoice deleted successfully.',
    ]);
}
}
