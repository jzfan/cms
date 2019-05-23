@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-edit"></i>Edit Food</div>
    <div class="card-body">
        <form action='/admin/foods/{{ $food->id }}' method="POST" class="show-errors">
            @csrf
            @method('put')
            <div class="form-group">
                <label></i>Abbr</label>
                <input type="text" class="form-control" name='abbr' value="{{ old('abbr', $food->abbr)}}">
            </div>
            <div class="form-group">
                <label></i>Name</label>
                <input type="text" class="form-control" name='name' value="{{ old('name', $food->name )}}">
            </div>
            <div class="form-group">
                <label></i>Category</label>
                <select class="form-control" name='category_id'>
                    @foreach (\App\Category::all() as $category)
                    <option value="{{ $category->id }}" @if ($category->id===$food->category_id)
                        selected
                        @endif
                        >{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label></i>Price</label>
                <input type="number" step="0.01" class="form-control" name='price' value="{{ old('price', $food->price )}}">
            </div>
            <div class="form-group">
                <label></i>Sort</label>
                <input type="number" class="form-control" name='sort' value="{{ old('sort', $food->sort )}}">
            </div>
            <div class="form-group">
                <label></i>Tax Rate(%)</label>
                <input type="number" step="0.01" class="form-control" name='tax_rate' value="{{ old('tax_rate', $food->tax_rate )}}">
            </div>
            @include('layouts.submit-button')
        </form>
        <input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
    </div>
</div>
@endsection