<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Purchaser extends BaseModel
{
    protected $table = "purchasers";
    protected $fillable = [
        'email', 'surname', 'name','position','branch','mobile'
    ];
}
