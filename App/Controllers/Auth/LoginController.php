<?php

namespace App\Controllers\Auth;

use Exception;
use App\Models\User;
use System\Base\Request;
use App\Models\UserAddress;
use App\Controllers\Controller;

class LoginController extends Controller
{
	public function show(User $user, Request $request)
	{
		try {
			$where_1 = $user::where(['is_active' => 100])->update([
				'email' => 'biennwinate@gmail.com',
				'password' => 1234
			]);
			// dd($user::insert(['first_name' => 'Moses', 'last_name' => 'Bien', 'gender' => 'Bolanle', 'email' => 'biennwinate', 'username' => 'mosee', 'is_active' => 2]));
			// dd($where_1/* , $where_2 */);
			if ($where_1)
				dd('Passed');
			dd('Failed');
		} catch (Exception $th) {
			//throw $th;
			dd($th->getMessage(), $th->getTraceAsString());
		}
		// $where_2 = $user::orWhere(['email' => 'email1@mail.com'])->where(['username' => 'Bien-Glitch'])->get();
	}

	public function index()
	{
		return response(['message' => 'Hello World']);
	}
}
