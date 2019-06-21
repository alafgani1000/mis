<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function requests()
    {
        return $this->hasMany('App\Request');
    }

    public function requestsApprovals()
    {
        return $this->hasMany('App\RequestApproval');
    }

    /**
     * get boss from eos api
     */
    public function boss()
    {
        $json = file_get_contents(
            "http://eos.krakatausteel.com/api/structdisp/"
            . $this->id 
            . "/minManagerBoss"
        );
        $data = json_decode($json,true);
        return User::find($data['personnel_no']);
    }

}
