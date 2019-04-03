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

    public function chart()
    {
    	$arr = array_merge($this->zeroList(), $this->registeredIn30Days());
    	ksort($arr);
    	return $arr;
    }

    private function zeroList()
    {
    	$count = [];
    	for($i=30;$i--;) {
    		$count[date('Y-m-d', strtotime("-{$i} days"))] = 0;
    	}
    	return $count;
    }

    private function registeredIn30Days()
    {
    	$begin = date('Y-m-d', strtotime('-29 days'));
    	$arr = User::where('created_at', '>', $begin)
    					->select(['created_at'])
    					->pluck('created_at')
    					->map(function ($d) {
    						return substr($d, 0, 10);
    					})->all();

    	return array_count_values($arr);
    }
}
