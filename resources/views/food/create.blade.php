@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-plus"></i>Create Food</div>
    <div class="card-body">
        <form action='/admin/foods' method="POST" class="show-errors">
            @csrf
            <div class="form-group">
                <label><i class="iconfont icon-food"></i>Abbr</label>
                <input type="text" class="form-control" name='abbr' value="{{ old('abbr')}}">
            </div>
           <div class="form-group">
               <label><i class="iconfont icon-food"></i>Name</label>
               <input type="text" class="form-control" name='name' value="{{ old('name')}}">
           </div>
           <div class="form-group">
               <label><i class="iconfont icon-lock"></i>Category</label>
               <select class="form-control" name='category_id'>
                   @foreach (\App\Category::all() as $category)
                   <option value="{{ $category->id }}" @if ($category->id===old('category_id'))
                       selected
                       @endif
                       >{{ $category->name }}</option>
                   @endforeach
               </select>
           </div>
           <div class="form-group">
               <label><i class="iconfont icon-food"></i>Price</label>
               <input type="number" class="form-control" name='price' value="{{ old('price')}}">
           </div>
           <div class="form-group">
               <label><i class="iconfont icon-food"></i>Tax Rate(%)</label>
               <input type="number" class="form-control" name='tax_rate' value="{{ old('tax_rate')}}">
           </div>
            @include('layouts.submit-button')
        </form>
    </div>
</div>
<input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
@endsection
