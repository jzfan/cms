@extends('layouts.app')
@section('content')
<div class="row">
    
@foreach ($categories as $category)
<div class="section col-4 mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ ucfirst($category->name) }}</h5>
        <p class="card-text">with {{ $category->foods_count }} kind of foods</p>
        <a href="/admin/category/{{ $category->id }}/foods" class="btn" style='{{ \App\Color::style($category->color) }}''>Enter</a>
      </div>
    </div>
</div>
@endforeach
</div>
@endsection
@push('js')
<script>
</script>
@endpush
