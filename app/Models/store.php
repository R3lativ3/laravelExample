<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    protected $fillable = [
        'store_name',
        'store_phone',
        'store_email',
        'store_address',
        'city_id'
    ];
}
