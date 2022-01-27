<?php

namespace App\Http\Controllers\Organizer;

use App\Exports\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\JoinList;
use App\Models\Organizer;
use App\Models\Payment;
use App\Models\Subscription;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class OrganizerController extends Controller
{
    public function getEmail()
    {
        return Auth::user()->email;
    }

    public function profile()
    {
        $user_id = $this->getEmail();
        $event = Event::where('creator_email', $user_id)->get();

        $subsID = Subscription::where('user_id', Auth::user()->user_id)->value('id');
        $subs = Subscription::find($subsID);

        $paymentHistory = Payment::where('user_id', Auth::user()->user_id)->get();

        $orgs = Organizer::where('user_id', Auth::user()->user_id)->get();

        return view('dashboards.organizer.profile', compact('event', 'subs', 'paymentHistory', 'orgs'));
    }

    public function index()
    {
        $user_id = $this->getEmail();

        $event = Event::where('creator_email', $user_id)->get();
        // $totalJoin = DB::table('join_lists')->count('id');

        $totalJoin = DB::table('events')
            ->join('join_lists', 'events.id_event', '=', 'join_lists.id_event')
            ->where('events.creator_email', $user_id)->count();

        $joinDateDB = DB::table('events')
            ->join('join_lists', 'events.id_event', '=', 'join_lists.id_event')
            ->where('events.creator_email', $user_id)
            ->selectRaw('COUNT(join_lists.id) as cnt, DATE_FORMAT(join_lists.created_at, "%d/%m/%Y") fdate')
            ->whereDate('join_lists.created_at', '>=', Carbon::now()->subDays(6))

            ->orderByRaw('STR_TO_DATE(fdate, "%d/%m/%Y")', 'ASC')
            ->groupBy('fdate')->get()
            ->mapWithKeys(function ($item) {

                return [$item->fdate => $item->cnt];
            });

        $joinDate = collect(CarbonPeriod::create(now()->subDays(6), now()))->mapWithKeys(function ($date) {
            return [$date->format('d/m/Y') => 0];
        })->merge($joinDateDB)->sortKeys();

        $uid = Subscription::where('user_id', Auth::user()->user_id)->value('id');
        $subs = Subscription::find($uid);

        return view('dashboards.organizer.index', compact('event', 'subs', 'joinDate', 'totalJoin'));
    }

    // Create events
    public function createevents()
    {
        $uid = Subscription::where('user_id', Auth::user()->user_id)->value('id');
        $subs = Subscription::find($uid);

        $eventCreated = Event::where('creator_email', $this->getEmail())->count();

        return view('dashboards.organizer.createevents', compact('subs', 'eventCreated'));
    }

    public function uploadEvents(Request $request)
    {
        $events = new Event();
        $files = [];

        if ($request->hasFile('fileToUpload')) {

            $request->validate([
                'fileToUpload.*' => 'image'
            ]);

            foreach ($request->file('fileToUpload') as $file) {
                $imgname = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                $file->move('img', $imgname);
                $files[] = $imgname;
            }
        }

        $request->validate([
            'fileToUpload' => 'required',
            'name' => 'required',
            'location' => 'required',
            'time' => 'required',
            'date' => 'required',
            'org' => 'required',
            'contactE' => ['required', new PhoneNumber],
            'descE' => 'required'
        ]);

        $events->creator_email = Auth::user()->email;
        $events->name = $request->name;
        $events->location = $request->location;
        $events->time = $request->time;
        $events->date = $request->date;
        $events->organizer = $request->org;
        $events->picture = $files;
        $events->contact = $request->contactE;
        $events->description = $request->descE;
        $events->join = 0;

        switch ($request->input('action')) {
            case 'save':
                $events->status = "draft";
                $msg = 'Event have been successfully drafted.';
                break;
            case 'verify':
                $events->status = "pending";
                $msg = 'Event have been sent to be verified.';
                break;
        }

        $events->save();
        return redirect()->route('organizer.manageevents', ['status' => 'pending'])->with('success_events', $msg);
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
        $files = [];

        if ($request->hasFile('fileToUpload')) {
            $request->validate([
                'fileToUpload.*' => 'image'
            ]);

            foreach ($event['picture'] as $pic) {
                if ($event && File::exists(public_path("img/" . $pic))) {
                    File::delete(public_path("img/" . $pic));
                }
            }

            foreach ($request->file('fileToUpload') as $file) {
                $imgname = time() . rand(1, 100) . '.' . $file->getClientOriginalExtension();
                $file->move('img', $imgname);
                $files[] = $imgname;
            }
        }

        $request->validate([
            'fileToUpload' => 'required',
            'name' => 'required',
            'location' => 'required',
            'time' => 'required',
            'date' => 'required',
            'org' => 'required',
            'contactE' => ['required', new PhoneNumber],
            'descE' => 'required'
        ]);

        $event->creator_email = Auth::user()->email;
        $event->name = $request->name;
        $event->location = $request->location;
        $event->time = $request->time;
        $event->date = $request->date;
        $event->organizer = $request->org;
        $event->picture = $files;
        $event->contact = $request->contactE;
        $event->description = $request->descE;

        switch ($request->input('action')) {
            case 'save':
                $event->status = "draft";
                $msg = 'Event have been successfully drafted.';
                break;
            case 'submit':
            case 'update':
                $event->status = "pending";
                $msg = 'Event have been successfully updated. It will re-verify the event.';
                break;
        }


        $event->save();

        return redirect()->route('organizer.manageevents', ['status' => 'pending'])->with('success_uploaded_events', $msg);
    }

    //Delete Event
    public function deleteEvent(Request $request)
    {
        $id_event = $request->input('id_event');
        $event = Event::find($id_event);

        foreach ($event['picture'] as $pic) {
            if ($event && File::exists(public_path("img/" . $pic))) {
                File::delete(public_path("img/" . $pic));
            }
        }
        $event->delete();

        return redirect()->back()->with('delete_event', 'Event has been deleted.');
    }

    public function manageevents(Request $request)
    {
        $user_id = $this->getEmail();
        $status = $request->input('status');
        $events = Event::where('status', $status)->where('creator_email', $user_id)->orderBy('created_at', 'desc')->paginate(3, ['*'], 'events');
        $events->appends($request->all());
        return view('dashboards.organizer.manageevents', compact('events'));
    }

    public function draftPreview()
    {
        $user_id = $this->getEmail();
        $events = Event::where('status', 'draft')->where('creator_email', $user_id)->paginate(4, ['*'], 'events');

        return view('dashboards.organizer.draftevent', compact('events'));
    }

    public function joinListPreview($id_event)
    {

        $event = Event::find($id_event);
        $list = JoinList::where('id_event', $id_event)->get();
        // dd($list);
        return view('dashboards.organizer.joinlist', compact('event', 'list'));
    }

    public function exportJoinList(Request $request)
    {
        $id_event = $request->id_event;
        $event_filename = strtolower($id_event);

        return Excel::download(new ListExport($id_event), $event_filename . '_list.xlsx');
    }
}
