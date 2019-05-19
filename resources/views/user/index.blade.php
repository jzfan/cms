@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="iconfont icon-unorderedlist"></i>Users list
        <button type="button" class="btn btn-outline-secondary btn-sm float-right" onclick='window.location="/admin/users/create"'>
            <i class="iconfont icon-plus"></i>
            create
        </button>
        <button type="button" class="btn btn-outline-secondary btn-sm float-right mr-2" onclick='window.location="/admin/export/users"'>
            <i class="iconfont icon-file-excel"></i>
            export
        </button>
    </div>
    <div class="card-body">
        <table class="table table-hover table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">created_at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr data-id='{{ $user->id }}'>
                    <th scope="row">{{ $user->id }}</th>
                    <td><img src="/img/{{ $user->avatar }}" width="44px" class="rounded-circle" /> {{ $user->name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick='window.location="/admin/users/{{ $user->id }}/edit"'>
                            <i class="iconfont icon-edit"></i>Edit</button>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete"><i class="iconfont icon-delete"></i>Delete</button>
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
