<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
   public function uploadAds(Request $request){
        $ads = new Advertisement();
        $image = $request['fileToUpload'];
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->fileToUpload->move('adsimg', $imgname);

        $ads->picture = $imgname;
        $ads->creator_email = Auth::user()->email;
        $ads->name = $request->name;
        $ads->type = $request->product;
        $ads->price = $request->price;
        $ads->seller_name = $request->seller;
        $ads->contact = $request->contact;
        $ads->description = $request->desc;
        $ads->status = "pending";

        $ads->save();
        return redirect()->route('advertiser.manageads')->with('success_ads','Advertisement Have been successfully uploaded.');
    }
    public function manageads(){
        return view('dashboards.advertiser.manageads');
    }
    public function createevents(){
        return view('dashboards.advertiser.createevents');
    }
    public function uploadEvents(Request $request){
        $events = new Event();
        $image = $request['fileToUpload'];
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->fileToUpload->move('eventsimg', $imgname);

        $events->picture = $imgname;
        $events->creator_email = Auth::user()->email;
        $events->name = $request->name;
        $events->location = $request->location;
        $events->time = $request->time;
        $events->date = $request->date;
        $events->organizer = $request->org;
        $events->contact = $request->contactE;
        $events->description = $request->descE;
        $events->status = "pending";

        $events->save();
        return redirect()->route('advertiser.manageevents')->with('success_events','Event Have been successfully uploaded.');
    }
    public function manageevents(){
        return view('dashboards.advertiser.manageevents');
    }
}

