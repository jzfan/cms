@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-edit"></i>编辑用户</div>
    <div class="card-body">
        <form action='/admin/users/{{ $user->id }}' method="POST" class="show-errors">
            @csrf
            @method('put')
            <div class="form-group">
                <label><i class="iconfont icon-user"></i>用户名</label>
                <input type="text" class="form-control" name='name' value="{{ old('name', $user->name )}}">
            </div>
            <div class="form-group">
                <label><i class="iconfont icon-email"></i>Email</label>
                <input type="text" class="form-control" name='email' value="{{ old('email', $user->email )}}">
            </div>
            <div class="form-group">
                <label><i class="iconfont icon-lock"></i>角色</label>
                <select class="form-control" name='role'>
                    @foreach (\App\User::ROLES as $k => $v)
                    <option value="{{ $k }}" @if ($v===$user->role)
                        selected
                        @endif
                        >{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            @include('layouts.submit-button')
        </form>
        <input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
    </div>
</div>
@endsection
