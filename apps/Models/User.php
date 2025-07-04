<?php

namespace App\Models;

class User extends Model
{
	protected $hidden = [
		'username'
	];

	public function address()
	{
		return $this->hasOne(UserAddress::class);
	}

	public function addresses()
	{
		return $this->belongsTo(UserAddress::class);
	}
}
