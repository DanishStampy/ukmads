<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Advertiser\AdvertiserController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});

Route::middleware(['middleware'=>''])->group(function(){
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['','isAdmin','auth']], function(){
    Route::get('pendingads', [AdminController::class, 'index'])->name('pendingads');
    Route::get('history', [AdminController::class, 'history'])->name('history');
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
    // Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
});

Route::group(['prefix' => 'advertiser', 'as' => 'advertiser.', 'middleware' => ['','isAdvertiser','auth']], function(){
    Route::get('dashboard', [AdvertiserController::class, 'index'])->name('dashboard');
    Route::get('profile', [AdvertiserController::class, 'profile'])->name('profile');
    Route::get('createads', [AdvertiserController::class, 'createads'])->name('createads');
    Route::post('uploadAds',[AdvertiserController::class, 'uploadAds'])->name('uploadAds');
    Route::get('manageads', [AdvertiserController::class, 'manageads'])->name('manageads');
    Route::get('createevents', [AdvertiserController::class, 'createevents'])->name('createevents');
    Route::post('uploadEvents',[AdvertiserController::class, 'uploadEvents'])->name('uploadEvents');
    Route::get('manageevents', [AdvertiserController::class, 'manageevents'])->name('manageevents');
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
});


