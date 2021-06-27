<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YakController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/yaks', [YakController::class, 'index'])->name('yaks.index');
Route::get('/yaks/newyak', [YakController::class, 'create'])->name('yaks.create')->middleware('auth');
Route::post('/yaks', [YakController::class, 'store'])->name('yaks.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
