@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        My Info
    </div>
    <div class="card-body">
        <form action="/admin/info" method="POST">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name='name' class="form-control" 
                value="{{ old('name', $admin->name )}}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name='email' 
                value="{{ old('email', $admin->email )}}">
            </div>

            <div class="collapse" id="collapsePasswd">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name='password'>
                </div>
                <div class="form-group">
                    <label>{{ __('Confirm Password') }}</label>
                    <input type="password" class="form-control" name="password_confirmation">
                </div>
            </div>
            <div class="form-group mt-4">
              <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapsePasswd" aria-expanded="false" aria-controls="collapsePasswd">
                Reset Password
              </button>
              <button class="btn btn-primary" type="submit">
                Update
              </button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('js')
<script>

</script>
@endpush
