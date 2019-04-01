@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        用户列表
        <button type="button" class="btn btn-primary btn-sm float-right" onclick='window.location="/admin/users/create"'> + </button>
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
                <tr data-id='{{ $user->id }}'>
                    <th scope="row">{{ $user->id }}</th>
                    <td><img src="/img/{{ $user->avatar }}" width="44px" /> {{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick='window.location="/admin/users/{{ $user->id }}/edit"'>编辑</button>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick='deleteUser($(this))'>删除</button>
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
function deleteUser(btn) {
    deleteTr(btn)
    flash('删除操作成功')
}

</script>
@endpush
