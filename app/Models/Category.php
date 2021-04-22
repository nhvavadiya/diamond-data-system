<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Category extends BaseModel
{
    protected $table = "expense_category";
    protected $fillable = [
        'name','status '
    ];
}
