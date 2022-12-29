<?php

namespace App\Exports;

use App\Models\Surve;
use App\Models\question;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Session;
//use Maatwebsite\Excel\Concerns\FromCollection;

class Survey implements FromView
{
    protected $id;


 function __construct($id) {
        $this->id = $id;

 }

    public function view(): View
    {
        $user_id=Session::get('user_id');
        return view('backend.Servay.demo', [
            'employees' => question::where('iteam_id',$this->id)
            ->where('user_id',$user_id)
            ->get()
            ,
            'survey'=>Surve::where('item_id',$this->id)
            ->where('user_id',$user_id)
            ->get()
             ,
            'surveid'=>Surve::select('surve_id')
            ->where('item_id',$this->id)
            ->where('user_id',$user_id)
             ->distinct()
            ->get()

        ]);
    }
}
