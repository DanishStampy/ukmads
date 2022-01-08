<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function search(Request $request){

        if(isset($_GET['search'])){
            $search_text=$_GET['search'];
            $ads=Advertisement::where('name',$search_text)->paginate(2);
            return view('search',[$ads]);
        }else{
            return view('search');
        }
        
    }
}
