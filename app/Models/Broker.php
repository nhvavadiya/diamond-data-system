<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;


class Broker extends BaseModel
{
    protected $table = "brokers";
    protected $fillable = ['email', 'surname', 'name', 'gender','date_of_birth ','reference','address','mobile'
];
}
