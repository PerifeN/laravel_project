<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
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

Route::delete('/productList/{id}', [ProductListController::class, 'destroy'])
    ->middleware('admin')
    ->name('products.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// route do FAQ
Route::get('/faq', function () {
    return view('/quickLinks/faq');
});

// route do formularza kontaktowego
Route::get('/contact-form', function () {
    return view('quickLinks/contact-form');
});

// route do  gdpr
Route::get('/gdpr', function () {
    return view('quickLinks/gdpr');
});

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// kontroler produktów
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('products.addToCart');

Route::get('/cart', [ProductController::class, 'viewCart'])
    ->middleware('auth')
    ->name('cart.view');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// cart increase + i - i usuniecie
Route::post('/cart/increase/{id}', [ProductController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/cart/decrease/{id}', [ProductController::class, 'decreaseQuantity'])->name('cart.decrease');
Route::post('/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');

// suma produktów w koszyku
Route::get('/cart', [ProductController::class, 'showSummary'])
    ->name('cart.view');

// add user 
Route::get('/users/create', [UserController::class, 'createUser'])
    ->middleware('admin')
    ->name('users.create');

Route::post('/users/store', [UserController::class, 'storeUser'])
    ->middleware('admin')
    ->name('users.storeUser');

    // Product list 
    Route::get('/productList', [ProductListController::class, 'index'])
    ->middleware('admin')
    ->name('productList.index');

    Route::get('/productList/create', [ProductListController::class, 'create'])
    ->middleware('admin')
    ->name('productList.create');

    Route::post('/productList/store', [ProductListController::class, 'store'])
    ->middleware('admin')
    ->name('productList.storeProduct');
    
    // Tworzenie i przechowywanie zamowien
Route::get('/order/create', [OrderController::class, 'create'])
    ->middleware('auth')
    ->name('order.create');

Route::post('/order/store', [OrderController::class, 'store'])
    ->middleware('auth')
    ->name('order.store');

    // strona ordrers dla admina 
Route::get('/orders', [OrderController::class, 'index'])
    ->middleware('admin')
    ->name('order.index');

    //zmiana statusu zamowqienia
Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])
    ->middleware('admin')
    ->name('orders.updateStatus');

Route::delete('/orders/{order}', [OrderController::class, 'destroy'])
    ->middleware('admin')
    ->name('orders.destroy');


Route::get('/products/{id}/edit', [ProductListController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductListController::class, 'update'])->name('products.update');
    