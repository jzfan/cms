@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        <div class="chart-container" style="position: relative; height:30vh; width:75vw">
            <canvas id="chart-bar"></canvas>
        </div>
        <div class="chart-container" style="position: relative; height:30vh; width:75vw">
            <canvas id="chart-line"></canvas>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
var data = {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
    datasets: [{
        label: "Dataset #1",
        backgroundColor: "rgba(255,99,132,0.2)",
        borderColor: "rgba(255,99,132,1)",
        borderWidth: 2,
        hoverBackgroundColor: "rgba(255,99,132,0.4)",
        hoverBorderColor: "rgba(255,99,132,1)",
        data: [65, 59, 20, 81, 56, 55, 40],
    }]
};

var options = {
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            stacked: true,
            gridLines: {
                display: true,
                color: "rgba(255,99,132,0.2)"
            }
        }],
        xAxes: [{
            gridLines: {
                display: false
            }
        }]
    }
};

Chart.Bar('chart-bar', {
    options: options,
    data: data
});

Chart.Line('chart-line', {
    data: data,
    options: options
});

</script>
@endpush
