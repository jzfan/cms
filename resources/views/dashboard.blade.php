@extends('layouts.app')
@section('content')
<div class="row mb-4 px-3">
    <div class="card text-white bg-secondary col">
        <div class="card-body">
            <h5 class="card-title">Income Today</h5>
            <h6 class="card-subtitle mb-2">{{ date('l dS \of F Y') }}</h6>
            <p class="card-text">
                <dl class="row">
                    <dt class="col-3">Total</dt>
                    <dd class="col-9 letter-space">$ {{ number_format($total, 2) }}</dd>
                    <dt class="col-3">Income</dt>
                    <dd class="col-9 letter-space">$ {{ number_format($total - $tax, 2) }}</dd>
                    <dt class="col-3">Tax</dt>
                    <dd class="col-9 letter-space">$ {{ number_format($tax, 2) }}</dd>
                </dl>
            </p>
        </div>
    </div>
    <div class="card text-white bg-primary col">
        <div class="card-body">
            <h5 class="card-title">Orders Today</h5>
            <h6 class="card-subtitle mb-2">{{ date('l dS \of F Y') }}</h6>
            <p class="card-text">
                <dl class="row">
                    <dt class="col-3">Count</dt>
                    <dd class="col-9 letter-space">{{ $orders_count }}</dd>
                </dl>
            </p>
        </div>
    </div>
</div>
<div class="chart-container chart-md mb-4">
    <canvas id="chart-line"></canvas>
</div>
@endsection
@push('js')
<script>
var data = {
    labels: ['Mon', 'Tues', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
    datasets: [{
            label: "This Week",
            backgroundColor: "rgba(23,162,184,0.2)",
            borderColor: "rgba(23,162,184,1)",
            borderWidth: 2,
            hoverBackgroundColor: "rgba(23,162,184,0.4)",
            hoverBorderColor: "rgba(23,162,184,1)",
            // data: []
        },
        {
            label: "Last Week",
            backgroundColor: "rgba(220,220,220,0.5)",
            borderColor: "rgba(220,220,220,0.8)",
            borderWidth: 2,
            hoverBackgroundColor: "rgba(220,220,220,0.75)",
            hoverBorderColor: "rgba(220,220,220,1)",
            // data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};

var options = {
    scaleBeginAtZero: true,

    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: true,

    //String - Colour of the grid lines
    // scaleGridLineColor : "rgba(0,0,0,.05)",

    //Number - Width of the grid lines
    scaleGridLineWidth: 1,

    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,

    //Boolean - If there is a stroke on each bar
    barShowStroke: true,

    //Number - Pixel width of the bar stroke
    barStrokeWidth: 2,

    //Number - Spacing between each of the X value sets
    barValueSpacing: 5,

    //Number - Spacing between data sets within X values
    barDatasetSpacing: 1,
};
axios.get('/admin/chart/sold')
    .then(res => {
        console.log(res.data)
        data.datasets[0].data = res.data.this_week
        data.datasets[1].data = res.data.last_week

        Chart.Bar('chart-line', {
            data: data,
            options: options
        });
    })

</script>
@endpush
