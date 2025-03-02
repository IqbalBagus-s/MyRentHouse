<?php

use App\Http\Controllers\Api\BookingTransactionsController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\HouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/city/{city:slug}',[CityController::class, 'show']);
Route::apiResource('/cities', CityController::class);

Route::get('/house/{house:slug}',[HouseController::class, 'show']);
Route::apiResource('/houses', HouseController::class);

Route::post('/booking-transaction', [BookingTransactionsController::class, 'store']);
Route::post('/check-booking', [BookingTransactionsController::class, 'booking_details']);