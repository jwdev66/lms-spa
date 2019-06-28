<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string description
 * @property string name
 */
class Role extends Model
{
    const ADMIN = 'admin';
    const INVESTIGATOR = 'investigator';

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
}
