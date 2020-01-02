@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-plus"></i>新建文章</div>
    <div class="card-body">
        <form action='/admin/articles' method="POST" class="show-errors">
            @csrf
            <div class="form-group">
                <label><i class="iconfont icon-user"></i>标题</label>
                <input type="text" class="form-control" name='title' value="{{ old('title')}}" required>
            </div>

            <div class="form-group">
                <label>内容</label>
                <textarea class="form-control" id="mark" name='content'></textarea>
            </div>
            @include('layouts.submit-button')
        </form>
    </div>
</div>
<input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
@endsection

@push('js')
<script>
    var simplemde = new Simplemde({
        element: document.getElementById("mark")
    });
</script>
@endpush