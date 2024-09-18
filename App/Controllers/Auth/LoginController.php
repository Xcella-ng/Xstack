<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use System\Base\Request;

class LoginController extends Controller
{
	public function show(User $user, Request $request)
	{
		$where_1 = $user::where(['is_active' => true])->get(['phone']);
		$where_2 = $user::orWhere(['email' => 'email1@mail.com'])->where(['username' => 'Bien-Glitch'])->get();
		dd($where_1, $where_2);
	}
}
