<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceRequestController;

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
