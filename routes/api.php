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

Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('pharmaciens', PharmacienController::class);
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('patients', PatientController::class);
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('ordonnances', OrdonnnaceController::class);
});

Route::group(['middleware' => ['auth:api']], function () {
    Route::resource('medicaments', MedicamemtController::class);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'users'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refreshToken', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
Route::get('users/verify-email', [AuthController::class, 'verifyEmail'])->name('verify.email');
