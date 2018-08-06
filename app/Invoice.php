<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $guarded = [];
    /**
     * Get the customer record associated with the invoice.
     */
    public function customer()
    {
        return $this->hasOne('App\InvoiceCustomer');
    }

    /**
     * Get the products for the invoice.
     */
    public function product()
    {
        return $this->hasMany('App\InvoiceProduct');
    }
}
