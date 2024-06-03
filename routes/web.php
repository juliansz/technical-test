<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'getIndex']);
Route::post('/update-order', [TaskController::class, 'postUpdateTasksPriority'])->name('UpdateTasksPriority');
