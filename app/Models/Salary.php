<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
            'week',
            'week_year',
            'week_of',
            'company_name',
            'unique_id',
            'name',
            'phone',
            'g_t',
            'shift',
            'reg_hours',
            'ot_hour',
            'total_hours',
            'pay_rate',
            'cheq_dd_os',
            'cheq',
            'cheq_date',
            'cheq_amount_net',
            'stat_hours',
            'stat_amount',
            'billing_rate',
            'cheque_gross_amount',
            'deleted_at'
    ];

}
