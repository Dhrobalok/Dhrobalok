<?php

namespace App\Exports;

use App\Models\Surve;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Session;
//use Maatwebsite\Excel\Concerns\FromCollection;


class Report implements FromView
{
    protected $id;


 function __construct($id) {
        $this->id = $id;

 }

    public function view(): View
    {
        $user_id=Session::get('user_id');
        return view('backend.Servay.Individual', [

            'survey'=>Surve::where('surve_id',$this->id)
            ->where('user_id',$user_id)
            ->get()


        ]);
    }
}

