<?php

use App\Http\Controllers\FoodieController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// BINAGO: Itinuro natin ang /dashboard sa 'index' method ng ProductController
Route::get('/dashboard', [ProductController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/* Foodie & Other Content Routes */
// PAALALA: Mas ligtas gamitin ang Route::get() para sa mga static pages (About, Contact, etc.)
// pero kung talagang ginawan mo sila ng buong resource controller, iniwan ko silang naka-resource.

Route::resource('/', FoodieController::class); 
Route::resource('/menu', MenuController::class)->names('menus'); 
Route::resource('/about', AboutController::class); 
Route::resource('/services', ServicesController::class); 
Route::resource('/contact', ContactController::class); 
Route::resource('/admin', AdminController::class); 

// Resource route para sa products (gagamitin para sa store at delete actions)
Route::resource('/products', ProductController::class)->names('products');