<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

/* Users */
Route::get('/users', [UserController::class, 'index'])
    ->middleware('admin')
    ->name('users.index');

Route::delete('/users/{id}', [UserController::class, 'destroy'])
    ->middleware('admin')
    ->name('users.destroy');

Route::get('/users/{id}/edit', [UserController::class, 'edit'])
    ->middleware('admin')
    ->name('users.edit');

Route::put('/users/{id}', [UserController::class, 'update'])
    ->middleware('admin')
    ->name('users.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
