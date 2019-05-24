<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function show()
    {
    	return view('admin.show', [
    		'admin' => auth()->user()
    	]);
    }

    public function update()
    {
    	$data = request()->validate([
    		'email' => 'email',
    		'name' => 'min:2'
    	]);
    	if (request('password') === request('password_confirmation')) {
    		$data['password'] = password_hash(request('password'), PASSWORD_DEFAULT);
    	}
    	auth()->user()->update($data);
    	session()->flash('notice', 'updated successfuly');
    	return redirect('/admin/info');
    }
}
