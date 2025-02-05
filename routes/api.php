<?php


use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index']);

    Route::get('/tickets/{ticket}', [TicketController::class, 'show']);
    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy']);
Route::get('/user', function (Request $request) {
return $request->user();
});
});

