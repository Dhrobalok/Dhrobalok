<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use App\Models\Employee;
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

        if(Auth :: user()->status==1)
        {
           
            $email=Auth ::user()->email;
            
            session()->put('emailname', $email);
            Session::get('emailname');
            $emailid=Session::get('emailname');
            $userId=Employee::where('email',$emailid)->first();
            $employee=Employee::where('roll',$userId->roll)->first();
            return view('frontend.profile',['employee' => $employee]);
            //return view("frontend.profile");
           // return redirect()->route('dashboard');

        }
        else
        {
        return redirect()->back()->with('message','You have no permission for login !');
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
