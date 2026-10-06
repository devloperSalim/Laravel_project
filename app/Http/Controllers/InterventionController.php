<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInterventionRequest;
use App\Http\Requests\UpdateInterventionRequest;
use App\Models\Intervention;
use Illuminate\Http\JsonResponse;

class InterventionController extends Controller
{
    public function index(): JsonResponse
    {
        $interventions = Intervention::with([
            'assignment.serviceRequest',
            'assignment.technician',
            'assignment.assignedBy',
            'serviceReport',
        ])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $interventions,
        ]);
    }

    public function show(Intervention $intervention): JsonResponse
    {
        $intervention->load([
            'assignment.serviceRequest',
            'assignment.technician',
            'assignment.assignedBy',
            'serviceReport',
        ]);

        return response()->json([
            'success' => true,
            'data' => $intervention,
        ]);
    }

    public function store(StoreInterventionRequest $request): JsonResponse
    {
        $intervention = Intervention::create(
            $request->validated()
        );

        $intervention->load([
            'assignment.serviceRequest',
            'assignment.technician',
            'assignment.assignedBy',
            'serviceReport',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Intervention created successfully.',
            'data' => $intervention,
        ], 201);
    }

    public function update(
    UpdateInterventionRequest $request,
    Intervention $intervention
): JsonResponse {
    $intervention->update(
        $request->validated()
    );

    $intervention->load([
        'assignment.serviceRequest',
        'assignment.technician',
        'assignment.assignedBy',
        'serviceReport',
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Intervention updated successfully.',
        'data' => $intervention,
    ]);
}

public function destroy(Intervention $intervention): JsonResponse
{
    $intervention->delete();

    return response()->json([
        'success' => true,
        'message' => 'Intervention deleted successfully.',
    ]);
}
}
