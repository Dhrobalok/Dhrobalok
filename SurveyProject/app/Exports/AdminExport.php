<?php

namespace App\Exports;

use App\Models\Surve;
use App\Models\question;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Session;

//use Maatwebsite\Excel\Concerns\FromCollection;

class AdminExport implements FromView
{
    protected $id;


 function __construct($id) {
        $this->id = $id;

 }

    public function view(): View
    {

        return view('backend.admin.print', [
            'questionName' => question::where('iteam_id',$this->id)
            ->get()
            ,
            'userId'=>Surve::select('user_id')->where('item_id',$this->id)


            ->distinct()
            ->get()
             ,
            'iteam_id'=>$this->id

        ]);
    }
}
