<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    //
    public function incrementReadCount(){
        return $this->reads++;
    }
    public function popularAds()
    {
        $newestAds = Advertisement::where('status', 'verified')->latest()->take(4)->get();
        $popularAds = Advertisement::where('status', 'verified')->orderBy('reads', 'desc')->limit(3)->get();
        return view('popularads',compact('popularAds', 'newestAds'));
    }
    public function adsDetails($id_ads)
    {
        $details = Advertisement::find($id_ads);
        $details->reads++;
        $details->save();
        return view('adsdetails',compact('details'));
    }
    public function allAds()
    {
        $ads = Advertisement::where('status', 'verified')->paginate(8);
        return view('allads',compact('ads'));
    }
    
}
