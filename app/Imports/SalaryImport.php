<?php

namespace App\Imports;

use App\Models\Salary;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalaryImport implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row['id'])
        return new Salary([
            'week'=>$row['week'],
            'week_year'=>2022,
            'week_of'=>$row['week_of_2022'],
            'company_name'=>$row['company'],
            'unique_id'=>$row['id'],
            'name'=>$row['name'],
            'phone'=>$row['phone'],
            'g_t'=>$row['gt'],
            'shift'=>$row['shift'],
            'reg_hours'=>$row['reg_hours'],
            'ot_hour'=>$row['ot_hours'],
            'total_hours'=>$row['total_hours'],
            'pay_rate'=>$row['pay_rate'],
            'cheq_dd_os'=>$row['chqddos'],
            'cheq'=>$row['chq'],
            'cheq_date'=>$row['cheque_date'],
            'cheq_amount_net'=>$row['chq_amount_net'],
            'stat_hours'=>$row['stat_hours'],
            'stat_amount'=>$row['stat_amount'],
            'billing_rate'=>$row['billing_rate'],
            'cheque_gross_amount'=>$row['chq_gross_amt']
        ]);
    }


    public function headingRow(): int
    {
        return 1;
    }

}
