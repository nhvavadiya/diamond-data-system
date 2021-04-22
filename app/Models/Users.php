<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Users extends BaseModel
{
    protected $table = "users";

    protected $fillable = [
        'name', 'email ', 'password'
    ];
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
