<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $fillable = [
        'quantity',
        'store_id',
        'product_id'
    ];
    
}
