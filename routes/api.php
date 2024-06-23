<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientsController;


// we can use the following route instead of writing all the routes
// Route::apiResource('clients', ClientsController::class);




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('clients', [ClientsController::class, 'index']);
Route::post('clients', [ClientsController::class, 'store']);

