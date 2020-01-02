@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="iconfont icon-unorderedlist"></i>文章列表
        <button type="button" class="btn btn-outline-secondary btn-sm float-right" onclick='window.location="/admin/articles/create"'>
            <i class="iconfont icon-plus"></i>
            新增
        </button>
    </div>
    <div class="card-body">
        <table class="table table-hover table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">标题</th>
                    <th scope="col">内容</th>
                    <th scope="col">创建于</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                <tr data-id='{{ $article->id }}' data-resource='articles'>
                    <th scope="row">{{ $article->id }}</th>
                    <td>
                    <a href="/admin/articles/{{ $article->id }}">
                            {{ Str::limit($article->title, 30, '...') }}</td>
                        </a>
                    <td>{{ Str::limit($article->content, 50, '...') }}</td>
                    <td>{{ $article->created_at->diffForHumans() }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick='window.location="/admin/articles/{{ $article->id }}/edit"'>
                            <i class="iconfont icon-edit"></i>编辑</button>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete"><i class="iconfont icon-delete"></i>删除</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $articles->links() }}
    </div>
</div>
@endsection
@push('js')
<script>
    // function exportarticles() {
    //     axios.post('/admin/articles/export')
    // }
</script>
@endpush