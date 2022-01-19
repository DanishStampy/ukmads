<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class PaymentController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'advertiser')
            return view('dashboards.advertiser.paymentads');
        else
            return view('dashboards.organizer.paymentevent');
    }

    public function paymentPost(Request $request)
    {
        $amount = $request->total_price;

        
        $uid = Auth::user()->user_id;
        $quotaQuantity = $request->quota;
        
        $subscriptionID = Subscription::where('user_id', $uid)->first()->value('id');
        $subscription = Subscription::find($subscriptionID);
        $subscription->quota =  $subscription->quota + $quotaQuantity;
        $subscription->subs_status = 'YES';
        $subscription->save();
        
        $payment = new Payment();
        $payment->user_id = $uid;
        $payment->payer_email = Auth::user()->email;
        $payment->amount = $amount;
        $payment->quota_count = $quotaQuantity;
        $payment->payment_status = 'Successful';
        $payment->save();
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        Stripe\Charge::create([
            "amount" => $amount * 100,
            "currency" => 'myr',
            'source' => $request->stripeToken,
            'description' => 'Deez nuts',

        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
