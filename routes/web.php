<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return redirect()->route('tasks.index');
});
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::get('/task/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::get('/task/{id}', [App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');
Route::get('/task/{id}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/task/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
Route::delete('/task/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');

Route::put('/task/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();
    return redirect()->route('tasks.show', ['id' => $task->id])
                     ->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');


Route::fallback(function () {
    return 'Still got somewhere!';
});