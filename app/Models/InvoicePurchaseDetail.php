<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicePurchaseDetail extends Model
{
    protected $table = "invoice_purchase_details";

    /**
     * Get the purchase that owns the details.
     */
    public function purchase()
    {
        return $this->belongsTo(InvoicePurchase::class);
    }
}
