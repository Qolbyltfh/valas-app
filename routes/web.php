<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ValasController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MembershipController;
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
    return redirect('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::middleware('auth')->group(function () {
    Route::resource('valas', ValasController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('memberships', MembershipController::class);
});