<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function requests()
    {
        return $this->hasMany('App\Request');
    }
    
    public function requestApprovals()
    {
        return $this->hasMany('App\RequestApproval');
    }
    
    public function scopeRequestCreated($query)
    {
        return $query->where('id',1);
    }

    public function scopeBossApproved($query)
    {
        return $query->where('id',2);
    }

    public function scopeSptMisApproved($query)
    {
        return $query->where('id',3);
    }

    public function scopeMgrMisApproved($query)
    {
        return $query->where('id',4);
    }

    public function scopeBossRejected($query)
    {
        return $query->where('id',5);
    }

    public function scopeSptMisRejected($query)
    {
        return $query->where('id',6);
    }

    public function scopeMgrMisRejected($query)
    {
        return $query->where('id',7);
    }
}
