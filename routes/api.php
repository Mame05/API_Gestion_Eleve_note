<?php

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EvaluationController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
Route::post("login", [AuthController::class, "login"]);
Route::middleware('auth:api')->group(function () {
    // Déconnexion
    Route::post("logout", [AuthController::class, "logout"]);

    // CRUD Etudiants
    Route::get("etudiants/archives", [EtudiantController::class, "trashed"]);
    Route::delete('etudiants/{id}/force-delete', [EtudiantController::class, "forceDelete"]);
    Route::post('etudiants/{id}/restore', [EtudiantController::class, "restore"]);

    Route::post("refresh", [AuthController::class, "refresh"]);
    Route::apiResource('etudiants', EtudiantController::class)->only(['index', 'store','show','destroy','update']);

    //CRUD Note Etudiant

    Route::post('evaluations', [EvaluationController::class, 'store']);
    Route::put('evaluations/{evaluation}', [EvaluationController::class, 'update']);
    Route::delete('evaluations/{evaluation}', [EvaluationController::class, 'destroy']);
});