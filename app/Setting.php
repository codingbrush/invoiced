<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['company','email','website','telephone','phone','address','issuer','logo'];
}
