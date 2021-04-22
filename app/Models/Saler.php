<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Saler extends BaseModel
{
    protected $table = "salers";

    protected $fillable = [
        'email', 'surname', 'name', 'nick_name', 'gender', 'date_of_birth', 'position', 'branch', 'mobile'
    ];

    /**
     * Get the purchase details for the purchase.
     */
    public function invoicePurchase()
    {
        return $this->hasMany(InvoicePurchase::class, 'id');
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' (' . $this->nick_name . ')';
    }
}
