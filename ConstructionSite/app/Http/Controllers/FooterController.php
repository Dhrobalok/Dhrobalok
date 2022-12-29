<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{

    public function Index()
    {
        return view('backend.admin.aprove.footerLink');
    }

    public function Footer()
    {
        return view('backend.admin.aprove.uploadFooter');

    }

    public function Store(Request $request)
    {
        $footer=new Footer;
        $footer->name=$request->name;
        $footer->service=$request->service;
        $footer->linkname=$request->linkname;
        $footer->link=$request->link;
        $footer->save();
        return redirect()->route('footerLink');


    }

    public function DeleteFooter($id)
    {
        Footer::where('id',$id)->delete();
        return redirect()->route('footerLink');

    }
    //
}
