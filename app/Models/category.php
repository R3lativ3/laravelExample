<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $fillable = [
        'category_name'
    ];

    public function products()
    {
        return $this->hasMany('App\Models\product');
    }
}
