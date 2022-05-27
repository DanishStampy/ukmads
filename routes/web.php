<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Advertiser\AdvertiserController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\OrgRegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Organizer\OrganizerController;
use App\Http\Controllers\Payment\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\URL;

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

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/home',[HomeController::class,'index'])->name('home');

// Search
Route::get('/searchads', [SearchController::class, 'searchads'])->name('web.searchads');
Route::get('/searchevents', [SearchController::class, 'searchevents'])->name('web.searchevents');
Route::get('/searchadsV', [SearchController::class, 'searchadsV'])->name('web.searchadsV');
Route::get('/searcheventsV', [SearchController::class, 'searcheventsV'])->name('web.searcheventsV');

// Testing view
Route::get('/testview', fn()=> view('testview'))->name('testview');


// Ads view
Route::group(['as' => 'advertisement.'], function(){
    Route::get('/ads', [AdvertisementController::class,'popularAds'])->name('ads');
    Route::get('/adsdetails/{id_ads}', [AdvertisementController::class,'adsDetails'])->name('adsdetails');
    Route::get('/allads', [AdvertisementController::class,'allAds'])->name('allads');
});

// Event view
Route::group(['as' => 'event.'], function(){
    Route::get('/event', [EventController::class,'popularEvents'])->name('events');
    Route::get('/eventdetails/{id_event}', [EventController::class,'eventDetails'])->name('eventdetails');
    Route::get('/allevents',  [EventController::class,'allEvents'])->name('allevents');
    Route::post('/joinlist',  [EventController::class,'joinEvents'])->name('joinlist');
});

Route::get('/aboutus', fn()=> view('aboutus'))->name('aboutus');

Route::middleware(['middleware'=>'PreventBackHistory', 'secure'])->group(function(){
    Auth::routes();
});

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['PreventBackHistory','isAdmin','auth']], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('pendingads', [AdminController::class, 'pendingads'])->name('pendingads');
    Route::get('history', [AdminController::class, 'history'])->name('history');

    // Logout
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
    Route::post('/verifiedAds', [AdminController::class, 'verifiedAds'])->name('verifiedAds');
    Route::post('/verifiedEvent', [AdminController::class, 'verifiedEvent'])->name('verifiedEvent');
    // Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
});





