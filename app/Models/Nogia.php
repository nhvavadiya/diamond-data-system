<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Nogia extends BaseModel
{
    protected $table = "no_gia";
    protected $fillable = [ 
        'details','pc','carat','price','total'
    ];
}
