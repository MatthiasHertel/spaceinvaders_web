<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //setup the relation of the role to the user model
    public function users()
    {
      return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
}
