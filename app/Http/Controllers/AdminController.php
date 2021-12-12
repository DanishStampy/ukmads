<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function pendingads(){
        return view('dashboards.admin.pendingads');
    }

    public function profile(){
        return view('dashboards.admin.profile');
    }
    public function history(){
        return view('dashboards.admin.history');
    }
}
