@extends('admin-layout')

@section('styles')
    <style>
        /* ===== Container & Cards ===== */
        .ojs {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            margin-bottom: 40px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .ojs:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.1);
        }

        /* ===== Header ===== */
        .header {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .header a {
            text-decoration: none;
            color: #2563eb;
        }

        h3 {
            text-align: center;
            font-size: 22px;
            color: #2563eb;
            margin-bottom: 30px;
            font-weight: 600;
        }

        /* ===== Search ===== */
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
            gap: 10px;
        }

        .search-bar input {
            padding: 10px 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            outline: none;
            transition: border 0.2s ease;
            width: 250px;
        }

        .search-bar input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }

        .search-bar button {
            padding: 10px 15px;
            border-radius: 8px;
            border: none;
            background-color: #2563eb;
            color: #fff;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .search-bar button:hover {
            background-color: #3b82f6;
        }

        /* ===== Table ===== */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid rgba(0,0,0,0.03);
        }

        th, td {
            padding: 15px 20px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #f3f4f6;
            font-weight: 600;
            color: #1e293b;
        }

        tr {
            transition: background 0.2s ease, transform 0.2s ease;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        tr:hover {
            background-color: #e0f2fe;
            transform: translateY(-1px);
        }

        /* ===== Action Buttons ===== */
        .action-btn {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 13px;
            border: none;
            cursor: pointer;
            transition: background 0.2s ease;
            margin-right: 5px;
        }

        .action-btn.update {
            background-color: #2563eb;
            color: #fff;
        }

        .action-btn.update:hover {
            background-color: #3b82f6;
        }

        .action-btn.applicants {
            background-color: #f59e0b;
            color: #fff;
        }

        .action-btn.applicants:hover {
            background-color: #fbbf24;
        }

        .action-btn.delete {
            background-color: #dc2626;
            color: #fff;
        }

        .action-btn.delete:hover {
            background-color: #ef4444;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .search-bar {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-bar input {
                width: 100%;
            }

            th, td {
                padding: 12px 10px;
            }
        }
    </style>
@endsection

@section('content')
    @if (auth()->user()->hasRole('admin'))
        @section('title', 'Admin Dashboard | Track Jobs')
        <div class="header">
            <a href="{{ url('admin') }}">Admin Dashboard</a> / Track Jobs
        </div>
    @elseif (auth()->user()->hasRole('employer'))
        @section('title', 'Employer Dashboard | Track Jobs')
        <div class="header">
            <a href="{{ url('employer') }}">Employer Dashboard</a> / Track Jobs
        </div>
    @endif

    <h3>Job Listings</h3>

    <div class="ojs">
        <div class="search-bar">
            <form action="{{ route('search.track-jobs') }}" method="GET" class="flex gap-2">
                <input type="text" placeholder="Search jobs..." name="search">
                <button type="submit">Search</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $view)
                    <tr>
                        <td>{{ $view->job_title }}</td>
                        <td style="text-align: center;">
                            <a href="{{ url('track-applicants/' . $view->id) }}">
                                <button class="action-btn applicants">Applicants</button>
                            </a>
                            <a href="{{ url('jobs/update/' . $view->id) }}">
                                <button class="action-btn update">Update</button>
                            </a>
                            <a href="{{ url('jobs/delete/' . $view->id) }}">
                                <button class="action-btn delete">Delete</button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align: center;">No jobs found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
