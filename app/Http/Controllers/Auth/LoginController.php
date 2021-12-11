<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){
        if(Auth::user()->role == 'admin'){
            return route('admin.dashboard');
        }else if(Auth::user()->role == 'advertiser'){
            return route('advertiser.dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();

        $this->validate($request, [
            'login'=>'required',
            'password'=>'required'
        ]);

        # Role boolean
        # 1 == Admin
        # 2 == Advertiser

        # it will check type of input, whether email or username
        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $request->merge([
            $login_type => $request->input('login')
        ]);
        
        if(Auth::attempt(array($login_type=>$input['login'], 'password'=>$input['password']))){

            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }else if(Auth::user()->role == 'advertiser'){
                return redirect()->route('advertiser.dashboard');
            }

        }else{
            return redirect()->route('login')->with('error', 'Email and password are wrong');
        }
    }
}