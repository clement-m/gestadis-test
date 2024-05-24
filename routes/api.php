<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrainingController;

Route::get('/user', function (Request $request) {
	return $request->user();
})->middleware('auth:sanctum');

Route::get('/student', [StudentController::class, 'index']);
Route::post('/student', [StudentController::class, 'store']);

Route::post('/student/add/training', [StudentController::class, 'addTraining']);

Route::get('/training', [TrainingController::class, 'index']);
