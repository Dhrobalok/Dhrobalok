<?php

namespace App\Imports;

use App\Models\Examresult;
use Maatwebsite\Excel\Concerns\ToModel;

class resultsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[1]!='course_id')
        {
        return new Examresult([

            'course_id'     => $row[1],
            'batch'     => $row[2],
            's_id'     => $row[3],
            'mark'     => $row[4],

        ]);

        
      }
    }
}
