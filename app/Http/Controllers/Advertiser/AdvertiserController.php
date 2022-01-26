<?php

namespace App\Http\Controllers\Advertiser;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Payment;
use App\Models\Subscription;
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

        $uid = Subscription::where('user_id', Auth::user()->user_id)->value('id');
        $subs = Subscription::find($uid);

        return view('dashboards.advertiser.index', compact('ads', 'subs'));
    }

    public function profile()
    {
        $user_id = $this->getEmail();
        $ads = Advertisement::where('creator_email', $user_id)->get();

        $subsID = Subscription::where('user_id', Auth::user()->user_id)->value('id');
        $subs = Subscription::find($subsID);

        $paymentHistory = Payment::where('user_id', Auth::user()->user_id)->get();

        return view('dashboards.advertiser.profile', compact('ads', 'subs', 'paymentHistory'));
    }

    // Create ads
    public function createads()
    {
        $uid = Subscription::where('user_id', Auth::user()->user_id)->value('id');
        $subs = Subscription::find($uid);

        $adsCreated = Advertisement::where('creator_email', $this->getEmail())->count();

        return view('dashboards.advertiser.createads', compact('subs', 'adsCreated'));
    }

    public function uploadAds(Request $request)
    {
        $ads = new Advertisement();
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
        $ads->picture = $files;
        $ads->description = $request->desc;

        switch ($request->input('action')) {
            case 'save':
                $ads->status = "draft";
                $msg = 'Advertisement have been successfully drafted.';
                break;
            case 'verify':
                $ads->status = "pending";
                $msg = 'Advertisement have been sent to be verified.';
                break;
        }

        $ads->save();
        return redirect()->route('advertiser.manageads', ['status' => 'pending'])->with('success_ads', $msg);
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
        $files = [];

        if ($request->hasFile('fileToUpload')) {
            $request->validate([
                'fileToUpload.*' => 'image'
            ]);

            foreach ($ads['picture'] as $pic) {
                if ($ads && File::exists(public_path("img/" . $pic))) {
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
        $ads->picture = $files;
        $ads->contact = $request->contact;
        $ads->description = $request->desc;

        switch ($request->input('action')) {
            case 'save':
                $ads->status = "draft";
                $msg = 'Advertisement have been successfully drafted.';
                break;
            case 'submit':
            case 'update':
                $ads->status = "pending";
                $msg = 'Advertisement have been successfully updated. It will re-verify the advertisement.';
                break;
        }

        $ads->save();

        return redirect()->route('advertiser.manageads', ['status' => 'pending'])->with('success_uploaded_ads', $msg);
    }


    // Delete Ads
    public function deleteAds(Request $request)
    {
        $id_ads = $request->input('id_ads');
        $ads = Advertisement::find($id_ads);

        foreach ($ads['picture'] as $pic) {
            if ($ads && File::exists(public_path("img/" . $pic))) {
                File::delete(public_path("img/" . $pic));
            }
        }
        $ads->delete();

        return redirect()->back()->with('delete_ads', 'Advertisement has been deleted.');
    }

    public function manageads(Request $request)
    {
        $user_id = $this->getEmail();
        $status = $request->input('status');
        $ads = Advertisement::where('status', $status)->where('creator_email', $user_id)->orderBy('created_at', 'desc')->paginate(3, ['*'], 'advertisements');
        $ads->appends($request->all());
        return view('dashboards.advertiser.manageads', compact('ads'));
    }

    public function draftPreview()
    {
        $user_id = $this->getEmail();
        $ads = Advertisement::where('status', 'draft')->where('creator_email', $user_id)->orderBy('created_at', 'desc')->paginate(4, ['*'], 'advertisements');

        return view('dashboards.advertiser.draftads', compact('ads'));
    }
}
