<?php

namespace App\Exports;

use App\Models\Profile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection,WithHeadings
{

    protected $office_id;

 function __construct($office_id) 
 {
        $this->office_id = $office_id;
 }
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'id',
            'dbuid',
            'salaryID',
            'fullNameNew',
            'Designation',
            'emaill',
            'mobile_no',
            'office_address',
            'SRINDEX',
            'officeSRINDEX',
            'job_status',
            'dept_code',
            'dept_name',
            'created_at',
            'updated_at'  
        ];
    } 
    public function collection()
    {
        return Profile::where('dept_code',$this->office_id)->get();
    }
}
