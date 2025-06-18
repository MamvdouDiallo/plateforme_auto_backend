<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/marques", [\App\Http\Controllers\MarqueController::class, "index"]);
Route::get("/marques/{id}/vehicules", [\App\Http\Controllers\CategoryController::class, "getVehicules"]);
Route::get("/marques/{marque_id}/models/{model_id}/vehicules", [\App\Http\Controllers\CategoryController::class, "getVehicules"]);


Route::get("/categories", [\App\Http\Controllers\CategoryController::class, "index"]);
Route::get("/categories/{id}/vehicules", [\App\Http\Controllers\CategoryController::class, "getVehicules"]);

Route::get("/models", [\App\Http\Controllers\ModelController::class, "index"]);
Route::get("/models/{id}/vehicules", [\App\Http\Controllers\ModelController::class, "getVehicules"]);

Route::get("/vehicules", [\App\Http\Controllers\VehiculeController::class, "index"]);
Route::get("/vehicules/{vehicule}", [\App\Http\Controllers\VehiculeController::class, "show"]);
