<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
    	return UserResource::collection(User::paginate());
    }

}
