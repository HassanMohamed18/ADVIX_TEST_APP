<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestCaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CommentController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::apiResource('projects', ProjectController::class);
Route::apiResource('test-cases', TestCaseController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('media', MediaController::class);
Route::apiResource('comments', CommentController::class);