<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Country extends BaseModel
{
    protected $table = "country";

    protected $fillable = [
        'name'
    ];

    /**
     * Get the invoice for the country.
     */
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

}
