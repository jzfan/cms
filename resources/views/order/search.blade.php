<span class="ml-4">
    <a class="btn btn-primary" href="/admin/orders?day=today" role="button">Today</a>
    <a class="btn btn-secondary" href="/admin/orders?day=yestoday" role="button">Yestoday</a>
    <a class="btn btn-dark" href="/admin/orders?day=lastweek" role="button">Last {{ date('l', strtotime('-7 day')) }}</a>
    <button type="button" id="datepicker" class="btn btn-success">Pick a Day</button>
</span>
@push('js')
<script>
var picker = new Pikaday({
    field: document.getElementById('datepicker'),
    format: 'YYYY-MM-DD',
    maxDate: new Date(),
    onSelect: function() {
    	window.location = '/admin/orders?day=' + this.getMoment().format('YYYY-MM-DD')
        console.log(this.getMoment().format('YYYY-MM-DD'))
    }
});

</script>
@endpush
