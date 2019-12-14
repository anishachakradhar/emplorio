<?php

namespace App\Imports;

use App\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendanceImport implements ToModel, WithHeadingRow
{
    protected $employee_id;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = new Attendance([
            'date' => date('Y-m-d',strtotime($row['date'])),
            'check_in' => date('H:i:s', strtotime($row['check_in'])),
            'check_out' => date('H:i:s', strtotime($row['check_out'])),
            'employee_id' => $this->employee_id
        ]);

        $data->save();
    }

    public function __construct($employee_id){
        $this->employee_id = $employee_id;
    }
}
