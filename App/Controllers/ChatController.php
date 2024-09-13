<?php

namespace App\Controllers;

use System\Base\Request;
use System\Base\Validator;

class ChatController extends Controller
{
	public function show(Request $request)
	{
		dd($request);
		Validator::init($request->toArray(), [
			'id' => ['required', 'string', 'numeric']
		]);
	}
}
