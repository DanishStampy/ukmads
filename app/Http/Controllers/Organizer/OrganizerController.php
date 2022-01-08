<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    public function getEmail()
    {
        return Auth::user()->email;
    }

    public function index()
    {
        $user_id = $this->getEmail();

        $event = Event::where('creator_email', $user_id)->get();

        return view('dashboards.organizer.index', compact('event'));
    }

    // Create events
    public function createevents()
    {
        return view('dashboards.organizer.createevents');
    }

    public function uploadEvents(Request $request)
    {
        $events = new Event();

        if ($request->hasFile('fileToUpload')) {
            $request->validate([
                'fileToUpload' => 'mimes:jpeg,jpg,png'
            ]);

            $image = $request['fileToUpload'];
            $imgname = time() . '.' . $image->getClientOriginalExtension();
            $request->fileToUpload->move('img', $imgname);

            $events->picture = $imgname;
        }

        $events->creator_email = Auth::user()->email;
        $events->name = $request->name;
        $events->location = $request->location;
        $events->time = $request->time;
        $events->date = $request->date;
        $events->organizer = $request->org;
        $events->contact = $request->contactE;
        $events->description = $request->descE;
        $events->join = 0;
        
        switch($request->input('action')){
            case 'save':
                $events->status = "draft";
                $msg = 'Event have been successfully drafted.';
                break;
            case 'verify':
                $events->status = "pending";
                $msg = 'Event have been successfully uploaded.';
                break;
        }

        $events->save();
        return redirect()->route('organizer.manageevents')->with('success_events', $msg);
    }

    // Edit event
    public function editevent($id_event)
    {
        $event = Event::find($id_event);

        return view('dashboards.organizer.editevent', compact('event'));
    }

    public function updateEvent(Request $request, $id_event)
    {
        $event = Event::find($id_event);

        if ($request->hasFile('fileToUpload')) {
            $request->validate([
                'fileToUpload' => 'mimes:jpeg,jpg,png'
            ]);

            if ($event && File::exists(public_path("img/".$event->picture))) {
                File::delete(public_path("img/".$event->picture));
            }

            $image = $request['fileToUpload'];
            $imgname = time() . '.' . $image->getClientOriginalExtension();
            $request->fileToUpload->move('img', $imgname);

            $event->picture = $imgname;
        }

        $event->creator_email = Auth::user()->email;
        $event->name = $request->name;
        $event->location = $request->location;
        $event->time = $request->time;
        $event->date = $request->date;
        $event->organizer = $request->org;
        $event->contact = $request->contactE;
        $event->description = $request->descE;
        
        switch($request->input('action')){
            case 'save':
                $event->status = "draft";
                $msg = 'Event have been successfully drafted.';
                break;
            case 'submit':
            case 'update':
                $event->status = "pending";
                $msg = 'Event have been successfully updated.';
                break;
        }


        $event->save();

        return redirect()->route('organizer.manageevents')->with('success_uploaded_events', $msg);
    }

    //Delete Event
    public function deleteEvent(Request $request)
    {
        $id_event = $request->input('id_event');
        $event = Event::find($id_event);
        if ($event && File::exists(public_path("img/".$event->picture))) {
            File::delete(public_path("img/".$event->picture));
            // unlink("img/".$event->picture);
        }
        $event->delete();

        return redirect()->back()->with('delete_event', 'Event has been succesfully deleted.');
    }

    public function manageevents()
    {
        $user_id = $this->getEmail();
        $events = Event::where('status', '!=', 'draft')->where('creator_email', $user_id)->paginate(3);
        return view('dashboards.organizer.manageevents', compact('events'));
    }

    public function draftPreview()
    {
        $user_id = $this->getEmail();
        $events = Event::where('status', 'draft')->where('creator_email', $user_id)->paginate(4, ['*'], 'events');

        return view('dashboards.organizer.draftevent', compact('events'));
    }
}
