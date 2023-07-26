<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivitiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home-index');
Route::post('/', [HomeController::class, 'postReminder'])->name('post-reminder');

Route::get('/activite/creer', [ActivitiesController::class, 'create'])->name('activities-create');
Route::post('/activite/creer', [ActivitiesController::class, 'postCreate'])->name('post-create');
