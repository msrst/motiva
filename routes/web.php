<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/dashboard', function () {
        return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/community', function () {
        return Inertia\Inertia::render('Community');
    })->name('community');
    Route::resources([
        'tasks' => \App\Http\Controllers\TaskController::class,
    ]);
    Route::resources([
        'taskDetail' => \App\Http\Controllers\TaskDetail::class,
    ]);

    Route::put('users/{user}', [\App\Http\Controllers\UserController::class, 'update']);
});
