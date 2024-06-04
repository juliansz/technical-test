<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () { return redirect()->route('Tasks'); });
Route::prefix('/tasks')->group(function () {
    Route::get('/', [TaskController::class, 'getIndex'])->name('Tasks');
    Route::post('/update-order', [TaskController::class, 'postUpdateTasksPriority'])->name('UpdateTasksPriority');
    Route::get('/create', [TaskController::class, 'getCreate']);
    Route::post('/create', [TaskController::class, 'postCreate'])->name('CreateTask');
    Route::get('/{task}/update', [TaskController::class, 'getUpdate']);
    Route::post('/{task}/update', [TaskController::class, 'postUpdate'])->name('UpdateTask');
    Route::post('/{task}/delete', [TaskController::class, 'postDelete'])->name('DeleteTask');
});