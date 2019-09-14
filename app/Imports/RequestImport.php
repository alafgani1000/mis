<?php

namespace App\Imports;

use App\Request as Requests;
use Maatwebsite\Excel\Concerns\ToModel;

class RequestImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Requests([
            'category_id'   => $row[1],
            'usability_id'  => $row[2],
            'user_id'       => $row[3],
            'title'         => $row[4],
            'format'        => $row[5],
            'start_date'    => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),
            'end_date'      => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
            'status_id'     => $row[8]
        ]);
    }
}
