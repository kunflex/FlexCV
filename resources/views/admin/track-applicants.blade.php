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

        .nls:hover{
            border-left:2px solid #0095FF;
        }

        .tracl div {
            float: right;
            gap: 20px;
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

        table {
            width: 100%;
            border: 2px solid whitesmoke;
            border-collapse: collapse;
        }

        th {
            width: 10%;
            height: 50px;
            padding: 2px;
            text-align: center;
            border-bottom: 2px solid whitesmoke;
        }

        td {
            height: 50px;
            text-align: center;
        }

        .nls:nth-child(odd) {
            background-color: white;
        }

        .nls:nth-child(even) {
            background-color: whitesmoke;
        }

        .score-green {
            color: darkgreen;
        }

        .score-yellow {
            color: darkorange;
        }

        .score-red {
            color: darkred;
        }
    </style>
@endsection

@section('content')
    @if (auth()->user()->hasRole('admin'))
        @section('title', 'AdminDashboard | Track Applicants')
        <div class="header">
            <a href="{{ url('admin') }}">
                {{ __('Admin Dashboard') }}
            </a> /
            <a href="{{ url('track-jobs') }}">
                {{ __('Track Jobs') }}
            </a> / Track Applicants
        </div><br>
    @elseif (auth()->user()->hasRole('employer'))
    @section('title', 'Employer Dashboard | Track Applicants')
    <div class="header">
        <a href="{{ url('employer') }}">
            {{ __('Employer Dashboard') }}
        </a> /
        <a href="{{ url('track-jobs') }}">
            {{ __('Track Jobs') }}
        </a> / Track Applicants
    </div><br>
@endif

<h3>List Applicants</h3><br>
<div class="ojs">
    <div class="data-layer">
        <table>
            <tr>
                <th>Applicants Letter</th>
                <th>Applicants CV</th>
                <th>Score(100%)</th>
                <th>Action</th>
            </tr>

            @forelse ($data as $view)
                <tr class="nls">
                    <td>{{ $view->applicant_letter }}</td>
                    <td>{{ $view->applicant_cv }}</td>

                    @php
                        $score = 80;
                    @endphp

                    @if ($score >= 70 && $score <= 100)
                        <td class="score-green">
                            {{ $score }}
                        </td>
                    @elseif ($score >= 45 && $score < 70)
                        <td class="score-yellow">
                            {{ $score }}
                        </td>
                    @elseif($score < 45)
                        <td class="score-red">
                            {{ $score }}
                        </td>
                    @else
                        <td>
                            {{ 'Not score' }}
                        </td>
                    @endif


                    <td>
                        <a href="{{ url('applicants/preview/' . $view->id) }}">
                            <button class="ols-yellow OpenBtn">
                                preview
                            </button>
                        </a>

                        <a href="{{ url('applicants/download/' . $view->id) }}"><button
                                class="ols-blue">download</button></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No queries found!</td>
                </tr>
            @endforelse
        </table>
    </div>
</div>

@endsection
