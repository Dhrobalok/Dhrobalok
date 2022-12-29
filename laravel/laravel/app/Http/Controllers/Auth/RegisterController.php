<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $re)
    {
        return Validator::make($re, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'blood'=>'required',
            'mobile'=>'required',
           
            'session'=>'required',
            'roll'=>'required',
        ]);
    }
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      /**  $this->Validate($re, array(
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'blood'=>'required',
            'mobile'=>'required',
           
            'session'=>'required',
            'image'=>'required',
        ));
       
     
      $app=new User();
       $app->name=$re->input('name');
       $app->email=$re->input('email');
       $app->password=$re->input('password');
       $app->blood=$re->input('blood');
       $app->mobile=$re->input('mobile');
       $app->session=$re->input('session');
       

       if ($re->hasFile('image')) {
         $file=$re->file('image');
         $extention=$file->getClientOriginalExtension();
         $filename = time() . '.' .$extention;
         $file->move('uploads/pic/', $filename);
         $app->image=$filename;
       }
          $app->save();
       return back();
**/
  

    


       
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
             'blood' => $data['blood'],
            'mobile' => $data['mobile'],
            'session' => $data['session'],
            'roll' => $data['roll'],
          
        ]);
       
   
        
        }
          
        

        
    
}
