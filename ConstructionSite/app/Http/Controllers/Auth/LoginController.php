<?php

// namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Employee;
 use Session;

use Illuminate\Support\Facades\Hash;

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

    // use AuthenticatesUsers;

    public function loginuser(Request $request)
    {
        return "ddadsda";
        // $email=User::where('email',$request->email)
        // ->first();
        $password=User::where('email',$request->email)->first();
        // Hash::check($request->password, $password->password);
       
        if(Hash::check($request->password, $password->password) && $password->status==1)
        {
      
           return "login";
            $email=$request->email;
            $employeeid=User::where('email',$email)->first();
            
            session()->put('emailname', $email);
            session()->put('rollno', $password->id);
            session()->put('employeeid', $employeeid->id);
            Session::get('emailname');
            $emailid=Session::get('emailname');
            $userId=Employee::where('email',$emailid)->first();
            $employee=Employee::where('id',$userId->id)->first();
            return view('frontend.profile',['employee' => $employee]);
            //return view("frontend.profile");
           // return redirect()->route('dashboard');

        }
        else
        {
            return "notlogin";
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
