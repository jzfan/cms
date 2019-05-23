@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-edit"></i>Edit Category</div>
    <div class="card-body">
        <form action='/admin/categories/{{ $category->id }}' method="POST" class="show-errors">
            @csrf
            @method('put')
            <div class="form-group">
                <label><i class="iconfont icon-category"></i>category Name</label>
                <input type="text" class="form-control" name='name' value="{{ old('name', $category->name )}}">
            </div>
            <div class="form-group">
                <label>Job</label>
                <select class="form-control" name='job'>
                    @foreach (['bar', 'kitchen'] as $v)
                    <option value="{{ $v }}"
                        @if ($v === old('job', $category->job))
                            selected
                        @endif 
                    >{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label><i class="iconfont icon-lock"></i>Color</label>
                <select class="form-control" name='color'>
                    @foreach (array_keys(config('color')) as $v)
                    <option value="{{ $v }}" @if ($v===$category->color)
                        selected
                        @endif
                        >{{ $v }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label><i class="iconfont icon-user"></i>Sort</label>
                <input type="number" class="form-control" name='sort' value="{{ old('sort', $category->sort)}}" required>
            </div>
            @include('layouts.submit-button')
        </form>
        <input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
    </div>
</div>
@endsection
