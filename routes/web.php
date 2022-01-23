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

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
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

// Customize Org Registration
Route::group(['as' => 'org.', 'middleware' => ['PreventBackHistory']], function(){
    Route::get('register-org', [OrgRegisterController::class, 'showRegistration'])->name('form');
    Route::post('post-org', [OrgRegisterController::class, 'postRegistration'])->name('post');
});


// Organizer
Route::group(['prefix' => 'organization', 'as' => 'organizer.', 'middleware' => ['PreventBackHistory','isOrgs','auth','secure']] ,function(){
    Route::get('dashboard', [OrganizerController::class, 'index'])->name('dashboard');
    Route::get('profile', [OrganizerController::class, 'profile'])->name('profile');
    
    // Event
    Route::get('createevents', [OrganizerController::class, 'createevents'])->name('createevents');
    Route::post('uploadEvents',[OrganizerController::class, 'uploadEvents'])->name('uploadEvents');

    Route::get('editevent/{id_event}', [OrganizerController::class, 'editevent'])->name('editevent');
    Route::post('updateEvent/{id_event}',[OrganizerController::class, 'updateEvent'])->name('updateEvent');

    Route::post('deleteEvent', [OrganizerController::class, 'deleteEvent'])->name('deleteEvent');

    Route::get('manageevents', [OrganizerController::class, 'manageevents'])->name('manageevents');

    // List
    Route::get('joinList/{id_event}', [OrganizerController::class, 'joinListPreview'])->name('listevent');
    Route::get('exportList', [OrganizerController::class, 'exportJoinList'])->name('listexport');

    // Payment
    Route::get('checkout', [PaymentController::class, 'index'])->name('checkout');
    Route::post('payment', [PaymentController::class, 'paymentPost'])->name('payment');

    //Draft
    Route::get('draftlist', [OrganizerController::class, 'draftPreview'])->name('draftlist');

    // Logout
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
});


// Advertiser
Route::group(['prefix' => 'advertiser', 'as' => 'advertiser.', 'middleware' => ['PreventBackHistory','isAdvertiser','auth','secure']], function(){
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

    // Payment
    Route::get('checkout', [PaymentController::class, 'index'])->name('checkout');
    Route::post('payment', [PaymentController::class, 'paymentPost'])->name('payment');

    // Draft
    Route::get('draftlist', [AdvertiserController::class, 'draftPreview'])->name('draftlist');

    // Logout
    Route::get('logout', [LogoutController::class, 'perform'])->name('logout');
});


