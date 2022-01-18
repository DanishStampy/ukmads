<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
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
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        Stripe\Charge::create([
            "amount" => 300 * 100,
            "currency" => 'myr',
            'source' => $request->stripeToken,
            'description' => 'Deez nuts',

        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
