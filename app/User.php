<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Mpociot\Teamwork\Traits\UserHasTeams;
use Spatie\Permission\Traits\HasRoles;
use Fenos\Notifynder\Notifable;

class User extends Authenticatable
{
    use UserHasTeams;
    use HasRoles;
    use Notifable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'firstname',
        'password',
        'email',
        'adresse',
        'telephone',
        'date_naissance',
        'ville_naissance',
        'nationalite',
        'num_secu',
        'statut',
        'pes'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getProfilePic($size)
    {
        return 'https://www.gravatar.com/avatar/'.md5($this->email).'?s='.$size;
    }

    public function statuses()
    {
        return $this->hasMany('App\Status', 'user_id');
    }
}
