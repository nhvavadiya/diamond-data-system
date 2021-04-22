<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoicedetail extends Model
{
    protected $table = "invoice_details";
    protected $fillable = ['no','branch','is_gia ','details','pcs','carat','unit_price','amount'];
}
