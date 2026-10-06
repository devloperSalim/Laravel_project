<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\InterventionController;
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
Route::delete('/interventions/{intervention}', [InterventionController::class, 'destroy']);