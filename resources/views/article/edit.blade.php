@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-edit"></i>编辑文章</div>
    <div class="card-body">
        <form action='/admin/articles/{{ $article->id }}' method="POST" class="show-errors">
            @csrf
            @method('put')
            <div class="form-group">
                <label><i class="iconfont icon-article"></i>标题</label>
                <input type="text" class="form-control" name='title' value="{{ old('title', $article->title )}}">
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea class="form-control" id="mark" name='content' value="{{ old('content', $article->content )}}"></textarea>
            </div>
            @include('layouts.submit-button')
        </form>
        <input type="hidden" id='errors' value='{{ $errors->toJson() }}'>
    </div>
</div>
@endsection

@push('js')
<script>
    var simplemde = new Simplemde({
        element: document.getElementById("mark")
    });
    simplemde.value(@json($article->content));
</script>
@endpush