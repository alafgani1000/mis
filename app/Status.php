<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function requests()
    {
        return $this->hasMany('App\Request');
    }
    
    public function scopeRequestCreated($query)
    {
        return $query->where('id',1);
    }

    public function scopeBossApproved($query)
    {
        return $query->where('id',2);
    }
    
}
