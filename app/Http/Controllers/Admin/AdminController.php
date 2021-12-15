<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('dashboards.admin.pendingads');
    }

    public function history(){
        $advertisements = Advertisement::all();
        $events = Event::all();
        return view('dashboards.admin.history', compact('advertisements', 'events'));
    }

    public function profile(){
        return view('dashboards.admin.profile');
    }
}
