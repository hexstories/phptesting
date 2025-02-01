<?php


use App\Http\Controllers\UserAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserAuth::class, 'login']);
Route::post('/register', [UserAuth::class, 'register']);
