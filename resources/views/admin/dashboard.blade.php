@extends('admin-layout')

@section('title', 'Admin Dashboard')

@section('styles')
<style>
/* ================= DASHBOARD HEADER ================= */

.dashboard-header {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 25px;
}

/* ================= CARDS GRID ================= */

.data-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 25px;
}

/* ================= MODERN CARD ================= */

.cards-data {
    background: #ffffff;
    border-radius: 16px;
    padding: 25px;
    position: relative;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    cursor: pointer;
    overflow: hidden;
}

.cards-data:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}

/* Left Accent Line */
.cards-data::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 6px;
    background: linear-gradient(to bottom, #0095ff, #00c6ff);
}

/* Card Icon */
.card-icon {
    width: 45px;
    height: 45px;
    background: rgba(0,149,255,0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
}

.card-icon i {
    width: 22px;
    height: 22px;
    color: #0095ff;
}

/* Card Title */
.card-title {
    font-size: 14px;
    font-weight: 500;
    color: #64748b;
    margin-bottom: 8px;
}

/* Card Value */
.card-value {
    font-size: 28px;
    font-weight: 700;
    margin-bottom: 15px;
}

/* Card Sub Info */
.card-sub {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    color: #64748b;
}

/* ================= CHART GRID ================= */

.chart-box {
    margin-top: 35px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
}

.chart-display {
    background: #ffffff;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
}

/* ================= RESPONSIVE ================= */

@media(max-width:768px){
    .dashboard-header {
        font-size: 18px;
    }
}
</style>
@endsection

@section('content')

<div class="dashboard-header">
    <i data-feather="grid"></i> Admin Dashboard
</div>

<div class="data-content">

    <!-- JOBS -->
    <div class="cards-data">
        <div class="card-icon">
            <i data-feather="briefcase"></i>
        </div>
        <div class="card-title">Total Jobs</div>
        <div class="card-value">{{ $countJobs }}</div>
        <div class="card-sub">
            <span>Available (0)</span>
            <span style="color:#ef4444;">Occupied (0)</span>
        </div>
    </div>

    <!-- TESTIMONIALS -->
    <div class="cards-data">
        <div class="card-icon">
            <i data-feather="message-square"></i>
        </div>
        <div class="card-title">Testimonials</div>
        <div class="card-value">{{ $countTestimonials }}</div>
        <div class="card-sub">
            <span>Published</span>
            <span>Pending</span>
        </div>
    </div>

    <!-- USERS -->
    <div class="cards-data">
        <div class="card-icon">
            <i data-feather="users"></i>
        </div>
        <div class="card-title">Total Users</div>
        <div class="card-value">{{ $countUsers }}</div>
        <div class="card-sub">
            <span>Employers (0)</span>
            <span>Jobseekers (0)</span>
        </div>
    </div>

</div>

<!-- ================= CHARTS ================= -->

<div class="chart-box">

    <div class="chart-display">
        <h4 style="margin-bottom:15px;">Job Distribution</h4>
        <canvas id="myChart"></canvas>
    </div>

    <div class="chart-display">
        <h4 style="margin-bottom:15px;">Application Overview</h4>
        <canvas id="myChart1"></canvas>
    </div>

</div>

<div class="chart-display" style="margin-top:25px;">
    <h4 style="margin-bottom:15px;">Monthly Job Postings</h4>
    <canvas id="myChart2"></canvas>
</div>

@endsection

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
feather.replace();

/* Doughnut */
fetch('Doughnut')
.then(res => res.json())
.then(data => {
    new Chart(document.getElementById('myChart'), {
        type: 'doughnut',
        data: {
            labels: data.labels,
            datasets: [{
                data: data.data,
                backgroundColor: ['#0095ff','#00c6ff','#0ea5e9','#38bdf8']
            }]
        }
    });
});

/* Pie */
fetch('PieChart')
.then(res => res.json())
.then(data => {
    new Chart(document.getElementById('myChart1'), {
        type: 'pie',
        data: {
            labels: data.labels,
            datasets: [{
                data: data.data,
                backgroundColor: ['#6366f1','#8b5cf6','#ec4899','#f59e0b']
            }]
        }
    });
});

/* Bar */
fetch('BarChart')
.then(res => res.json())
.then(data => {
    new Chart(document.getElementById('myChart2'), {
        type: 'bar',
        data: {
            labels: data.labels,
            datasets: [{
                data: data.data,
                backgroundColor: '#0095ff',
                borderRadius: 8
            }]
        },
        options: {
            plugins: { legend: { display:false } },
            scales: { y: { beginAtZero:true } }
        }
    });
});
</script>

@endsection
@section('styles')
<style>

/* ================= HEADER ================= */
.dashboard-header {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* ================= GRID ================= */

/* Auto responsive grid */
.data-content {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}

/* Tablet */
@media (max-width: 1024px) {
    .data-content {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Mobile */
@media (max-width: 600px) {
    .data-content {
        grid-template-columns: 1fr;
    }
}

/* ================= CARD ================= */

.cards-data {
    background: #ffffff;
    border-radius: 16px;
    padding: 22px;
    position: relative;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
    transition: all 0.3s ease;
    overflow: hidden;
}

.cards-data:hover {
    transform: translateY(-5px);
}

/* Accent Line */
.cards-data::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 6px;
    background: linear-gradient(to bottom, #0095ff, #00c6ff);
}

/* Icon */
.card-icon {
    width: 45px;
    height: 45px;
    background: rgba(0,149,255,0.1);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
}

.card-icon i {
    width: 20px;
    height: 20px;
    color: #0095ff;
}

.card-title {
    font-size: 14px;
    color: #64748b;
    margin-bottom: 5px;
}

.card-value {
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 12px;
}

.card-sub {
    display: flex;
    justify-content: space-between;
    font-size: 13px;
    color: #64748b;
}

/* Stack sub info on small screens */
@media (max-width: 480px) {
    .card-sub {
        flex-direction: column;
        gap: 5px;
    }
}

/* ================= CHARTS ================= */

.chart-box {
    margin-top: 35px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 25px;
}

/* Tablet */
@media (max-width: 1024px) {
    .chart-box {
        grid-template-columns: 1fr;
    }
}

.chart-display {
    background: #ffffff;
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.06);
}

/* Make canvas responsive */
.chart-display canvas {
    width: 100% !important;
    height: auto !important;
}

/* ================= MOBILE HEADER ================= */

@media (max-width: 600px) {
    .dashboard-header {
        font-size: 18px;
    }
}

</style>
@endsection
