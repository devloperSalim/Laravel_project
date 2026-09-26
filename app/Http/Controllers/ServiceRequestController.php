<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\ServiceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index()
    {
        $serviceRequests = ServiceRequest::with([
            'client',
            'serviceCategory',
            'assignments.technician',
            'invoices',
            'attachments',
        ])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $serviceRequests,
        ]);
    }

    public function show(ServiceRequest $serviceRequest)
    {
        $serviceRequest->load([
            'client',
            'serviceCategory',
            'assignments.technician',
            'assignments.intervention.serviceReport',
            'invoices',
            'attachments.uploadedBy',
        ]);

        return response()->json([
            'success' => true,
            'data' => $serviceRequest,
        ]);
    }

    public function store(StoreServiceRequest $request)
{
    $serviceRequest = ServiceRequest::create(
        $request->validated()
    );

    return response()->json([
        'success' => true,
        'message' => 'Service request created successfully.',
        'data' => $serviceRequest,
    ], 201);
}

    public function update(
    UpdateServiceRequest $request,
    ServiceRequest $serviceRequest
): JsonResponse {
    $serviceRequest->update(
        $request->validated()
    );

    $serviceRequest->load([
        'client',
        'serviceCategory',
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Service request updated successfully.',
        'data' => $serviceRequest,
    ]);
}

    public function destroy(ServiceRequest $serviceRequest): JsonResponse
{
    $serviceRequest->delete();

    return response()->json([
        'success' => true,
        'message' => 'Service request deleted successfully.',
    ]);
}
}
