<?php

use App\Models\Item;
use App\Models\User;
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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('/dashboard', function () {
        if(Auth::user()->teacher_id == NULL) {
            return redirect('/tasks');
        }
        return Inertia\Inertia::render('Dashboard', ['items' => Item::all(), 'users' => User::orderBy('points', 'desc')->get()]);
    })->name('dashboard');
    Route::get('/community', function () {
        return Inertia\Inertia::render('Community', ['items' => Item::all(), 'users' => User::orderBy('points', 'desc')->get()]);
    })->name('community');
    Route::resources([
        'tasks' => \App\Http\Controllers\TaskController::class,
    ]);
    Route::resources([
        'taskDetail' => \App\Http\Controllers\TaskDetail::class,
    ]);

    Route::put('users/{user}', [\App\Http\Controllers\UserController::class, 'update']);
});
