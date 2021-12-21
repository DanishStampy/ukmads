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
        $user_id = Auth::user()->email;

        $ads = Advertisement::where('creator_email', $user_id)->get();
        $event = Event::where('creator_email', $user_id)->get();

        return view('dashboards.advertiser.index', compact('ads','event'));
    }

    public function profile(){
        return view('dashboards.advertiser.profile');
    }

    // Create ads
    public function createads(){
        return view('dashboards.advertiser.createads');
    }

   public function uploadAds(Request $request){
        $ads = new Advertisement();
        $image = $request['fileToUpload'];
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->fileToUpload->move('img', $imgname);

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
    

    // Create events
    public function createevents(){
        return view('dashboards.advertiser.createevents');
    }

    public function uploadEvents(Request $request){
        $events = new Event();
        $image = $request['fileToUpload'];
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->fileToUpload->move('img', $imgname);

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

    // Edit ads
    public function editads($id_ads){
        $ads = Advertisement::find($id_ads);

        return view('dashboards.advertiser.editads', compact('ads'));
    }

    public function updateAds(Request $request, $id_ads){
        $ads = Advertisement::find($id_ads);

        $image = $request['fileToUpload'];

        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->fileToUpload->move('img', $imgname);

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

        return redirect()->route('advertiser.manageads')->with('success_uploaded_ads','Advertisement have been successfully updated.');
    }

    // Edit event
    public function editevent($id_event){
        $event = Event::find($id_event);

        return view('dashboards.advertiser.editevent', compact('event'));
    }

    public function updateEvent(Request $request, $id_event){
        $event = Event::find($id_event);

        $image = $request['fileToUpload'];

        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->fileToUpload->move('img', $imgname);

        $event->picture = $imgname;
        $event->creator_email = Auth::user()->email;
        $event->name = $request->name;
        $event->location = $request->location;
        $event->time = $request->time;
        $event->date = $request->date;
        $event->organizer = $request->org;
        $event->contact = $request->contactE;
        $event->description = $request->descE;
        $event->status = "pending";
        

        $event->save();

        return redirect()->route('advertiser.manageevents')->with('success_uploaded_events','Event have been successfully updated.');
    }

    // Delete Ads
    public function deleteAds($id_ads){
        $ads = Advertisement::find($id_ads);
        unlink("img/".$ads->picture);
        $ads->delete();

        return redirect()->back()->with('delete_ads', 'Advertisement has been succesfully deleted.');
    }

    //Delete Event
    public function deleteEvent($id_event){
        $event = Event::find($id_event);
        unlink("img/".$event->picture);
        $event->delete();

        return redirect()->back()->with('delete_event', 'Event has been succesfully deleted.');
    }

    // Dashboad for ads and events

    public function manageads(){
        $ads = Advertisement::all();
        return view('dashboards.advertiser.manageads', compact('ads'));
    }

    public function manageevents(){
        $event = Event::all();
        return view('dashboards.advertiser.manageevents', compact('event'));
    }
}

