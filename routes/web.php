<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivitiesController;
use Illuminate\Support\Facades\Route;

Route::get('/connexion', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/connexion', [AuthController::class, 'connect'])->middleware('guest');
Route::get('/', [HomeController::class, 'index'])->name('home.index')->middleware('auth');
Route::post('/', [HomeController::class, 'postReminder'])->name('post.reminder')->middleware('auth');

Route::prefix('/activite')
    ->name('activities.')
    ->controller(ActivitiesController::class)
    ->group(function () {

        Route::get('/creer', 'create')->name('create')->middleware('auth');
        Route::post('/creer', 'postCreate')->name('post.create')->middleware('auth');

        Route::get('/{activity}', 'update')
            ->where([
                'activity' => '[0-9]+',
            ])
            ->name('update')
            ->middleware('auth');

        Route::post('/{activity}', 'postUpdate')
            ->where([
                'offer' => '[0-9]+',
            ])
            ->name('post.update')
            ->middleware('auth');

        Route::get('/{activity}/supprimer', 'delete')->name('delete')->middleware('auth');
    });
