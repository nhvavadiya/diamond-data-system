<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Branch extends BaseModel
{
    protected $table = "branch";

    protected $fillable = [
        'name'
    ];
}
