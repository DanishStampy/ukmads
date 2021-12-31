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

Route::get('aboutus', fn()=> view('aboutus'))->name('aboutus');

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['PreventBackHistory','isAdmin','auth']], function(){
    Route::get('pendingads', [AdminController::class, 'index'])->name('pendingads');
    Route::get('history', [AdminController::class, 'history'])->name('history');

    // Logout
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
    Route::post('/verifiedAds', [AdminController::class, 'verifiedAds'])->name('verifiedAds');
    Route::post('/verifiedEvent', [AdminController::class, 'verifiedEvent'])->name('verifiedEvent');
    // Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
});

Route::group(['prefix' => 'advertiser', 'as' => 'advertiser.', 'middleware' => ['PreventBackHistory','isAdvertiser','auth']], function(){
    Route::get('dashboard', [AdvertiserController::class, 'index'])->name('dashboard');
    Route::get('profile', [AdvertiserController::class, 'profile'])->name('profile');

    // Advertisement
    Route::get('createads', [AdvertiserController::class, 'createads'])->name('createads');
    Route::post('uploadAds',[AdvertiserController::class, 'uploadAds'])->name('uploadAds');

    Route::get('editads/{id_ads}', [AdvertiserController::class, 'editads'])->name('editads');
    Route::post('updateAds/{id_ads}',[AdvertiserController::class, 'updateAds'])->name('updateAds');

    Route::get('deleteAds/{id_ads}', [AdvertiserController::class, 'deleteAds'])->name('deleteAds');

    Route::get('manageads', [AdvertiserController::class, 'manageads'])->name('manageads');

    // Event
    Route::get('createevents', [AdvertiserController::class, 'createevents'])->name('createevents');
    Route::post('uploadEvents',[AdvertiserController::class, 'uploadEvents'])->name('uploadEvents');

    Route::get('editevent/{id_event}', [AdvertiserController::class, 'editevent'])->name('editevent');
    Route::post('updateEvent/{id_event}',[AdvertiserController::class, 'updateEvent'])->name('updateEvent');

    Route::get('deleteEvent/{id_event}', [AdvertiserController::class, 'deleteEvent'])->name('deleteEvent');

    Route::get('manageevents', [AdvertiserController::class, 'manageevents'])->name('manageevents');

    //Draft
    Route::get('draftlist', [AdvertiserController::class, 'draftPreview'])->name('draftlist');

    // Logout
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
});


