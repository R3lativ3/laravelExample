<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quote_detail extends Model
{
    protected $fillable = [
        'quantity',
        'product_id',
        'quote_id'
    ];
}
