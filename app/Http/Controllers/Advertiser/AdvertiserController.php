<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AdvertiserController extends Controller
{

    // Just use this function to get specific user email
    public function getEmail()
    {
        return Auth::user()->email;
    }

    public function index()
    {
        $user_id = $this->getEmail();

        $ads = Advertisement::where('creator_email', $user_id)->get();

        return view('dashboards.advertiser.index', compact('ads'));
    }

    public function profile()
    {
        return view('dashboards.advertiser.profile');
    }

    // Create ads
    public function createads()
    {
        return view('dashboards.advertiser.createads');
    }

    public function uploadAds(Request $request)
    {
        $ads = new Advertisement();

        if ($request->hasFile('fileToUpload')) {
            $request->validate([
                'fileToUpload' => 'mimes:jpeg,jpg,png'
            ]);

            $image = $request['fileToUpload'];
            $imgname = time() . '.' . $image->getClientOriginalExtension();
            $request->fileToUpload->move('img', $imgname);

            $ads->picture = $imgname;
        }

        $request->validate([
            'name' => 'required',
            'product' => 'required',
            'price' => 'required|max:999',
            'seller' => 'required',
            'contact' => ['required', new PhoneNumber],
            'desc' => 'required'
        ]);

        $ads->creator_email = Auth::user()->email;
        $ads->name = $request->name;
        $ads->type = $request->product;
        $ads->price = $request->price;
        $ads->seller_name = $request->seller;
        $ads->contact = $request->contact;
        $ads->description = $request->desc;

        switch($request->input('action')){
            case 'save':
                $ads->status = "draft";
                $msg = 'Advertisement have been successfully drafted.';
                break;
            case 'verify':
                $ads->status = "pending";
                $msg = 'Advertisement have been successfully uploaded.';
                // ads(new Advertisement($ads = $this->create($request->all())));
                break;
        }

        $ads->save();
        return redirect()->route('advertiser.manageads', ['status'=>'pending'])->with('success_ads', $msg);
    }

    // Edit ads
    public function editads($id_ads)
    {
        $ads = Advertisement::find($id_ads);

        return view('dashboards.advertiser.editads', compact('ads'));
    }

    public function updateAds(Request $request, $id_ads)
    {
        $ads = Advertisement::find($id_ads);

        if ($request->hasFile('fileToUpload')) {
            $request->validate([
                'fileToUpload' => 'mimes:jpeg,jpg,png'
            ]);

            if ($ads && File::exists(public_path("img/".$ads->picture))) {
                File::delete(public_path("img/".$ads->picture));
            }

            $image = $request['fileToUpload'];
            $imgname = time() . '.' . $image->getClientOriginalExtension();
            $request->fileToUpload->move('img', $imgname);

            $ads->picture = $imgname;
        }

        $request->validate([
            'name' => 'required',
            'product' => 'required',
            'price' => 'required|max:999',
            'seller' => 'required',
            'contact' => ['required', new PhoneNumber],
            'desc' => 'required'
        ]);

        $ads->creator_email = Auth::user()->email;
        $ads->name = $request->name;
        $ads->type = $request->product;
        $ads->price = $request->price;
        $ads->seller_name = $request->seller;
        $ads->contact = $request->contact;
        $ads->description = $request->desc;

        switch($request->input('action')){
            case 'save':
                $ads->status = "draft";
                $msg = 'Advertisement have been successfully drafted.';
                break;
            case 'submit':
            case 'update':
                $ads->status = "pending";
                $msg = 'Advertisement have been successfully updated.';
                break;
        }

        $ads->save();

        return redirect()->route('advertiser.manageads', ['status'=>'pending'])->with('success_uploaded_ads', $msg);
    }


    // Delete Ads
    public function deleteAds(Request $request)
    {
        $id_ads = $request->input('id_ads');
        $ads = Advertisement::find($id_ads);
        if ($ads && File::exists(public_path("img/".$ads->picture))) {
            File::delete(public_path("img/".$ads->picture));
        }
        $ads->delete();

        return redirect()->back()->with('delete_ads', 'Advertisement has been succesfully deleted.');
    }

    public function manageads(Request $request)
    {
        $user_id = $this->getEmail();
        $status = $request->input('status');
        $ads = Advertisement::where('status', $status)->where('creator_email', $user_id)->orderBy('created_at','desc')->paginate(3, ['*'], 'advertisements');
        $ads->appends($request->all());
        return view('dashboards.advertiser.manageads', compact('ads'));
    }

    public function draftPreview()
    {
        $user_id = $this->getEmail();
        $ads = Advertisement::where('status', 'draft')->where('creator_email', $user_id)->orderBy('created_at','desc')->paginate(4, ['*'], 'advertisements');

        return view('dashboards.advertiser.draftads', compact('ads'));
    }
}
