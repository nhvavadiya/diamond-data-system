<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicePurchase extends Model
{
    protected $table = "invoice_purchase";

    /**
     * Get the purchase details for the purchase.
     */
    public function purchaseDetails()
    {
        return $this->hasMany(InvoicePurchaseDetail::class);
    }

    /**
     * Get the saler that owns the invoice purchase.
     */
    public function saler()
    {
        return $this->belongsTo(Saler::class, 'seller_id', 'id');
    }
}
