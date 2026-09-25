<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
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
}
