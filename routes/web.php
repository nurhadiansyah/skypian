<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SqlController;
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

Route::resource('/dashboard', DashboardController::class);
Route::resource('/login', LoginController::class);


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/sql', SqlController::class);
    Route::resource('/user', UserController::class);
});
// Route::prefix('/')->group(function () {
//     Route::get('login');
// });
Route::get('/', function () {
    return view('login');
});
