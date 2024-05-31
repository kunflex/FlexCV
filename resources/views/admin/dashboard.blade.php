@extends('admin-layout')

@section('title', 'AdminDashboard')

@section('styles')
<style>
    .data-content{
        width: auto;
        height:auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 30px;
    }
    .cards-data{
        width:100%;
        height: 150px;
        background-color: white;
        box-shadow:2px 3px 8px #ddd;
        border-radius: 8px;
        padding:20px;
        text-align:center;
        user-select:none;
        cursor:pointer;
    }
    .bs{
        float:left;
        font-size:40px;
        color:blue;
        text-align:center;
    }
    .bs0{
        display:inline-flex;
        gap:40px;
        font-size:16px;
    }
    .bs1{
        float:left;
        color:darkgreen;
    }
    .bs2{
        float:right;
        color:darkblue;
    }
    .header{
    user-select:none;
    cursor:pointer;
    }
    .header a{
        text-decoration:none;
        color:black;
    }
    
    /* ===========Responsive Design=========== */
    @media (480px < width <=1080px) {
        .data-content{
        width: auto;
        height:auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 30px;
    }
    }


    @media (780px > width >= 430px) {
        .data-content{
        width: auto;
        height:auto;
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
            {{ __('AdminDashboard') }}
        </a>
    </div><br>

    <div>
        <div class="data-content">
            <div class="cards-data"><br>
                <div class="bs">Jobs ({{$countJobs}})</div><br><br><br>
                <div class="bs0">
                    <div class="bs1">Available (0)</div>
                    <div class="bs2" style="color:darkred;">Occupied (0)</div>
                </div>
            </div>
            <div class="cards-data"><br>
                <div class="bs">Testimonials (0)</div><br><br><br>
                <div class="bs0">
                    <div class="bs1"></div>
                    <div class="bs2"></div>
                </div>
            </div>
            <div class="cards-data"><br>
                <div class="bs">Users ({{$countUsers}})</div><br><br><br>
                <div class="bs0">
                    <div class="bs1">Employers (0)</div>
                    <div class="bs2">Jobseekers (0)</div>
                </div>
            </div>
        </div>
    </div>
@endsection
