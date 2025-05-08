@extends('admin-layout')

@section('styles')
    <style>
        .cbs {
            width: 100%;
            display: block;
        }

        .cbs-group {
            width: 100%;
            height: auto;
            display: inline-flex;
            gap: 30px;
            margin-bottom: 10px;
        }

        h3 {
            text-align: center;
        }

        .ojs {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            margin-bottom: 40px;
        }

        .header {
            user-select: none;
        }

        .header a {
            text-decoration: none;
            color: black;
        }

        .tracl {
            width: 100%;
            padding: 10px;
            border-bottom: 2px solid whitesmoke;
            gap: 30px;
            padding-bottom: 20px;
        }

        .tracl span {
            width: 70%;
            padding-top: 10px;
        }

        .tracl div {
            width: 20%;
            gap: 20px;
            float: inline-end;
        }

        .ols-blue {
            background-color: darkblue;
            color: white;
            border-style: none;
            padding: 6px;
            border-radius: 6px;
        }

        .ols-yellow {
            background-color: orange;
            color: white;
            border-style: none;
            padding: 6px;
            border-radius: 6px;
        }

        .ols-red {
            background-color: darkred;
            color: white;
            border-style: none;
            padding: 6px;
            border-radius: 6px;
        }

        .search-bar {
            width: auto;
            height: auto;
        }

        .search-bar input {
            width: 200px;
            height: 40px;
            padding: 10px;
            float: inline-end;
            border-style: none;
            outline-style: none;
            border-bottom: 2px solid #0095FF;
        }

        .search-bar .ols-blue {
            float: inline-start;
            height: 40px;
            padding: 10px;
            font-size: 16px;
        }

        table {
            width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        tr th,
        td {
            height: 50px;
            width: auto;
            text-align: left;
            padding-left: 10px;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
            /* Color for odd-numbered rows */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Color for even-numbered rows */
        }
        .tracl:hover{
            border-left:2px solid #0095FF;
        }
    </style>
@endsection

@section('content')
    @if (auth()->user()->hasRole('admin'))
        @section('title', 'AdminDashboard | Track Jobs')
        <div class="header">
            <a href="{{ url('admin') }}">
                {{ __('Admin Dashboard') }}
            </a> /Track Jobs
        </div><br>
    @elseif (auth()->user()->hasRole('employer'))
    @section('title', 'Employer Dashboard | Track Jobs')
    <div class="header">
        <a href="{{ url('employer') }}">
            {{ __('Employer Dashboard') }}
        </a> /Track Jobs
    </div><br>
@endif

<h3>List Jobs</h3><br>
<div class="ojs">
    <div class="data-layer">
        <div class="search-bar">
            <form action="{{ route('search.track-jobs') }}" method="GET">
                <input type="text" placeholder="Search..." name="search">
                <button hidden>Search</button>
            </form>
        </div>
        <br><br><br>
        <table>
            <tr>
                <th style="width:78%;">Job Title</th>
                <th style="text-align: center;">Action</th>
            </tr>

            @forelse($data as $view)
                <tr class="tracl">
                    <td>{{ $view->job_title }}</td>
                    <td>
                        <a href="{{ url('track-applicants/' . $view->id) }}"><button
                                class="ols-yellow">applicants</button></a>
                        <a href="{{ url('jobs/update/' . $view->id) }}"><button class="ols-blue">update</button></a>
                        <a href="{{ url('jobs/delete/' . $view->id) }}"><button class="ols-red">delete</button></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" style="text-align: center">{{ $result }}</td>
                </tr>
            @endforelse

        </table>
    </div>
</div>

@endsection
