<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    // function search(Request $request){

    //     if(isset($_GET['search'])){
    //        // $user_id = $this->getEmail();
    //         $search_text=$_GET['search'];
    //         $ads=Advertisement::where('name','LIKE','&'.$search_text.'&')->paginate(5);
    //         return view('dashboards.advertiser.searchads', compact('ads'));
    //         //return view('search',[$ads]);
    //     }else{
    //         return view('search');
    //     }
        
    // }
    public function getEmail()
    {
        return Auth::user()->email;
    }

    public function searchads(Request $request)
    {
        if(isset($_GET['search'])){
            $user_id = $this->getEmail();
            // $search_text=$_GET['search'];
             $search_text=$request->input('search');
             $ads = Advertisement::where('name','LIKE','%'.$search_text.'%')->orWhere('type','LIKE','%'.$search_text.'%')->where('creator_email', $user_id)->paginate(6, ['*'], 'searchads');
             $ads->appends($request->all());
             return view('dashboards.advertiser.searchads', compact('ads'));
         }else{
            return view('dashboards.advertiser.searchads');
         }
        
    }
}
