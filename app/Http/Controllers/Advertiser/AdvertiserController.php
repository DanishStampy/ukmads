<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdvertiserController extends Controller
{
    public function index(){
        return view('dashboards.advertiser.index');
    }

    public function profile(){
        return view('dashboards.advertiser.profile');
    }
}
