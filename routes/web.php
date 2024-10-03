<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'home', ['title' => 'Home', 'header' => 'To Do List',]);
Route::view('/about', 'about', ['title' => 'About','header' => 'About me',]);
Route::resource('/', ScheduleController::class);
Route::post('/schedule/update', [ScheduleController::class, 'update'])->name('schedule.update');
Route::delete('/schedule/delete', [ScheduleController::class, 'destroy'])->name('schedule.delete');