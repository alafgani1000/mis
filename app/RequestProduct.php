<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestProduct extends Model
{
    protected $fillable = ['request_id','product_id'];

    public function request()
    {
        return $this->belongsTo('App\Request');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
