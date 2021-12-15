<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $advertisements = Advertisement::all();
        $events = Event::all();
        return view('dashboards.admin.pendingads', compact('advertisements', 'events'));
    }

    public function history(){
        $advertisements = Advertisement::all();
        $events = Event::all();
        return view('dashboards.admin.history', compact('advertisements', 'events'));
    }

    public function profile(){
        return view('dashboards.admin.profile');
    }

    public function verifiedAds(Request $request){
        $type=$request->input('type');
        $id=$request->input('id_ads');
        $ads = Advertisement::findOrFail($id);
//        $ads->where('id_ads', $id_ads)->update(['status'=>"verified"]);
        $ads->status = $type=='approved'?"verified":"rejected";

        $ads->save();

        return redirect()->route('admin.pendingads')->with('message', 'Successfully verified');
    }

    public function verifiedEvent(Request $request){
        $type=$request->input('type');
        $id=$request->input('id_event');
        $ads = Event::findOrFail($id);
//        $ads->where('id_ads', $id_ads)->update(['status'=>"verified"]);
        $ads->status = $type=='approved'?"verified":"rejected";

        $ads->save();

        return redirect()->route('admin.pendingads')->with('message', 'Successfully verified');
    }
}
