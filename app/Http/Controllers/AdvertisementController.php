<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    //
    public function incrementReadCount()
    {
        return $this->reads++;
    }
    public function popularAds()
    {
        $newestAds = Advertisement::where('status', 'verified')->latest()->take(4)->get();
        $popularAds = Advertisement::where('status', 'verified')->orderBy('reads', 'desc')->limit(3)->get();
        return view('popularads', compact('popularAds', 'newestAds'));
    }
    public function adsDetails($id_ads)
    {
        $details = Advertisement::find($id_ads);
        $details->reads++;
        $details->save();
        return view('adsdetails', compact('details'));
    }
    public function allAds(Request $request)
    {

        $sort = $request->input('sort');

        switch ($sort) {
            case 'newest':
                $ads = Advertisement::where('status', 'verified')->orderBy('updated_at', 'DESC')->paginate(8);
                break;

            case 'popular':
                $ads = Advertisement::where('status', 'verified')->orderBy('reads', 'DESC')->paginate(8);
                break;

            case 'price_asc':
                $ads = Advertisement::where('status', 'verified')->orderBy('price', 'ASC')->paginate(8);
                break;

            case 'price_desc':
                $ads = Advertisement::where('status', 'verified')->orderBy('price', 'DESC')->paginate(8);
                break;

            case 'Food':
                $ads = Advertisement::where('status', 'verified')->where('type', $sort)->paginate(8);
                break;

            case 'Rental':
                $ads = Advertisement::where('status', 'verified')->where('type', $sort)->paginate(8);
                break;

            case 'Product':
                $ads = Advertisement::where('status', 'verified')->where('type', $sort)->paginate(8);
                break;

            default:
                $ads = Advertisement::where('status', 'verified')->paginate(8);
                break;
        }
        
        $ads->appends($request->all());
        return view('allads', compact('ads'));
    }
}
