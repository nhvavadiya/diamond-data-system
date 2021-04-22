<?php

namespace App\Models;

use App\Models\Base\BaseModel;


class Customer extends BaseModel
{
    
    protected $table = "customers";
    protected $fillable = [
        'email', 'surname', 'name','company_name ','gender','position','date_of_birth','reference','address','mobile'
    ];
}
