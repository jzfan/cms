@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-linechart"></i>统计图</div>
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
    labels: [],
    datasets: [{
        label: "注册用户",
        backgroundColor: "rgba(23,162,184,0.2)",
        borderColor: "rgba(23,162,184,1)",
        borderWidth: 2,
        hoverBackgroundColor: "rgba(23,162,184,0.4)",
        hoverBorderColor: "rgba(23,162,184,1)",
        data: [],
    }]
};

var options = {
    maintainAspectRatio: false,
    scales: {
        yAxes: [{
            stacked: true,
            gridLines: {
                display: true,
                color: "rgba(23,162,184,0.2)"
            }
        }],
        xAxes: [{
            gridLines: {
                display: false
            }
        }]
    }
};

axios.get('/api/users/chart')
    .then(res => {
        console.log(res.data)
        for (let i in res.data) {
            data.labels.push(i.slice(5))
            data.datasets[0].data.push(res.data[i])
        }
        // data.datasets[0].data = res.data

        Chart.Bar('chart-bar', {
            options: options,
            data: data
        });

        Chart.Line('chart-line', {
            data: data,
            options: options
        });
    })

</script>
@endpush
