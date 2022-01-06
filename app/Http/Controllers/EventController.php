<?php

namespace App\Http\Controllers;

use App\Mail\JoinMail;
use App\Models\Event;
use App\Models\JoinList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    //
    public function popularEvents()
    {
        $newestEvent = Event::where('status', 'verified')->latest()->take(4)->get();
        $popularEvent = Event::where('status', 'verified')->orderBy('join', 'desc')->limit(3)->get();

        return view('popularevent', compact('popularEvent', 'newestEvent'));
    }
    public function eventDetails($id_event)
    {
        $details = Event::find($id_event);
        return view('eventdetails', compact('details'));
    }
    public function allEvents()
    {
        $event = Event::where('status', 'verified')->paginate(8);
        return view('allevents', compact('event'));
    }

    public function joinEvents(Request $request)
    {
        $list = new JoinList();

        $id = $request->id_event;
        $email = $request->guest_email;

        $event = Event::find($id);

        $list->id_event = $id;
        $list->guest_email = $email;
        $list->guest_name = $request->guest_name;
        $list->guest_contact = $request->guest_contact;

        $details = [
            'title' => 'Thank you for joining our event!',
            'event_name' => $event->name,
            'event_details' =>'Do not forget our event on '.$event->time.' at '.$event->date,
        ];

        if(JoinList::where('guest_email', '=', $email)->where('id_event', '=', $id)->exists()){
            return redirect()->back()->with('failed_submit', 'The email already submitted. Please enter another email.');
        }else{
            Mail::to($email)->send(new JoinMail($details));

            $list->save();
            return redirect()->back()->with('success_submit', 'Successfully submitted.');
        }
        
    }
}
