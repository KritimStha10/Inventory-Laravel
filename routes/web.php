<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\CompanyController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProductPurchaseController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\User\SupplierController;
use App\Http\Controllers\User\TaxController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

//Frontend Route

Route::middleware(['auth', 'verified'])->prefix('dashboard/')->name('user.')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('category',CategoryController::class);
    Route::resource('company',CompanyController::class);
    Route::resource('supplier',SupplierController::class);
    Route::resource('tax',TaxController::class);
    Route::resource('product',ProductController::class);
    Route::resource('purchase',ProductPurchaseController::class);
    Route::resource('setting',SettingController::class);
    



});
