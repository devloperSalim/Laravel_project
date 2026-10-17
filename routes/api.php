<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ServiceReportController;
use App\Http\Controllers\ServiceRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/service-requests', [ServiceRequestController::class, 'index']);
Route::get('/service-requests/{serviceRequest}', [ServiceRequestController::class, 'show']);
Route::post(
    '/service-requests',
    [ServiceRequestController::class, 'store']
);

Route::put(
    '/service-requests/{serviceRequest}',
    [ServiceRequestController::class, 'update']
);
Route::delete(
    '/service-requests/{serviceRequest}',
    [ServiceRequestController::class, 'destroy']
);

Route::get('/assignments', [AssignmentController::class, 'index']);

Route::get(
    '/assignments/{assignment}',
    [AssignmentController::class, 'show']
);

Route::post(
    '/assignments',
    [AssignmentController::class, 'store']
);
Route::put(
    '/assignments/{assignment}',
    [AssignmentController::class, 'update']
);

Route::get('/interventions', [InterventionController::class, 'index']);
Route::get('/interventions/{intervention}', [InterventionController::class, 'show']);
Route::post('/interventions', [InterventionController::class, 'store']);
Route::put(
    '/interventions/{intervention}',
    [InterventionController::class, 'update']
);
Route::get('/service-reports', [ServiceReportController::class, 'index']);
Route::get('/service-reports/{serviceReport}', [ServiceReportController::class, 'show']);
Route::post('/service-reports', [ServiceReportController::class, 'store']);
Route::put(
    '/service-reports/{serviceReport}',
    [ServiceReportController::class, 'update']
);
Route::delete(
    '/service-reports/{serviceReport}',
    [ServiceReportController::class, 'destroy']
);
Route::get('/invoices', [InvoiceController::class, 'index']);
Route::get('/invoices/{invoice}', [InvoiceController::class, 'show']);
Route::post('/invoices', [InvoiceController::class, 'store']);
Route::put('/invoices/{invoice}', [InvoiceController::class, 'update']);
Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy']);

Route::get('/attachments', [AttachmentController::class, 'index']);
Route::get('/attachments/{attachment}', [AttachmentController::class, 'show']);
Route::post('/attachments', [AttachmentController::class, 'store']);
Route::delete(
    '/attachments/{attachment}',
    [AttachmentController::class, 'destroy']
);
