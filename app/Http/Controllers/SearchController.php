<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function getEmail()
    {
        return Auth::user()->email;
    }

    // advertiser
    public function searchads(Request $request)
    {
        if(isset($_GET['searchads'])){
            $user_id = $this->getEmail();
            // $search_text=$_GET['search'];
             $search_text=$request->input('searchads');
             $ads = Advertisement::where('name','LIKE','%'.$search_text.'%')->orWhere('type','LIKE','%'.$search_text.'%')->where('creator_email', $user_id)->paginate(6);
             $ads->appends($request->all());
             return view('dashboards.advertiser.searchads', compact('ads'));
         }else{
            return view('dashboards.advertiser.searchads');
         }
        
    }

    // organizer
    public function searchevents(Request $request)
    {
        if(isset($_GET['searchevents'])){
            $user_id = $this->getEmail();
            // $search_text=$_GET['search'];
             $search_text=$request->input('searchevents');
             $events = Event::where('name','LIKE','%'.$search_text.'%')->orWhere('location','LIKE','%'.$search_text.'%')->orWhere('organizer','LIKE','%'.$search_text.'%')->where('creator_email', $user_id)->paginate(6);
             $events->appends($request->all());
             return view('dashboards.organizer.searchevents', compact('events'));
         }else{
            return view('dashboards.organizer.searchevents');
         }
        
    }

    // viewer ads
    public function searchadsV(Request $request)
    {
        if(isset($_GET['searchadsV'])){
            //$user_id = $this->getEmail();
            // $search_text=$_GET['search'];
             $search_text=$request->input('searchadsV');
             $ads = Advertisement::where('name','LIKE','%'.$search_text.'%')->orWhere('type','LIKE','%'.$search_text.'%')->paginate(4);
             $ads->appends($request->all());
             return view('searchadsV', compact('ads'));
         }else{
            return view('searchadsV');
         }
        
    }

    // viewer events
    public function searcheventsV(Request $request)
    {
        if(isset($_GET['searcheventsV'])){
            //$user_id = $this->getEmail();
            // $search_text=$_GET['search'];
             $search_text=$request->input('searcheventsV');
             $events = Event::where('name','LIKE','%'.$search_text.'%')->orWhere('location','LIKE','%'.$search_text.'%')->orWhere('organizer','LIKE','%'.$search_text.'%')->paginate(6);
             $events->appends($request->all());
             return view('searcheventsV', compact('events'));
         }else{
            return view('searcheventsV');
         }
        
    }
}
