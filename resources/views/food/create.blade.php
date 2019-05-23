@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-plus"></i>
      <span class="p-2" style='{{ \App\Color::style($category->color) }}'>
        Create a Food of {{ ucfirst($category->name) }}
      </span>
    </div>
    <div class="card-body">
        <form action='/admin/foods' method="POST" class="show-errors">
            @csrf
            <input type="hidden" name='category_id' value="{{ $category->id }}">
            <div class="form-group">
                <label>Abbr</label>
                <input type="text" class="form-control" name='abbr' value="{{ old('abbr')}}">
            </div>
           <div class="form-group">
               <label>Name</label>
               <input type="text" class="form-control" name='name' value="{{ old('name')}}">
           </div>
           <div class="form-group">
               <label>Price</label>
               <input type="number" step="0.01" class="form-control" name='price' value="{{ old('price')}}">
           </div>
           <div class="form-group">
               <label>Tax Rate(%)</label>
               <input type="number" step="0.01" class="form-control" name='tax_rate' value="{{ old('tax_rate')}}">
           </div>
           <div class="form-group">
               <label>Sort</label>
               <input type="number" class="form-control" name='sort' value="{{ old('sort')}}">
           </div>
            @include('layouts.submit-button')
        </form>
    </div>
</div>
<input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
@endsection
