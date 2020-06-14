<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','company','phone','address'];

    public static function search(String $query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('address', 'like', '%'.$query.'%')
                ->orWhere('company','like','%'.$query.'%')
                ->orWhere('phone','like','%'.$query.'%');
    }

    public function invoice()
    {
        return $this->belongsToMany(Invoice::class);
    }
}
