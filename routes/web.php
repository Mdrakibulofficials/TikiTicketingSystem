<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TripController;
use App\Http\Controllers\TicketController;

Route::get('/trips/create', [TripController::class, 'create']);
Route::post('/trips/store', [TripController::class, 'store']);
Route::get('/tickets', [TicketController::class, 'index']);
Route::post('/tickets/purchase', [TicketController::class, 'purchase']);


Route::get('/', function () {
    return view('welcome');
});
