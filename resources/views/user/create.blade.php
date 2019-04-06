@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-plus"></i>新建用户</div>
    <div class="card-body">
        <form action='/admin/users' method="POST" class="show-errors">
            @csrf
            <div class="form-group">
                <label><i class="iconfont icon-user"></i>用户名</label>
                <input type="text" class="form-control" name='name' value="{{ old('name')}}" required>
            </div>
            <div class="form-group">
                <label><i class="iconfont icon-email"></i>Email</label>
                <input type="text" class="form-control" name='email' value="{{ old('email')}}" required>
            </div>
            <div class="form-group">
                <label><i class="iconfont icon-lock"></i>密码</label>
                <input type="password" class="form-control" name='password' value="{{ old('password')}}" required>
            </div>
            <div class="form-group">
                <label>角色</label>
                <select class="form-control" name='role'>
                    @foreach (\App\User::ROLES as $k => $v)
                    <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            @include('layouts.submit-button')
        </form>
    </div>
</div>
<input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
@endsection
