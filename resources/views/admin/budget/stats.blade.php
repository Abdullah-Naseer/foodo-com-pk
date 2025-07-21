@extends('layouts.admin')
@section('title', 'Budget & Profit - Stats')


@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0">Budget & Profit Overview – {{$currentMonth}} {{$currentYear}}</h1>
                <form action="{{route('admin.budget.stats')}}" method="GET" class="form-inline">
                    <div class="d-flex gap-3">
                        <select class="form-control select2" name="month" id="month">
                            <option value="">Select Month</option>
                            @foreach ($months as $m)
                                <option value="{{ $m }}" {{ $currentMonth == $m ? 'selected' : '' }}>
                                    {{ $m }}
                                </option>
                            @endforeach
                        </select>
                        <select name="year" class="form-control select2" id="yearSelect">
                            <option value="">Select Year</option>
                            @for ($year = 2025; $year <= date('Y'); $year++)
                                <option value="{{ $year }}" {{ $currentYear == $year ? 'selected' : ''}}>{{ $year }}</option>
                            @endfor
                        </select>
                        <button class="btn btn-primary btn-sm rounded">Filter</button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        @foreach ($stats as $label => $stat)                            
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">{{$label}}</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                @if($stat->icon)
                                                <i class="align-middle" data-feather="{{$stat->icon}}"></i>
                                                @else
                                                <span class="align-middle">{{$stat->text}}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">{{$stat->value}}</h1>
                                    <div class="mb-0">
                                        <span class="text-muted">For Month of {{$currentMonth}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <div class="col-12 col-lg-6">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title">Profit Trend by Month - Year {{$currentYear}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chartjs-line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Monthly Revenue vs Expenses - Year {{$currentYear}}</h5>
                            <div>
                                <span class="badge bg-primary">Monthly Revenue</span>
                                <span style="background-color: #dee2e6;" class="badge text-black">Expense</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chartjs-bar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Profit vs Expense - Year {{$currentYear}}</h5>
                            <div>
                                <span class="badge bg-primary">Profit %</span>
                                <span style="background-color: #dee2e6;" class="badge text-black">Expense</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chartjs-pie"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bar chart
        new Chart(document.getElementById("chartjs-bar"), {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Monthly Revenue",
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: @json($amountsReceived),
                    barPercentage: .75,
                    categoryPercentage: .5
                }, {
                    label: "Expenses",
                    backgroundColor: "#dee2e6",
                    borderColor: "#dee2e6",
                    hoverBackgroundColor: "#dee2e6",
                    hoverBorderColor: "#dee2e6",
                    data: @json($monthlyExpenses),
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [{
                        stacked: false,
                        gridLines: {
                            color: "transparent"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Line chart
        new Chart(document.getElementById("chartjs-line"), {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Profit (PKR)",
                    fill: true,
                    backgroundColor: "transparent",
                    borderColor: window.theme.primary,
                    data: @json($monthlyProfit),
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.05)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 500
                        },
                        display: true,
                        borderDash: [5, 5],
                        gridLines: {
                            color: "rgba(0,0,0,0)",
                            fontColor: "#fff"
                        }
                    }]
                }
            }
        });
    });
</script>
<script>
    const chartData = {!! json_encode(array_map(fn($v) => round($v, 2), $profitExpense)) !!};
    const chartDatas = @json($profitExpense);
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-pie"), {
            type: "pie",
            data: {
                labels: ["Profit %", "Expense"],
                datasets: [{
                    data: chartData,
                    backgroundColor: [
                        window.theme.primary,
                        "#dee2e6",
                    ],
                    borderColor: "transparent"
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                }
            }
        });
    });
</script>
@endpush
