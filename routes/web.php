<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\Advertiser\AdvertiserController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
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

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/home',[HomeController::class,'index'])->name('home');

Route::group(['as' => 'advertisement.'], function(){
    Route::get('/ads', [AdvertisementController::class,'popularAds'])->name('ads');
    Route::get('/adsdetails/{id_ads}', [AdvertisementController::class,'adsDetails'])->name('adsdetails');
    Route::get('/allads', [AdvertisementController::class,'allAds'])->name('allads');
});

Route::group(['as' => 'event.'], function(){
    Route::get('/event', [EventController::class,'popularEvents'])->name('events');
    Route::get('/eventdetails/{id_event}', [EventController::class,'eventDetails'])->name('eventdetails');
    Route::get('/allevents',  [EventController::class,'allEvents'])->name('allevents');
    Route::post('/joinlist',  [EventController::class,'joinEvents'])->name('joinlist');
});

Route::get('/aboutus', fn()=> view('aboutus'))->name('aboutus');

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});

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

Route::group(['prefix' => 'advertiser', 'as' => 'advertiser.', 'middleware' => ['PreventBackHistory','isAdvertiser','auth']], function(){
    Route::get('dashboard', [AdvertiserController::class, 'index'])->name('dashboard');
    Route::get('profile', [AdvertiserController::class, 'profile'])->name('profile');

    // Advertisement
    Route::get('createads', [AdvertiserController::class, 'createads'])->name('createads');
    Route::post('uploadAds',[AdvertiserController::class, 'uploadAds'])->name('uploadAds');

    Route::get('editads/{id_ads}', [AdvertiserController::class, 'editads'])->name('editads');
    Route::post('updateAds/{id_ads}',[AdvertiserController::class, 'updateAds'])->name('updateAds');

    Route::post('deleteAds', [AdvertiserController::class, 'deleteAds'])->name('deleteAds');

    Route::get('manageads', [AdvertiserController::class, 'manageads'])->name('manageads');

    Route::get('showadspend', [AdvertiserController::class, 'showadspend'])->name('showadspend');
    // Event
    Route::get('createevents', [AdvertiserController::class, 'createevents'])->name('createevents');
    Route::post('uploadEvents',[AdvertiserController::class, 'uploadEvents'])->name('uploadEvents');

    Route::get('editevent/{id_event}', [AdvertiserController::class, 'editevent'])->name('editevent');
    Route::post('updateEvent/{id_event}',[AdvertiserController::class, 'updateEvent'])->name('updateEvent');

    Route::post('deleteEvent', [AdvertiserController::class, 'deleteEvent'])->name('deleteEvent');

    Route::get('manageevents', [AdvertiserController::class, 'manageevents'])->name('manageevents');

    //Draft
    Route::get('draftlist', [AdvertiserController::class, 'draftPreview'])->name('draftlist');

    // Logout
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
});


