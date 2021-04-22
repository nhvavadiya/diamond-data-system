<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceMemoDetail extends Model
{
    protected $table = "invoice_memo_details";
    
    /**
     * Get the memo that owns the details.
     */
    public function memo()
    {
        return $this->belongsTo(InvoiceMemo::class);
    }
}
