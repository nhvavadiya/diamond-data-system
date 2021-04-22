<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoice";
    protected $fillable = [
        'l_invoice', 'e_invoice', 'customer_id','seller_id','reference','is_broker','percentage','date','term','duesate','payment_in','duedate','unit_price','carat_total','total','created_by'
    ];

    /**
     * Get the country that owns the invoice.
     */
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    /**
     * Get the customer that owns the invoice memo.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    
    /**
     * Get the invoice details for the invoice.
     */
    public function invoiceDetails()
    {
        return $this->hasMany(Invoicedetail::class);
    }
}
