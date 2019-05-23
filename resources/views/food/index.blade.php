@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="iconfont icon-unorderedlist"></i>
        <span class="p-2" style='{{ \App\Color::style($category->color) }}'>Foods of {{ ucfirst($category->name) }}
        </span>
        <button type="button" class="btn btn-outline-secondary btn-sm float-right" onclick='window.location="/admin/foods/create?cid={{ $category->id }}"'>
            <i class="iconfont icon-plus"></i>
            create
        </button>
    </div>
    <div class="card-body">
        <table class="table table-hover table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Abbr</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Tax Rate</th>
                    <th scope="col">sort</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                <tr data-url='/admin/foods/{{ $food->id }}'>
                    <th scope="row">{{ $food->id }}</th>
                    <td>{{ $food->abbr }}</td>
                    <td>{{ $food->name }}</td>
                    <td>{{ $food->price }}</td>
                    <td>{{ $food->tax_rate }} @if ($food->tax_rate) % @endif</td>
                    <td>{{ $food->sort }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick='window.location="/admin/foods/{{ $food->id }}/edit"'>
                            <i class="iconfont icon-edit"></i>Edit</button>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete"><i class="iconfont icon-delete"></i>Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $foods->links() }}
    </div>
</div>
@endsection
@push('js')
<script>
// function exportfoods() {
//     axios.post('/admin/foods/export')
// }

</script>
@endpush
