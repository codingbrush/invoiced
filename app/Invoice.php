<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
    'invoice_no','invoice_date','due_date','discount','title','grand_total','subtotal'
    ];

    public function invoiceItem()
    {
    	return $this->hasMany(InvoiceItem::class);
    }
}
