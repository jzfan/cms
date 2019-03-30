@if (session()->has('notice'))
<input type="hidden" id='notice-log' value="{{ session()->get('notice') }}">
@endif
<div id='notice-div' class="position-fixed" style="top:80px; right: 15px; width: 180px; z-index: 99; display: none;">
    <div class="alert alert-warning font-weight-bold text-dark">
    </div>
</div>
@push('js')
<script>
if (message = $('#notice-log').val()) {
    flash(message)
}

</script>
@endpush
