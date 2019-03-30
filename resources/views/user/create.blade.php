@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">用户列表</div>
    <div class="card-body">
        <form action='/admin/users' method="POST">
            @csrf
            <div class="form-group">
                <label>用户名</label>
                <input type="text" class="form-control" name='name' value="{{ old('name')}}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name='email' value="{{ old('email')}}" required>
            </div>
            <div class="form-group">
                <label>密码</label>
                <input type="password" class="form-control" name='password' value="{{ old('password')}}" required>
            </div>
            <div class="form-group">
                <label>角色</label>
                <select class="form-control" name='role'>
                    <option value="0">用户</option>
                    <option value="9">管理员</option>
                </select>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary mx-2 col">提交</button>
                <button type="button" class="btn btn-secondary mx-2 col" onclick="history.back()">返回</button>
            </div>
        </form>
    </div>
</div>
<input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
@endsection
@push('js')
<script>
showErrors()

</script>
@endpush
