<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActivitiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/', [HomeController::class, 'postReminder'])->name('post.reminder');

Route::prefix('/activite')
    ->name('activities.')
    ->controller(ActivitiesController::class)
    ->group(function () {

        Route::get('/creer', 'create')->name('create');
        Route::post('/creer', 'postCreate')->name('post.create');

        Route::get('/{activity}', 'update')
            ->where([
                'activity' => '[0-9]+',
            ])
            ->name('update');

        Route::post('/{activity}', 'postUpdate')
            ->where([
                'offer' => '[0-9]+',
            ])
            ->name('post.update');

        Route::get('/{activity}/supprimer', 'delete')->name('delete');
    });
