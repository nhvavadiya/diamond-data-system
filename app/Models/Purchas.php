<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchas extends Model
{
    protected $table = "invoice";
    protected $fillable = [
        'l_invoice', 'e_invoice', 'customer_id','seller_id','reference','is_broker','percentage','date','term','duesate','payment_in','carat_total','total','created_by'
    ];
}
