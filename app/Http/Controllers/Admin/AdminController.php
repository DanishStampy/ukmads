<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Event;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        $advertisements = Advertisement::where('status', 'pending')->get();
        $events = Event::where('status', 'pending')->get();

        $totalAds = DB::table('advertisements')->count('id_ads');
        $totalEvent = DB::table('events')->count('id_event');

        $joinDateDBAds = DB::table('advertisements')->selectRaw('COUNT(id_ads) as cnt, DATE_FORMAT(created_at, "%d/%m/%Y") fdate')
            ->whereDate('created_at', '>=', Carbon::now()->subDays(6))

            ->orderByRaw('STR_TO_DATE(fdate, "%d/%m/%Y")', 'ASC')
            ->groupBy('fdate')->get()
            ->mapWithKeys(function ($item) {

                return [$item->fdate => $item->cnt];
            });

        $joinDateAds = collect(CarbonPeriod::create(now()->subDays(6), now()))->mapWithKeys(function ($date) {
            return [$date->format('d/m/Y') => 0];
        })->merge($joinDateDBAds)->sortKeys();

        $joinDateDBEvent = DB::table('events')->selectRaw('COUNT(id_event) as cnt, DATE_FORMAT(created_at, "%d/%m/%Y") fdate')
            ->whereDate('created_at', '>=', Carbon::now()->subDays(6))

            ->orderByRaw('STR_TO_DATE(fdate, "%d/%m/%Y")', 'ASC')
            ->groupBy('fdate')->get()
            ->mapWithKeys(function ($item) {

                return [$item->fdate => $item->cnt];
            });

        $joinDateEvent = collect(CarbonPeriod::create(now()->subDays(6), now()))->mapWithKeys(function ($date) {
            return [$date->format('d/m/Y') => 0];
        })->merge($joinDateDBEvent)->sortKeys();



        return view('dashboards.admin.index', compact('advertisements', 'joinDateAds', 'totalAds', 'events', 'joinDateEvent','totalEvent'));
    }

    public function pendingads()
    {
        $advertisements = Advertisement::where('status', 'pending')->orderBy('created_at', 'desc')->paginate(4, ['*'], 'advertisements');
        $events = Event::where('status', 'pending')->orderBy('created_at', 'desc')->paginate(4, ['*'], 'events');
        return view('dashboards.admin.pendingads', compact('advertisements', 'events'));
    }

    public function history()
    {
        $advertisements = Advertisement::where('status', 'verified')->orWhere('status', 'rejected')->orderBy('updated_at', 'desc')->paginate(4, ['*'], 'advertisements');
        $events = Event::where('status', 'verified')->orWhere('status', 'rejected')->orderBy('updated_at', 'desc')->paginate(4, ['*'], 'events');
        return view('dashboards.admin.history', compact('advertisements', 'events'));
    }

    public function profile()
    {
        return view('dashboards.admin.profile');
    }

    public function verifiedAds(Request $request)
    {
        $type = $request->input('type');
        $id_ads = $request->input('id_ads');
        $reason = $request->input('adsReason');
        $ads = Advertisement::findOrFail($id_ads);
        //        $ads->where('id_ads', $id_ads)->update(['status'=>"verified"]);
        $ads->status = $type == 'approved' ? "verified" : "rejected";
        $ads->reason = $reason;

        $ads->save();

        return redirect()->route('admin.pendingads')->with('message', 'Successfully verified');
    }

    public function verifiedEvent(Request $request)
    {
        $type = $request->input('type');
        $id_event = $request->input('id_event');
        $reason = $request->input('eventReason');
        $events = Event::findOrFail($id_event);
        //        $events->where('id_event', $id_event)->update(['status'=>"verified"]);
        $events->status = $type == 'approved' ? "verified" : "rejected";
        $events->reason = $reason;

        $events->save();

        return redirect()->route('admin.pendingads')->with('message', 'Successfully verified');
    }
}
