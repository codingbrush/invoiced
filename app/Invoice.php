<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
    'invoice_no','invoice_date','due_date','discount','title','grand_total','subtotal'
    ,'setting_id'];

    public function invoiceItem()
    {
    	return $this->hasMany(InvoiceItem::class);
    }

    public function customer()
    {
        return $this->belongsToMany(Customer::class);
    }

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }

    public static function search(String $query)
    {
        return empty($query) ? static::query()
            : static::where('invoice_no', 'like', '%'.$query.'%')
                ->orWhere('invoice_date', 'like', '%'.$query.'%')
                ->orWhere('due_date','like','%'.$query.'%')
                ->orWhere('title','like','%'.$query.'%');
    }
}
