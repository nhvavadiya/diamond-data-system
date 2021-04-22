<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class StockTransfer extends BaseModel
{
    protected $table = "stock_transfer";

    protected $fillable = [
        'gia_id','stock','send_from','send_to','created_by'
    ];
}
