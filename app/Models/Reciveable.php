<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reciveable extends Model
{
    protected $table = "transaction";
    protected $fillable = [
         'date', 'invoice_id', 'note','created_by'
    ];
}
