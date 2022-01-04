<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdvertiserController extends Controller
{

    // Just use this function to get specific user email
    public function getEmail()
    {
        return Auth::user()->email;
    }

    public function index()
    {
        $user_id = $this->getEmail();

        $ads = Advertisement::where('creator_email', $user_id)->get();
        $event = Event::where('creator_email', $user_id)->get();

        return view('dashboards.advertiser.index', compact('ads', 'event'));
    }

    public function profile()
    {
        return view('dashboards.advertiser.profile');
    }

    // Create ads
    public function createads()
    {
        return view('dashboards.advertiser.createads');
    }

    public function uploadAds(Request $request)
    {
        $ads = new Advertisement();

        if ($request->hasFile('fileToUpload')) {
            $request->validate([
                'fileToUpload' => 'mimes:jpeg,jpg,png'
            ]);

            $image = $request['fileToUpload'];
            $imgname = time() . '.' . $image->getClientOriginalExtension();
            $request->fileToUpload->move('img', $imgname);

            $ads->picture = $imgname;
        }

        $ads->creator_email = Auth::user()->email;
        $ads->name = $request->name;
        $ads->type = $request->product;
        $ads->price = $request->price;
        $ads->seller_name = $request->seller;
        $ads->contact = $request->contact;
        $ads->description = $request->desc;

        switch($request->input('action')){
            case 'save':
                $ads->status = "draft";
                $msg = 'Advertisement have been successfully drafted.';
                break;
            case 'verify':
                $ads->status = "pending";
                $msg = 'Advertisement have been successfully uploaded.';
                break;
        }

        $ads->save();
        return redirect()->route('advertiser.manageads')->with('success_ads', $msg);
    }


    // Create events
    public function createevents()
    {
        return view('dashboards.advertiser.createevents');
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
        return redirect()->route('advertiser.manageevents')->with('success_events', $msg);
    }

    // Edit ads
    public function editads($id_ads)
    {
        $ads = Advertisement::find($id_ads);

        return view('dashboards.advertiser.editads', compact('ads'));
    }

    public function updateAds(Request $request, $id_ads)
    {
        $ads = Advertisement::find($id_ads);

        if ($request->hasFile('fileToUpload')) {
            $request->validate([
                'fileToUpload' => 'mimes:jpeg,jpg,png'
            ]);

            if ($ads && File::exists(public_path("img/".$ads->picture))) {
                File::delete(public_path("img/".$ads->picture));
            }

            $image = $request['fileToUpload'];
            $imgname = time() . '.' . $image->getClientOriginalExtension();
            $request->fileToUpload->move('img', $imgname);

            $ads->picture = $imgname;
        }

        $ads->creator_email = Auth::user()->email;
        $ads->name = $request->name;
        $ads->type = $request->product;
        $ads->price = $request->price;
        $ads->seller_name = $request->seller;
        $ads->contact = $request->contact;
        $ads->description = $request->desc;

        switch($request->input('action')){
            case 'save':
                $ads->status = "draft";
                $msg = 'Advertisement have been successfully drafted.';
                break;
            case 'submit':
            case 'update':
                $ads->status = "pending";
                $msg = 'Advertisement have been successfully updated.';
                break;
        }

        $ads->save();

        return redirect()->route('advertiser.manageads')->with('success_uploaded_ads', $msg);
    }

    // Edit event
    public function editevent($id_event)
    {
        $event = Event::find($id_event);

        return view('dashboards.advertiser.editevent', compact('event'));
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

        return redirect()->route('advertiser.manageevents')->with('success_uploaded_events', $msg);
    }

    // Delete Ads
    public function deleteAds(Request $request)
    {
        $id_ads = $request->input('id_ads');
        $ads = Advertisement::find($id_ads);
        if ($ads && File::exists(public_path("img/".$ads->picture))) {
            File::delete(public_path("img/".$ads->picture));
        }
        $ads->delete();

        return redirect()->back()->with('delete_ads', 'Advertisement has been succesfully deleted.');
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

    // Dashboad for ads and events

    public function manageads()
    {
        $user_id = $this->getEmail();
        $ads = Advertisement::where('status', '!=', 'draft')->where('creator_email', $user_id)->paginate(3);
        return view('dashboards.advertiser.manageads', compact('ads'));
    }

    public function manageevents()
    {
        $user_id = $this->getEmail();
        $events = Event::where('status', '!=', 'draft')->where('creator_email', $user_id)->paginate(3);
        return view('dashboards.advertiser.manageevents', compact('events'));
    }

    public function draftPreview()
    {
        $user_id = $this->getEmail();
        $ads = Advertisement::where('status', 'draft')->where('creator_email', $user_id)->get();
        $event = Event::where('status', 'draft')->get();

        return view('dashboards.advertiser.draftlist', compact('ads', 'event'));
    }
}
