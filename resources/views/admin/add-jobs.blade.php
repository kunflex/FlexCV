@extends('admin-layout')

@if (auth()->user()->hasRole('admin'))
    @section('title', 'Admin Dashboard | Jobs')
@elseif(auth()->user()->hasRole('employer'))
    @section('title', 'Employer Dashboard | Jobs')
@endif

@section('styles')
    <style>
        /* Container Card */
        .job-card {
            background: #fff;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
            transition: transform 0.2s ease;
        }

        .job-card:hover {
            transform: translateY(-3px);
        }

        /* Form Groups */
        .cbs-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .cbs {
            flex: 1;
            min-width: 200px;
            display: flex;
            flex-direction: column;
        }

        .cbs label {
            margin-bottom: 6px;
            font-weight: 500;
            color: #1e293b;
        }

        .cbs input,
        .cbs select,
        .cbs textarea {
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
            width: 100%;
            transition: all 0.2s ease;
            outline: none;
        }

        .cbs input:focus,
        .cbs select:focus,
        .cbs textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }

        /* Headings */
        h3 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            color: #2563eb;
        }

        .dashboard-header {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .dashboard-header a {
            text-decoration: none;
            color:#2563eb;
        }

        /* Submit Button */
        .cbs-btn1 {
            background: var(--primary);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background 0.2s ease;
        }

        .cbs-btn1:hover {
            background: #3b82f6;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .cbs-group {
                flex-direction: column;
            }
        }
    </style>
@endsection

@section('content')

    @if (auth()->user()->hasRole('admin'))
        <div class="dashboard-header">
            <a href="admin"><i data-feather="user"></i>{{ __('Admin Dashboard') }}</a> / Jobs
        </div>
    @elseif(auth()->user()->hasRole('employer'))
        <div class="dashboard-header">
            <a href="employer"><i data-feather="user"></i>{{ __('Employer Dashboard') }}</a> / Jobs
        </div>
    @endif

    <h3>Post a Job</h3>

    <div class="job-card">
        <form id="newjobs" action="{{ route('job.post') }}" method="post">
            @csrf

            <!-- Job Title & Type -->
            <div class="cbs-group">
                <div class="cbs">
                    <label>Job Title</label>
                    <input type="text" name="job_title" placeholder="Accountant">
                </div>
                <div class="cbs">
                    <label>Job Type</label>
                    <select name="job_type">
                        <option value="">--- Select ---</option>
                        <option value="Full-Time">Full-Time</option>
                        <option value="Part-Time">Part-Time</option>
                        <option value="Remote">Remote</option>
                        <option value="Contract">Contract</option>
                    </select>
                </div>
            </div>

            <!-- Company & Location -->
            <div class="cbs-group">
                <div class="cbs">
                    <label>Company</label>
                    <input type="text" name="company" placeholder="Flexcotech Limited">
                </div>
                <div class="cbs">
                    <label>Location</label>
                    <input type="text" name="location" placeholder="City / Town">
                </div>
            </div>

            <!-- Email & Deadline -->
            <div class="cbs-group">
                <div class="cbs">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="company@gmail.com">
                </div>
                <div class="cbs">
                    <label>Deadline</label>
                    <input type="date" name="deadline">
                </div>
            </div>

            <!-- Salary & Category -->
            <div class="cbs-group">
                <div class="cbs">
                    <label>Salary Range</label>
                    <input type="text" name="salary_range" placeholder="GHS1200 - GHS2000">
                </div>
                <div class="cbs">
                    <label>Category</label>
                    <select name="category">
                        <option value="">--- Select ---</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Applied Science">Applied Science</option>
                        <option value="Business Administration">Business Administration</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Arts and Fashion">Arts and Fashion</option>
                        <option value="Law">Law</option>
                        <option value="Education">Education</option>
                        <option value="Health Sciences">Health Sciences</option>
                        <option value="Social Sciences">Social Sciences</option>
                    </select>
                </div>
            </div>

            <!-- Contact -->
            <div class="cbs-group">
                <div class="cbs">
                    <label>Contact</label>
                    <input type="text" name="contact" placeholder="0593958236 / 0507619679">
                </div>
            </div>

            <!-- Application Instructions -->
            <div class="cbs">
                <label>Application Instructions</label>
                <textarea name="application_instructions" placeholder="Instructions for applicants"></textarea>
            </div>
            <br>

            <!-- Job Description -->
            <div class="cbs">
                <label>Job Description</label>
                <textarea id="editor" name="job_description" placeholder="Include responsibilities & requirements"></textarea>
            </div>
            <br>

            <!-- Submit -->
            <div class="cbs">
                <button id="submitBtn" class="cbs-btn1">Post Job</button>
            </div>

        </form>
    </div>

@endsection

@section('scripts')
    <script>
        document.getElementById('submitBtn').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('newjobs').submit();
        });

        document.addEventListener("DOMContentLoaded", function() {
            if (document.querySelector('#editor')) {
                ClassicEditor.create(document.querySelector('#editor'));
            }
        });
    </script>
@endsection
