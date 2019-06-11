<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestAttachment extends Model
{
    //
    protected $fillable = ['attachment','name','alias'];
    
    public function request()
    {
        return $this->belongsTo('App\Request');
    }
}
