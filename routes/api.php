<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::get('health', function(){ return ['status' => 'ok']; });

    // Auth
    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

    // Protected routes
    Route::middleware(['auth:sanctum'])->group(function(){
        Route::get('user', function(\Illuminate\Http\Request $request){ return $request->user(); });
        // Lead assignment
        Route::post('leads/{lead}/assign', [\App\Http\Controllers\Api\LeadController::class, 'assign']);

        // Add more protected endpoints here
    });
});
