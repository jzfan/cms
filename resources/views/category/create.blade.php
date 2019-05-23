@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-plus"></i>Create Category</div>
    <div class="card-body">
        <form action='/admin/categories' method="POST" class="show-errors">
            @csrf
            <div class="form-group">
                <label><i class="iconfont icon-user"></i>Name</label>
                <input type="text" class="form-control" name='name' value="{{ old('name')}}" required>
            </div>
            <div class="form-group">
                <label>Job</label>
                <select class="form-control" name='job'>
                    @foreach (['bar', 'kitchen'] as $v)
                    <option value="{{ $v }}"
                        @if ($v === old('job'))
                            selected
                        @endif 
                    >{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Color</label>
                <select class="form-control" name='color'>
                    @foreach (config('color') as $k => $v)
                    <option value="{{ $k }}"
                        @if ($k === old('color'))
                            selected
                        @endif 
                    >{{ $k }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label><i class="iconfont icon-user"></i>Sort</label>
                <input type="number" class="form-control" name='sort' value="{{ old('sort')}}" required>
            </div>
            @include('layouts.submit-button')
        </form>
    </div>
</div>
<input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
@endsection
