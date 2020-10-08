<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class quote extends Model
{
    protected $fillable = [
        'email_client',
        'quote_date'
    ];

    
    public function quote_details()
    {
        return $this->hasMany('App\Models\quote_detail');
    }
}
