@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">用户列表</div>
    <div class="card-body">
        <form action='/admin/users/{{ $user->id }}' method="POST">
            {{ csrf_field() }}
            @method('put')
            <div class="form-group">
                <label>用户名</label>
                <input type="text" class="form-control" name='name' value="{{ old('name', $user->name )}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name='email' value="{{ old('email', $user->email )}}">
            </div>
            <div class="form-group">
                <label>角色</label>
                <select class="form-control" name='role'>
                    @foreach (\App\User::ROLES as $k => $v)
                    <option value="{{ $k }}" @if ($v===$user->role)
                        selected
                        @endif
                        >{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
    </div>
</div>
@endsection
@push('js')
<script>
showErrors()

</script>
@endpush('js')
