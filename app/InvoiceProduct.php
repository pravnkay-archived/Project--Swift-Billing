<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
	protected $guarded = [];
	
	public function products()
    {
        return $this->belongsTo('App\Invoice');
    }
}
