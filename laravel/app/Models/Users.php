<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	protected $table = "users";
	protected $fillable = ['email', 'password', 'first_name', 'last_name'];
    public function userroles() {
		return $this->belongsToMany('App\Models\Roles', 'role_users', 'user_id', 'role_id');
	}
	public function alluserroles()
	{
		return $this->hasMany('App\Models\UserRoles','user_id','id');
	}
	}
