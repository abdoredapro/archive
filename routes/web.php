<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\FileClipController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth'],
    'as' => 'dashboard.',
], function() {
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::resource('/category', CategoryController::class);

    Route::resource('/film', FilmController::class);

    Route::resource('/file', FileController::class);

    // add file clip

    Route::get('{file}/clip', [FileClipController::class, 'create'])
    ->name('file_clip.add');

    Route::post('{file}/clip', [FileClipController::class, 'store'])
    ->name('file_clip.store');

    // User settings page
    Route::get('user', [DashboardController::class, 'settings'])
    ->name('settings');

    // Updade User Profile
    Route::put('user/{user_id}', [DashboardController::class, 'update_info'])
    ->name('update_profile');

    Route::resource('/roles', RolesController::class);

    Route::resource('/users', UsersController::class);

    Route::resource('/projects', ProjectController::class);


});


Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
