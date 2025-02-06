<?php


use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketCommentController;
use App\Http\Controllers\TicketAttachmentController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/tickets', [TicketController::class, 'index']);
    Route::post('/tickets', [TicketController::class, 'store']);
    Route::get('/tickets/{ticket}', [TicketController::class, 'show']);
    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);
    Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy']);

    Route::post('/tickets/{ticket}/comments', [TicketCommentController::class, 'store']);
    Route::get('/tickets/{ticket}/comments', [TicketCommentController::class, 'index']);

    Route::post('/tickets/{ticket}/attachments', [TicketAttachmentController::class, 'store']);
    Route::get('/attachments/{id}/download', [TicketAttachmentController::class, 'download']);
Route::get('/user', function (Request $request) {
return $request->user();
});
});

