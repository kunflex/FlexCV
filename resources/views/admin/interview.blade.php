@extends('admin-layout')

@section('styles')
<style>
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

    .header { font-size: 16px; margin-bottom: 20px; }
    .header a { text-decoration: none; color: #2563eb; font-weight: 500; }
    h3 { text-align: center; font-size: 22px; color: #2563eb; font-weight: 600; margin-bottom: 30px; }

    table { width: 100%; border-collapse: separate; border-spacing: 0; border-radius: 12px; overflow: hidden; border: 2px solid rgba(0,0,0,0.03); }
    th, td { padding: 12px 15px; text-align: center; }
    th { background-color: #f3f4f6; font-weight: 600; color: #1e293b; border-bottom: 2px solid #e5e7eb; }

    tr.nls:nth-child(odd) { background-color: #ffffff; }
    tr.nls:nth-child(even) { background-color: #f9fafb; }
    tr.nls:hover { background-color: #f0f9ff; border-left: 4px solid #2563eb; }

    .score-green { color: #047857; font-weight: 600; }
    .score-yellow { color: #b45309; font-weight: 600; }
    .score-red { color: #b91c1c; font-weight: 600; }

    .status-scheduled { background: #2563eb; color: #fff; padding: 4px 8px; border-radius: 6px; font-size: 13px; }
    .status-completed { background: #047857; color: #fff; padding: 4px 8px; border-radius: 6px; font-size: 13px; }
    .status-rejected { background: #b91c1c; color: #fff; padding: 4px 8px; border-radius: 6px; font-size: 13px; }

    .action-btn {
        border: none; border-radius: 8px; padding: 6px 12px; color: #fff; cursor: pointer;
        transition: background 0.2s ease, transform 0.1s ease; font-size: 14px; margin: 2px;
    }
    .btn-preview { background-color: #f59e0b; }
    .btn-preview:hover { background-color: #d97706; }
    .btn-download { background-color: #1e40af; }
    .btn-download:hover { background-color: #3b82f6; }
    .btn-schedule { background-color: #2563eb; }
    .btn-schedule:hover { background-color: #1d4ed8; }

    input[type="date"], input[type="time"], select {
        padding: 6px; border-radius: 6px; border: 1px solid #ccc; font-size: 14px;
    }

    @media (max-width: 768px) {
        table, thead, tbody, th, td, tr { display: block; }
        th { text-align: left; }
        td { text-align: left; padding-left: 50%; position: relative; }
        td::before { position: absolute; left: 15px; top: 12px; content: attr(data-label); font-weight: 600; color: #1e293b; }
        tr { margin-bottom: 15px; border-bottom: 2px solid #e5e7eb; }
        table { box-shadow: 0 4px 10px rgba(0,0,0,0.03); }
    }
</style>
@endsection

@section('content')
@if (auth()->user()->hasRole('admin'))
    @section('title', 'Admin Dashboard | Schedule Interviews')
    <div class="header">
        <a href="{{ url('admin') }}">Admin Dashboard</a> /
        <a href="{{ url('track-jobs') }}">Track Jobs</a> / Schedule Interviews
    </div>
@elseif (auth()->user()->hasRole('employer'))
    @section('title', 'Employer Dashboard | Schedule Interviews')
    <div class="header">
        <a href="{{ url('employer') }}">Employer Dashboard</a> /
        <a href="{{ url('track-jobs') }}">Track Jobs</a> / Schedule Interviews
    </div>
@endif

<h3>Schedule Interviews</h3>
<div class="ojs">
    <table>
        <thead>
            <tr>
                <th>Applicant Letter</th>
                <th>CV</th>
                <th>Score(100%)</th>
                <th>Interview Status</th>
                <th>Schedule Interview</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $applicant)
                @php
                    $score = $applicant->score ?? 0;
                    $status = $applicant->interview_status ?? 'Scheduled';
                @endphp
                <tr class="nls">
                    <td data-label="Applicant Letter">{{ $applicant->applicant_letter }}</td>
                    <td data-label="CV">{{ $applicant->applicant_cv }}</td>
                    <td data-label="Score" class="
                        @if($score >= 70) score-green
                        @elseif($score >= 45) score-yellow
                        @elseif($score < 45) score-red
                        @endif
                    ">{{ $score }}</td>
                    <td data-label="Interview Status">
                        @if($status === 'Scheduled')
                            <span class="status-scheduled">{{ $status }}</span>
                        @elseif($status === 'Completed')
                            <span class="status-completed">{{ $status }}</span>
                        @elseif($status === 'Rejected')
                            <span class="status-rejected">{{ $status }}</span>
                        @else
                            <span>{{ $status }}</span>
                        @endif
                    </td>
                    <td data-label="Schedule Interview">
                        <form action="{{ url('interviews/schedule/' . $applicant->id) }}" method="POST">
                            @csrf
                            <input type="date" name="interview_date" required>
                            <input type="time" name="interview_time" required>
                            <select name="interview_status" required>
                                <option value="Scheduled" {{ $status == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                                <option value="Completed" {{ $status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                <option value="Rejected" {{ $status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <button type="submit" class="action-btn btn-schedule">Save</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">No applicants found!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
