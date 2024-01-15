<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model {

	public $timestamp = false;
	protected $table = "role_user";
	public function users()
	{
		return $this->hasMany('App\Models\Users','id','role_id');
	}

}
