<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvertiserController extends Controller
{
    public function index(){
        return view('dashboards.advertiser.index');
    }

    public function profile(){
        return view('dashboards.advertiser.profile');
    }

    public function createads(){
        return view('dashboards.advertiser.createads');
    }
    public function manageads(){
        return view('dashboards.advertiser.manageads');
    }
    public function createevents(){
        return view('dashboards.advertiser.createevents');
    }
    public function manageevents(){
        return view('dashboards.advertiser.manageevents');
    }
}

