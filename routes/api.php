<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Models\Etudiant;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
Route::post("login", [AuthController::class, "login"]);
Route::middleware('auth:api')->group(function () {
    Route::post("logout", [AuthController::class, "logout"]);
   
    //Route::post('etudiants/{etudiant}', [EtudiantController::class, ]);
    Route::get("etudiants/archives", [EtudiantController::class, "trashed"]);
    Route::delete('etudiants/{id}/force-delete', [EtudiantController::class, "forceDelete"]);
    Route::post('etudiants/{id}/restore', [EtudiantController::class, "restore"]);

    Route::post("refresh", [AuthController::class, "refresh"]);
    Route::apiResource('etudiants', EtudiantController::class)->only(['index', 'store','show','destroy','update']);
});