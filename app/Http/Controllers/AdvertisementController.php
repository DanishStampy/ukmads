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
        $price = $request->input('price');

        if (!empty($price)) {

            switch ($price) {
                case 'price_desc':
                    $ads = $this->getAdsStatus()->orderBy('price', 'DESC');
                    break;
                case 'price_asc':
                    $ads = $this->getAdsStatus()->orderBy('price', 'ASC');
                    break;
            }

            switch ($sort) {
                case 'newest':
                    $ads = $ads->orderBy('updated_at', 'DESC')->paginate(8);
                    break;

                case 'popular':
                    $ads = $ads->orderBy('reads', 'DESC')->paginate(8);
                    break;

                case 'Food':
                    $ads = $ads->where('type', $sort)->paginate(8);
                    break;

                case 'Rental':
                    $ads = $ads->where('type', $sort)->paginate(8);
                    break;

                case 'Product':
                    $ads = $ads->where('type', $sort)->paginate(8);
                    break;

                default:
                    $ads = $ads->paginate(8);
                    break;
            }
        }else{
            switch ($sort) {
                case 'newest':
                    $ads = $this->getAdsStatus()->orderBy('updated_at', 'DESC')->paginate(8);
                    break;

                case 'popular':
                    $ads = $this->getAdsStatus()->orderBy('reads', 'DESC')->paginate(8);
                    break;

                case 'Food':
                    $ads = $this->getAdsStatus()->where('type', $sort)->paginate(8);
                    break;

                case 'Rental':
                    $ads = $this->getAdsStatus()->where('type', $sort)->paginate(8);
                    break;

                case 'Product':
                    $ads = $this->getAdsStatus()->where('type', $sort)->paginate(8);
                    break;

                default:
                    $ads = $this->getAdsStatus()->paginate(8);
                    break;
            }
        }
        
        $ads->appends($request->all());
        
        return view('allads', compact('ads'));
    }

    public function getAdsStatus(){
        return Advertisement::where('status', 'verified');
    }
}
