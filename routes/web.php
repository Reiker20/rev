<?php

use App\Http\Middleware\Admin;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
// use App\Http\Controllers\ViewallmenuController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/create', [AdminController::class, 'create'])->name('create');
    Route::post('/store', [AdminController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
    Route::get('/view-all-menus', [AdminController::class, 'viewAllMenus'])->name('viewAllMenus');
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');
});

Route::post('/orders', [CheckoutController::class, 'processOrder'])->name('checkout');
// buat route admin user
Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/user', [UserController::class, 'users'])->name('users');
    // Route::get('/create', [AdminController::class, 'create'])->name('create');
    // Route::post('/store', [AdminController::class, 'store'])->name('store');
    // Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    // Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    // Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
    // Route::get('/view-all-menus', [AdminController::class, 'viewAllMenus'])->name('viewAllMenus');
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');
});
Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/Orders', [OrdersController::class, 'Orders'])->name('Orders');
    // Route::get('/create', [AdminController::class, 'create'])->name('create');
    // Route::post('/store', [AdminController::class, 'store'])->name('store');
    // Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    // Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    // Route::delete('/destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
    // Route::get('/view-all-menus', [AdminController::class, 'viewAllMenus'])->name('viewAllMenus');
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');
});
Route::get('/cart', [CartController::class, 'view'])->name('chart.view');
require __DIR__ . '/auth.php';