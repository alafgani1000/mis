<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name'];
    
    public function RequestProducts()
    {
        return $this->hasMany('App\RequestProduct');
    }
}
