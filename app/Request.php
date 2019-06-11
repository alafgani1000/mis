<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function requestProducts()
    {
        return $this->hasMany('App\RequestProduct');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function requestAttachments()
    {
        return $this->hasMany('App\RequestAttachment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function usability()
    {
        return $this->belongsTo('App\Usability');
    }
}
