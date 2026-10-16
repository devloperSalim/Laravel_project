<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceReportRequest;
use App\Http\Requests\UpdateServiceReportRequest;
use App\Models\ServiceReport;
use Illuminate\Http\JsonResponse;

class ServiceReportController extends Controller
{
    public function index(): JsonResponse
    {
        $reports = ServiceReport::with([
            'intervention.assignment.serviceRequest',
            'intervention.assignment.technician',
        ])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $reports,
        ]);
    }

    public function show(ServiceReport $serviceReport): JsonResponse
    {
        $serviceReport->load([
            'intervention.assignment.serviceRequest',
            'intervention.assignment.technician',
        ]);

        return response()->json([
            'success' => true,
            'data' => $serviceReport,
        ]);
    }

    public function store(StoreServiceReportRequest $request): JsonResponse
    {
        $serviceReport = ServiceReport::create(
            $request->validated()
        );

        $serviceReport->load([
            'intervention.assignment.serviceRequest',
            'intervention.assignment.technician',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Service report created successfully.',
            'data' => $serviceReport,
        ], 201);
    }

    public function update(
    UpdateServiceReportRequest $request,
    ServiceReport $serviceReport
): JsonResponse {
    $serviceReport->update(
        $request->validated()
    );

    $serviceReport->load([
        'intervention.assignment.serviceRequest',
        'intervention.assignment.technician',
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Service report updated successfully.',
        'data' => $serviceReport,
    ]);
}
public function destroy(ServiceReport $serviceReport): JsonResponse
{
    $serviceReport->delete();

    return response()->json([
        'success' => true,
        'message' => 'Service report deleted successfully.',
    ]);
}
}
