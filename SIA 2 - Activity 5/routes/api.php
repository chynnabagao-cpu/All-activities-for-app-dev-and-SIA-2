<?php
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;


Route::prefix('v1')->group(function () {
    // Public routes
    Route::apiResource('users', UserController::class);

    // Protected routes (Sanctum)
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('me', function (Request $request) {
            return response()->json($request->user());
        });
    });
});