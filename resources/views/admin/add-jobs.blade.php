@extends('admin-layout')

@if (auth()->user()->hasRole('admin'))
    @section('title', 'Admin Dashboard | Jobs')
@elseif(auth()->user()->hasRole('employer'))
    @section('title', 'Employer Dashboard | Jobs')
@endif

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
            background-color: #fff;
            padding: 20px;
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
    </style>
@endsection

@section('content')

    @if (auth()->user()->hasRole('admin'))
        <div class="header">
            <a href="admin">
                {{ __('Admin Dashboard') }}
            </a>/Jobs
        </div><br>
    @elseif(auth()->user()->hasRole('employer'))
        <div class="header">
            <a href="employer">
                {{ __('Employer Dashboard') }}
            </a>/Jobs
        </div><br>
    @endif

    <h3>Job Details</h3><br>
    <div class="ojs">
        <div class="data-layer">
            <form id="newjobs" action="{{ route('job.post') }}" method="post">
                @csrf
                <div class="cbs-group">
                    <div class="cbs">
                        <label for="">Job Title:</label>
                        <input class="rbs-input" type="text" name="job_title" placeholder="Accountant">
                    </div>

                    <div class="cbs">
                        <label for="">Job Type:</label>
                        <select type="text" name="job_type">
                            <option value="">--- Select one ---</option>
                            <option value="Full - Time">Full - Time</option>
                            <option value="Part - Time">Part - Time</option>
                            <option value="Remote">Remote</option>
                            <option value="Contract">Contract</option>
                        </select>
                    </div>
                </div>

                <div class="cbs-group">
                    <div class="cbs">
                        <label for="">Company:</label>
                        <input class="rbs-input" type="text" name="company" placeholder="Flexcotech Limited ">
                    </div>

                    <div class="cbs">
                        <label for="">Location:</label>
                        <input class="rbs-input" type="text" name="location">
                    </div>
                </div>

                <div class="cbs-group">
                    <div class="cbs">
                        <label for="">Email:</label>
                        <input class="rbs-input" name="email" type="text" placeholder="Flexcotech@gmail.com ">
                    </div>

                    <div class="cbs">
                        <label for="">Deadline:</label>
                        <input class="rbs-input" type="text" name="deadline">
                    </div>
                </div>

                <div class="cbs-group">
                    <div class="cbs">
                        <label for="salary">Salary Range:</label>
                        <input class="rbs-input" name="salary_range" type="text" placeholder="GHS1200 - GHS2000">
                    </div>

                    <div class="cbs">
                        <label for="Category">Category:</label>
                        <select type="text" name="category">
                            <option value="">--- Select one ---</option>
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

                <div class="cbs-group">
                    <div class="cbs">
                        <label for="">Contact:</label>
                        <input class="rbs-input" name="contact" type="text" placeholder="0593958236 / 0507619679 ">
                    </div>

                </div>

                <div class="cbs">
                    <label for="Application Instructions">Application Instructions:</label>
                    <textarea id="editor1" name="application_instructions" style="height: 100px;outline-color:#0095ff"
                        placeholder="Interested candidates should submit their resume"></textarea>
                </div>
                <br>

                <div>
                    <label for="Job Description">Job Description:</label>
                    <textarea id="editor2" name="job_description" placeholder="Include Job Reposnsibilities & Requirements/Qualification"></textarea>
                </div>

            </form>
        </div>
    </div>

    <div class="cbs">
        <button id="submitBtn" class="cbs-btn1">
            <h3>Post</h3>
        </button>
    </div>
    <br><br><br><br>

@endsection

@section('scripts')
    <script>
        // Select the button using its ID
        const submitButton = document.getElementById('submitBtn');

        // Add an event listener to the button for the 'click' event
        submitButton.addEventListener('click', function() {
            // Select the form by its ID
            const form = document.getElementById('newjobs');

            // Submit the form
            form.submit();
        });
    </script>
@endsection
