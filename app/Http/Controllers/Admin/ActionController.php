<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;

class ActionController extends Controller
{
    public function index()
    {
    	$actions = Action::all();
    	return view('action.index', compact('actions'));
    }
}
