<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\HTTP\Controllers\SigninController;
use App\HTTP\Controllers\TaskController; 

Route::get('/',[SigninController::class, 'index']);
Route::post('/signin',[SigninController::class, 'signin']);
Route::get('/task',[TaskController::class, 'index']);
Route::post('/task',[TaskController::class, 'store']);
Route::delete('/task/{task}', [TaskController::class, 'destroy']);
Route::patch('/task/{task}', [TaskController::class, 'update']);
Route::put('/done/{id}', [TaskController::class, 'isdone']);
Auth::routes();
