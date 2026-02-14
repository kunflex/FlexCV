@extends('admin-layout')

@section('styles')
    <style>
        /* ===== Card Container ===== */
        .ojs {
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .ojs:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
        }

        /* ===== Header & Breadcrumb ===== */
        .header {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .header a {
            text-decoration: none;
            color: #2563eb;
            font-weight: 500;
        }

        h3 {
            text-align: center;
            font-size: 22px;
            color: #2563eb;
            font-weight: 600;
            margin-bottom: 30px;
        }

        /* ===== Table Styling ===== */
       table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid rgba(0,0,0,0.03);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #f3f4f6;
            font-weight: 600;
            color: #1e293b;
            border-bottom: 2px solid #e5e7eb;
        }

        tr.nls {
            transition: background 0.2s ease;
        }

        tr.nls:nth-child(odd) {
            background-color: #ffffff;
        }

        tr.nls:nth-child(even) {
            background-color: #f9fafb;
        }

        tr.nls:hover {
            background-color: #f0f9ff;
            border-left: 4px solid #2563eb;
        }

        /* ===== Score Badges ===== */
        .score-green {
            color: #047857;
            font-weight: 600;
        }

        .score-yellow {
            color: #b45309;
            font-weight: 600;
        }

        .score-red {
            color: #b91c1c;
            font-weight: 600;
        }

        /* ===== Action Buttons ===== */
        .action-btn {
            border: none;
            border-radius: 8px;
            padding: 6px 12px;
            color: #fff;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.1s ease;
            font-size: 14px;
            margin: 2px;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .btn-preview {
            background-color: #f59e0b;
            /* orange */
        }

        .btn-preview:hover {
            background-color: #d97706;
        }

        .btn-download {
            background-color: #1e40af;
            /* dark blue */
        }

        .btn-download:hover {
            background-color: #3b82f6;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            th {
                text-align: left;
            }

            td {
                text-align: left;
                padding-left: 50%;
                position: relative;
            }

            td::before {
                position: absolute;
                left: 15px;
                top: 12px;
                content: attr(data-label);
                font-weight: 600;
                color: #1e293b;
            }

            tr {
                margin-bottom: 15px;
                border-bottom: 2px solid #e5e7eb;
            }

            table {
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
            }
        }
    </style>
@endsection

@section('content')
    @if (auth()->user()->hasRole('admin'))
        @section('title', 'Admin Dashboard | Track Applicants')
        <div class="header">
            <a href="{{ url('admin') }}">Admin Dashboard</a> /
            <a href="{{ url('track-jobs') }}">Track Jobs</a> / Track Applicants
        </div>
    @elseif (auth()->user()->hasRole('employer'))
    @section('title', 'Employer Dashboard | Track Applicants')
    <div class="header">
        <a href="{{ url('employer') }}">Employer Dashboard</a> /
        <a href="{{ url('track-jobs') }}">Track Jobs</a> / Track Applicants
    </div>
@endif

<h3>List Applicants</h3>
<div class="ojs">
    <table>
        <thead>
            <tr>
                <th>Applicants Letter</th>
                <th>Applicants CV</th>
                <th>Score(100%)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $view)
                @php $score = $view->score ?? 80; @endphp
                <tr class="nls">
                    <td data-label="Applicants Letter">{{ $view->applicant_letter }}</td>
                    <td data-label="Applicants CV">{{ $view->applicant_cv }}</td>

                    @if ($score >= 70)
                        <td data-label="Score" class="score-green">{{ $score }}</td>
                    @elseif ($score >= 45)
                        <td data-label="Score" class="score-yellow">{{ $score }}</td>
                    @elseif($score < 45)
                        <td data-label="Score" class="score-red">{{ $score }}</td>
                    @else
                        <td data-label="Score">Not scored</td>
                    @endif

                    <td data-label="Action">
                        <a href="{{ url('applicants/preview/' . $view->id) }}">
                            <button class="action-btn btn-preview">Preview</button>
                        </a>
                        <a href="{{ url('applicants/download/' . $view->id) }}">
                            <button class="action-btn btn-download">Download</button>
                        </a>
                        <a href="{{ url('interviews/schedule/' . $view->id) }}">
                            <button class="action-btn btn-download">Interview</button>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No queries found!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
