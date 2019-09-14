<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\Auth;

class Request extends Model
{
    protected $fillable = ['category_id','usability_id','user_id','title','format','start_date','end_date','status_id'];

    public function scopeOfBossSubordinates($query)
    {
        $query->whereIn('user_id', Auth::user()->getPersonnelNoSubordinates());
    }

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

    public function requestApprovals()
    {
        return $this->hasMany('App\RequestApproval');
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
