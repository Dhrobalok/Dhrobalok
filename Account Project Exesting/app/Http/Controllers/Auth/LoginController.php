<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Session;
use Auth;

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

    protected function authenticated($request,$user)
    {
        $user=User::where('id',$user->id)->first();
        // $user->id;
        if($user->status!=1)
        {
            Auth::logout();
           //return view('auth.login');
            Session::flash('message', "You have no permission for login");
            return redirect() -> route('login')->with('error',1);
            //return view('frontend.index')->with('error',1);
        }  
        else
        {
            $url = Auth :: user() -> is_bill_user  == 0 ? "/employee-dashboard" : "/bill-user-profile";
            return redirect() -> to($url);
        }

        
       
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
