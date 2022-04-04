<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\SetPasswordController;

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
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('tenants', TenantController::class);
    Route::get('/setpassword', [SetPasswordController::class, 'create'])->name('setpassword');
    Route::post('/setpassword', [SetPasswordController::class, 'store'])->name('setpassword.store');
});

Route::get('invite/{user}', [TenantController::class, 'invite'])->name('invite');