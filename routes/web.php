<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TaskController;

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


// get the list of all tasks
Route::get('/tasks', [TaskController::class, 'get']);
// add a new task
Route::post('/tasks', [TaskController::class, 'add']);
// mark a task as completed
Route::patch('/tasks/{id}', [TaskController::class, 'toggle'])->where('id', '[0-9]+');
// delete a task
Route::delete('/tasks/{id}', [TaskController::class, 'delete'])->where('id', '[0-9]+');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
