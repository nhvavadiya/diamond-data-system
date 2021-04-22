<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceMemo extends Model
{
    protected $table = "invoice_memo";

    /**
     * Get the memo details for the memo.
     */
    public function memoDetails()
    {
        return $this->hasMany(InvoiceMemoDetail::class);
    }

    /**
     * Get the customer that owns the invoice memo.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
