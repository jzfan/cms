@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header"><i class="iconfont icon-calculator"></i>统计</div>
    <div class="card-body">
        <nav class="mb-2">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="iconfont icon-linechart"></i>线图</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="iconfont icon-barchart"></i>柱图</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="chart-container chart-md">
                    <canvas id="chart-line"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="chart-container chart-md">
                    <canvas id="chart-bar"></canvas>
                </div>
            </div>
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

axios.get('/admin/chart/users')
    .then(res => {
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
