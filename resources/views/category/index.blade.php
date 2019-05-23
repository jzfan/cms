@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="iconfont icon-unorderedlist"></i>Categories list
        <button type="button" class="btn btn-outline-secondary btn-sm float-right" onclick='window.location="/admin/categories/create"'>
            <i class="iconfont icon-plus"></i>
            create
        </button>
    </div>
    <div class="card-body">
        <table class="table table-hover table-responsive-md">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Job</th>
                    <th scope="col">Color</th>
                    <th scope="col">Sort</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr data-url='/admin/categories/{{ $category->id }}'>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->job }}</td>
                    <td><p class="py-2 text-center" style='{{ \App\Color::style($category->color) }}'>{{ $category->color }}</p>
                    </td>
                    <td style="text-indent: 10px">{{ $category->sort }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick='window.location="/admin/categories/{{ $category->id }}/edit"'>
                            <i class="iconfont icon-edit"></i>Edit</button>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete"><i class="iconfont icon-delete"></i>Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('js')
<script>
// function exportcategories() {
//     axios.post('/admin/categories/export')
// }

</script>
@endpush
