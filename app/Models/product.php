<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_name',
        'product_price',
        'product_img',
        'product_description',
        'category_id'
    ];
}
