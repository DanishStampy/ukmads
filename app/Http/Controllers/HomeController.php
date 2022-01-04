<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function allAds()
    {
        $ads=Advertisement::all();
        return view('ads',compact('ads'));
    }
    public function allEvents()
    {
        $event=Event::all();
        return view('event',compact('event'));
    }
    public function eventDetails($id_event)
    {
        $details=Event::find($id_event);
        return view('eventdetails',compact('details'));
    }
    
    // public function adsDetails($id_ads)
    // {
    //     $details=Advertisement::find($id_ads);
    //     return view('adsdetails',compact('details'));
    // }
}
