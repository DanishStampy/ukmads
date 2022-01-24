<?php

namespace App\Http\Controllers;

use App\Mail\JoinMail;
use App\Models\Event;
use App\Models\JoinList;
use App\Rules\PhoneNumber;
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

    public function allEvents(Request $request)
    {
        $sort = $request->input('sort');

        switch ($sort) {
            case 'newest':
                $event = Event::where('status', 'verified')->orderBy('updated_at', 'DESC')->paginate(8);
                break;

            case 'popular':
                $event = Event::where('status', 'verified')->orderBy('join', 'DESC')->paginate(8);
                break;

            case 'date':
                $event = Event::where('status', 'verified')->orderBy('date', 'DESC')->paginate(8);
                break;

            default:
                $event = Event::where('status', 'verified')->paginate(8);
                break;
        }

        $event->appends($request->all());

        return view('allevents', compact('event'));
    }

    public function joinEvents(Request $request)
    {
        $list = new JoinList();

        $request->validate([
            'guest_email' => 'required',
            'guest_name' => 'required',
            'guest_contact' => ['required', new PhoneNumber],
        ]);

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
            'event_details' => 'Do not forget our event on ' . $event->time . ' at ' . $event->date,
        ];

        if (JoinList::where('guest_email', '=', $email)->where('id_event', '=', $id)->exists()) {
            return redirect()->back()->with('failed_submit', 'The email already submitted. Please enter another email.');
        } else {
            Mail::to($email)->send(new JoinMail($details));

            $event->join++;
            $event->save();

            $list->save();
            return redirect()->back()->with('success_submit', 'Successfully submitted.');
        }
    }
}
