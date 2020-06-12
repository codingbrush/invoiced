<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $fillable = ['invoice_id','quantity','description','unit_price','total'];

    public function invoice()
    {
    	return $this->belongsTo(Invoice::class);
    }
}
