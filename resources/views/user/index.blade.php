@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="iconfont icon-unorderedlist"></i>用户列表
        <button type="button" class="btn btn-outline-secondary btn-sm float-right" onclick='window.location="/admin/users/create"'>
            <i class="iconfont icon-plus"></i>
            新增
        </button>
        <button type="button" class="btn btn-outline-secondary btn-sm float-right mr-2" onclick='window.location="/admin/export/users"'>
            <i class="iconfont icon-file-excel"></i>
            导出
        </button>
    </div>
    <div class="card-body">
        <table class="table table-hover table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">用户</th>
                    <th scope="col">角色</th>
                    <th scope="col">Email</th>
                    <th scope="col">创建于</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr data-id='{{ $user->id }}' data-resource='users'>
                    <th scope="row">{{ $user->id }}</th>
                    <td><img src="/img/{{ $user->avatar }}" width="44px" class="rounded-circle" /> {{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick='window.location="/admin/users/{{ $user->id }}/edit"'>
                            <i class="iconfont icon-edit"></i>编辑</button>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete"><i class="iconfont icon-delete"></i>删除</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $users->links() }}
    </div>
</div>
@endsection
@push('js')
<script>
    // function exportUsers() {
    //     axios.post('/admin/users/export')
    // }
</script>
@endpush