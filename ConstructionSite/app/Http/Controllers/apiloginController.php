<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Categoryinformation;




class apiloginController extends Controller
{
    public function apiLogin()
    {
       $allinformation=Categoryinformation::get();
        return view('backend.admin.api.category',['informationall'=>$allinformation]);
    }

    public function loginpage()
    {
        return "loginsdf";
    }

}
