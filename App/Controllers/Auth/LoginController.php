<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Models\User;
use System\Base\Model;
use System\Base\Request;

class LoginController extends Controller
{
	public function show(User $user, Request $request)
	{
		$test_char = 'models';
		dd($user, $request, $test_char[2]);
	}
}
