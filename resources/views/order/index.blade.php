@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <i class="iconfont icon-unorderedlist"></i>Orders list
        @include('order.search')
    </div>
    <div class="card-body">
        @include('order.table')
    </div>
    <div class="card-footer">
        {{ $orders->links() }}
    </div>
</div>
@endsection
@push('js')
<script>
// function exportorders() {
//     axios.post('/admin/orders/export')
// }

</script>
@endpush
