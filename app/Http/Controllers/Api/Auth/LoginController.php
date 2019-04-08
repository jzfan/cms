<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
	use AuthenticatesUsers;

	public function __construct()
	{
	    $this->middleware('guest')->except('logout');
	}

	protected function sendLoginResponse(Request $request)
	{
	    $this->clearLoginAttempts($request);

	    $token = auth()->user()->freshToken();

	    return response()->json(auth()->user(), 200, [
	    	'Authorization' => "Bearer {$token}"
	    ]);
	}
}
