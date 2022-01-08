<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organizer;
use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrgRegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistration()
    {
        return view('auth.orgregister');
    }

    public function postRegistration(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'contact' => ['required', new PhoneNumber],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = 'organizer';
        $user->password = Hash::make($request->password);
        $user->save();

        $orgs = new Organizer();
        $orgs->user_id = $user->user_id;
        $orgs->address = $request->address;
        $orgs->contact = $request->contact;

        if( $orgs->save() ){
            return redirect('login')->with('success','You are now successfully registered');
        }else{
            return redirect('login')->with('error','Failed to register');
        }
    }
}
