<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('dashboards.admin.pendingads');
    }

    public function history(){
        return view('dashboards.admin.history');
    }

    public function profile(){
        return view('dashboards.admin.profile');
    }

}

