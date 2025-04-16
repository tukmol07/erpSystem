<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploymentRecord extends Model
{
    protected $fillable = [
        'employee_name',
        'employee_number',
        'visa_number',
        'category_resident',
        'nationality',
        'date_arrival',
        'date_hired',
        'kiwa_contract_number',
        'salary',
        'educational_background',
        'skills',
        'ticket_provided',
        'residence_renewal',
    ];
}
