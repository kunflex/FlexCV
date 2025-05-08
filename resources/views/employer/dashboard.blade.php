@extends('admin-layout')

@section('title', 'Employer Dashboard')

@section('styles')
    <style>
        .data-content {
            width: auto;
            height: auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 30px;
        }

        .chart-box {
            width: auto;
            height: auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 30px;
        }

        .chart-display {
            width: auto;
            height: auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
        }

        .cards-data {
            width: auto;
            height: auto;
            background-color: white;
            box-shadow: 2px 3px 8px #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            user-select: none;
            cursor: pointer;
            border-left: 12px solid #0095ff;
        }

        .bs {
            float: left;
            font-size: 32px;
            color: blue;
            text-align: center;
        }

        .bs0 {
            display: inline-flex;
            gap: 40px;
            font-size: 16px;
        }

        .bs1 {
            float: left;
            color: darkgreen;
        }

        .bs2 {
            float: right;
            color: darkblue;
        }

        .header {
            user-select: none;
            cursor: pointer;
        }

        .header a {
            text-decoration: none;
            color: black;
        }

        /* ===========Responsive Design=========== */
        @media (480px < width <=1080px) {
            .data-content {
                width: auto;
                height: auto;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 30px;
            }
        }


        @media (780px > width >=430px) {
            .data-content {
                width: auto;
                height: auto;
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                grid-gap: 30px;
            }

            .chart-box {
                width: auto;
                height: auto;
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                grid-gap: 30px;
            }
        }
    </style>
@endsection

@section('content')
    <div>
        <div class="header">
            <a>
                {{ __('Employer Dashboard') }}
            </a>
        </div><br>

        <div>
            <div class="data-content">
                <div class="cards-data"><br>
                    <div class="bs">Total Jobs <br>({{ $countJobs }})</div><br><br><br>
                </div>
                <div class="cards-data"><br>
                    <div class="bs">Jobs Available <br>(68)</div><br><br><br>
                </div>
                <div class="cards-data"><br>
                    <div class="bs">Jobs Occupied <br>(60)</div><br><br><br>
                </div>
            </div>
        </div>
    </div><br>

    <div class="chart-box">
        <div class="chart-display">
            <canvas id="myChart"></canvas>
        </div>

        <div class="chart-display">
            <canvas id="myChart1"></canvas>
        </div>
    </div><br>

    <div class="chart-display">
        <canvas id="myChart2"></canvas>
    </div>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        async function fetchDoughnutData() {
            const response = await fetch('Doughnut');
            const result = await response.json();
            return result;
        }

        async function createDoughnutChart() {
            const ctx1 = document.getElementById('myChart');
            const data = await fetchDoughnutData();

            new Chart(ctx1, {
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# of Job Postings',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        createDoughnutChart();
    </script>


    <script>
        async function fetchPieData() {
            const response = await fetch('PieChart');
            const result = await response.json();
            return result;
        }

        async function createPieChart() {
            const ctx1 = document.getElementById('myChart1');
            const data = await fetchPieData();

            new Chart(ctx1, {
                type: 'pie',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# of Job Postings',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        createPieChart();
    </script>

    <script>
        async function fetchBarChartData() {
            const response = await fetch('BarChart');
            const result = await response.json();
            return result;
        }

        async function createBarChart() {
            const ctx2 = document.getElementById('myChart2');
            const data = await fetchBarChartData();

            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'No. of Job Postings',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    indexAxis: 'x', // Horizontal bar chart
                    categoryPercentage: 0.6 // Adjust the percentage here (e.g., 0.6 for 60% width)
                }
            });
        }

        createBarChart();
    </script>

@endsection
