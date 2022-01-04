<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    //
    public function popularAds()
    {
        $ads=Advertisement::all();
        return view('popularads',compact('ads'));
    }
    public function adsDetails($id_ads)
    {
        $details=Advertisement::find($id_ads);
        return view('adsdetails',compact('details'));
    }
    public function allAds()
    {
        $ads=Advertisement::paginate(8);
        return view('allads',compact('ads'));
    }
    
}
