@extends('admin-layout')

@if (auth()->user()->hasRole('admin'))
    @section('title', 'Admin Dashboard | Update Job')
@elseif(auth()->user()->hasRole('employer'))
    @section('title', 'Employer Dashboard | Update Job')
@endif

@section('styles')
    <style>
        /* ===== Container Card ===== */
        .ojs {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .ojs:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
        }

        /* ===== Form Layout ===== */
        .cbs-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .cbs {
            flex: 1;
            min-width: 220px;
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
            outline: none;
            transition: all 0.2s ease;
        }

        .cbs input:focus,
        .cbs select:focus,
        .cbs textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }

        /* ===== Header & Title ===== */
        h3 {
            text-align: center;
            font-size: 22px;
            color: #2563eb;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .header {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .header a {
            color: #2563eb;
            text-decoration: none;
        }

        /* ===== Submit Button ===== */
        .cbs-btn1 {
            background-color: #2563eb;
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
            background-color: #3b82f6;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .cbs-group {
                flex-direction: column;
            }
        }
    </style>
@endsection

@section('content')

    @if (auth()->user()->hasRole('admin'))
        <div class="header">
            <a href="{{ url('admin') }}">Admin Dashboard</a> / Update Job
        </div>
    @elseif (auth()->user()->hasRole('employer'))
        <div class="header">
            <a href="{{ url('employer') }}">Employer Dashboard</a> / Update Job
        </div>
    @endif

    <h3>Update Job Details</h3>

    <div class="ojs">
        <form id="updatejobs" action="{{ url('jobs/edit/' . $data->id) }}" method="post">
            @csrf
            @method('PUT')

            <!-- Job Title & Type -->
            <div class="cbs-group">
                <div class="cbs">
                    <label>Job Title</label>
                    <input type="text" name="job_title" value="{{ $data->job_title }}" placeholder="Accountant">
                </div>

                <div class="cbs">
                    <label>Job Type</label>
                    <select name="job_type">
                        <option value="{{ $data->job_type ?? '' }}" hidden>{{ $data->job_type ?? '--- Select ---' }}
                        </option>
                        <option value="Full - Time">Full - Time</option>
                        <option value="Part - Time">Part - Time</option>
                        <option value="Remote">Remote</option>
                        <option value="Contract">Contract</option>
                    </select>
                </div>
            </div>

            <!-- Company & Location -->
            <div class="cbs-group">
                <div class="cbs">
                    <label>Company</label>
                    <input type="text" name="company" value="{{ $data->company }}" placeholder="Flexcotech Limited">
                </div>

                <div class="cbs">
                    <label>Location</label>
                    <input type="text" name="location" value="{{ $data->location }}">
                </div>
            </div>

            <!-- Email & Deadline -->
            <div class="cbs-group">
                <div class="cbs">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $data->email }}" placeholder="company@gmail.com">
                </div>

                <div class="cbs">
                    <label>Deadline</label>
                    <input type="date" name="deadline" value="{{ $data->deadline }}">
                </div>
            </div>

            <!-- Salary & Category -->
            <div class="cbs-group">
                <div class="cbs">
                    <label>Salary Range</label>
                    <input type="text" name="salary_range" value="{{ $data->salary_range }}"
                        placeholder="GHS1200 - GHS2000">
                </div>

                <div class="cbs">
                    <label>Category</label>
                    <select name="category">
                        <option value="{{ $data->category ?? '' }}" hidden>{{ $data->category ?? '--- Select ---' }}
                        </option>
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
                    <input type="text" name="contact" value="{{ $data->contact }}"
                        placeholder="0593958236 / 0507619679">
                </div>
            </div>

            <!-- Application Instructions -->
            <div class="cbs">
                <label>Application Instructions</label>
                <textarea name="application_instructions">{!! $data->application_instructions !!}</textarea>
            </div>

            <br>

            <!-- Job Description -->
            <div class="cbs">
                <label>Job Description</label>
                <textarea id="editor" name="job_description">{!! $data->job_description !!}</textarea>
            </div>

            <div class="cbs" style="margin-top:20px;">
                <button id="submitBtn" class="cbs-btn1">Update Job</button>
            </div>
        </form>
    </div>



@endsection

@section('scripts')
    <script>
        // Submit form on button click
        document.getElementById('submitBtn').addEventListener('click', function() {
            document.getElementById('updatejobs').submit();
        });

        // Initialize CKEditor
        document.addEventListener("DOMContentLoaded", function() {
            if (document.querySelector('#editor')) {
                ClassicEditor.create(document.querySelector('#editor'));
            }
        });
    </script>
@endsection
