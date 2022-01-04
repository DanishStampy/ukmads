<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function popularEvents()
    {
        $event=Event::all();
        return view('popularevent',compact('event'));
    }
    public function eventDetails($id_event)
    {
        $details=Event::find($id_event);
        return view('eventdetails',compact('details'));
    }
}
