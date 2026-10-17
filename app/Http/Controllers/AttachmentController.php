<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttachmentRequest;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class AttachmentController extends Controller
{
    public function index(): JsonResponse
    {
        $attachments = Attachment::with([
            'serviceRequest.client',
            'uploadedBy',
        ])->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $attachments,
        ]);
    }

    public function show(Attachment $attachment): JsonResponse
    {
        $attachment->load([
            'serviceRequest.client',
            'uploadedBy',
        ]);

        return response()->json([
            'success' => true,
            'data' => $attachment,
        ]);
    }

    public function store(
        StoreAttachmentRequest $request
    ): JsonResponse {
        $file = $request->file('file');

        $path = $file->store('attachments', 'public');

        $attachment = Attachment::create([
            'service_request_id' => $request->validated()['service_request_id'],
            'uploaded_by' => $request->validated()['uploaded_by'],
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
        ]);

        $attachment->load([
            'serviceRequest.client',
            'uploadedBy',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Attachment uploaded successfully.',
            'data' => $attachment,
        ], 201);
    }
    public function destroy(Attachment $attachment): JsonResponse
{
    if ($attachment->file_path) {
        Storage::disk('public')->delete($attachment->file_path);
    }

    $attachment->delete();

    return response()->json([
        'success' => true,
        'message' => 'Attachment deleted successfully.',
    ]);
}
}
