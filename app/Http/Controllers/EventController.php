<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function popularEvents()
    {
        $newestEvent = Event::where('status', 'verified')->latest()->take(4)->get();
        $popularEvent = Event::where('status', 'verified')->orderBy('join', 'asc')->limit(3)->get();
        
        return view('popularevent',compact('popularEvent', 'newestEvent'));
        
    }
    public function eventDetails($id_event)
    {
        $details = Event::find($id_event);
        return view('eventdetails',compact('details'));
    }
    public function allEvents()
    {
        $event = Event::where('status', 'verified')->paginate(8);
        return view('allevents',compact('event'));
    }

}
