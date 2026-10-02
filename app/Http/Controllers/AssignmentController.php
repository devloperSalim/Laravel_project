<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Models\Assignment;
use Illuminate\Http\JsonResponse;

class AssignmentController extends Controller
{
    public function index(): JsonResponse
    {
        $assignments = Assignment::with([
            'serviceRequest',
            'technician',
            'assignedBy',
            'intervention',
        ])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $assignments,
        ]);
    }

    public function show(Assignment $assignment): JsonResponse
    {
        $assignment->load([
            'serviceRequest',
            'technician',
            'assignedBy',
            'intervention.serviceReport',
        ]);

        return response()->json([
            'success' => true,
            'data' => $assignment,
        ]);
    }


    public function store(StoreAssignmentRequest $request): JsonResponse
{
    $assignment = Assignment::create(
        $request->validated()
    );

    $assignment->load([
        'serviceRequest',
        'technician',
        'assignedBy',
        'intervention',
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Assignment created successfully.',
        'data' => $assignment,
    ], 201);
}

public function update(
    UpdateAssignmentRequest $request,
    Assignment $assignment
): JsonResponse {
    $assignment->update(
        $request->validated()
    );

    $assignment->load([
        'serviceRequest',
        'technician',
        'assignedBy',
        'intervention',
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Assignment updated successfully.',
        'data' => $assignment,
    ]);
}
}
