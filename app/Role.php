<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public function requestApprovals()
    {
        return $this->hasMany('App\RequestApproval');
    }
}
