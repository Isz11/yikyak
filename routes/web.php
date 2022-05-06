<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\YakController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\CommunityController;

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
    return redirect('/yaks');
});

Route::get('/yaks', [YakController::class, 'index'])->name('yaks.index');
Route::get('/yaks/newyak', [YakController::class, 'create'])->name('yaks.create')->middleware('auth');
Route::post('/yaks', [YakController::class, 'store'])->name('yaks.store');
Route::get('/yaks/{id}', [YakController::class, 'show'])->name('yaks.show');
Route::delete('/yaks/{id}', [YakController::class, 'destroy'])->name('yaks.destroy')->middleware('auth');;

Route::post('/yaks/{id}', [ReplyController::class, 'store'])->name('replies.store');

Route::get('/communities', [CommunityController::class, 'index'])->name('communities.index');
Route::get('/communities/{id}', [CommunityController::class, 'show'])->name('communities.show');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
