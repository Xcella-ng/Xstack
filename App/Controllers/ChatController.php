<?php

namespace App\Controllers;

use App\Models\Pay;
use App\Models\Ply;
use App\Models\User;
use System\Base\Request;
use System\Base\Validator;
use App\Models\UserAddress;


class ChatController extends Controller
{
	public function show(Request $request)
	{

		// global $errorKeys;
		$request->add('errorKeys', []);
		$validator = Validator::init($request->toArray(), [
			'id' => ['required', 'email', 'string', 'date:m-d-Y'],
			'name_bass' => ['required', 'array'],
		]);

		dd($validator->errors());
		return view('index', ['error' => $validator->errors()]);
	}
}
