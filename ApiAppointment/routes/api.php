<?php

use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\CustumerController;
use App\Http\Controllers\DealershipController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TestCenterController;
use App\Http\Controllers\TestCenterInstructorController;
use App\Http\Controllers\TestCenterVehicleController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('custumers', CustumerController::class);
Route::apiResource('dealerships', DealershipController::class);
Route::apiResource('vehicles', VehicleController::class);
Route::apiResource('instructors', InstructorController::class);
Route::apiResource('test_centers', TestCenterController::class);
Route::apiResource('reservations', ReservationController::class);
Route::post('test_center_vehicles', [TestCenterVehicleController::class, 'store']);
Route::delete('test_center_vehicles', [TestCenterVehicleController::class, 'destroy']);
Route::post('test_center_instructors', [TestCenterInstructorController::class, 'store']);
Route::delete('test_center_instructors', [TestCenterInstructorController::class, 'destroy']);
Route::post('check-availability', [AvailabilityController::class, 'checkAvailability']);
Route::post('create_reservation', [ReservationController::class, 'storeWithCustumer']);
