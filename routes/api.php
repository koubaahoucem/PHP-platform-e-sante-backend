<?php

use App\Http\Controllers\MedicamemtController;
use App\Http\Controllers\OrdonnnaceController;
use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PharmacienController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::resource('pharmaciens', PharmacienController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('patients', PatientController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('ordonnances', OrdonnnaceController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('medicaments', MedicamemtController::class);
});
