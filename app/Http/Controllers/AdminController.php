<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('dashboards.admin.index');
    }

    public function profile(){
        return view('dashboards.admin.profile');
    }
}
