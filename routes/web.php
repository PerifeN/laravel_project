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

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// route do FAQ
Route::get('/faq', function () {
    return view('/quickLinks/faq');
});

// route do formularza kontaktowego
Route::get('/contactForm', function () {
    return view('quickLinks/contact');
});


use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

