<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestApproval extends Model
{
    public function request()
    {
        return $this->belongsTo('App\Request');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
