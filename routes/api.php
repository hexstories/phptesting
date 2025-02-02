<?php


use App\Http\Controllers\Auth\UserAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;


Route::post('/login', [UserAuth::class, 'login']);
Route::post('/register', [UserAuth::class, 'register']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index']);
    Route::post('/tickets', [TicketController::class, 'store']);
    Route::get('/tickets/{ticket}', [TicketController::class, 'show']);
    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy']);
Route::get('/user', function (Request $request) {
return $request->user();
});
});

