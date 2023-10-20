<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\RentController;
use App\Http\Controllers\Api\VehicleController;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('/regist', 'regist');
    Route::post('/login', 'login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/vehicles/{vehicle}/rents', [VehicleController::class, "rentVehicle"]);

    Route::post('/rents/{rent}/approve', [RentController::class, "approve"]);

    Route::get('/dashboards', [DashboardController::class, "getAll"]);

    Route::get("/rents/export", [RentController::class, "export"]);
});
