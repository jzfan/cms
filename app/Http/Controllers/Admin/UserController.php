<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('user.index', compact('users'));
    }

    public function show(User $user)
    {
        return $user;
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        $data = $this->checkInput();
        User::create($data);
        session()->flash('notice', "新建操作成功");
        return redirect()->route('users.index');
    }

    public function update(User $user)
    {
        $data = $this->checkInput([
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);
        $user->update($data) && session()->flash('notice', "更新操作成功");
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if ($user->delete()) {
            return 'ok';
        }
    }

    protected function checkInput($rule = [])
    {
        $rule = array_merge([
            'name' => 'required|alphaDash|between:2, 10',
            'role' => 'required|integer|min:0|max:9',
            'email' => 'required|email|unique:users',
            'password' => 'alphaDash|between:6, 255',
        ], $rule);

        return $this->validate(request(), $rule);
    }

}
