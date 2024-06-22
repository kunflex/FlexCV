@extends('cv_structure')

@section('content')
    <!-- ======Page content telling the user the next step===== -->
    <div class="page-content">
        <div style="margin-top:60px;margin-bottom:20px;">
            <h1 style="margin-bottom:10px;">Update experience</h1>
        </div>

        <div style="width:100%;height:auto;gap:20px;margin-top:35px;">
            <form id="update-experience-info" action="{{ url('update-experience-info/'.$data->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="rbs-content-layer" style="float:left;">
                    <div class="rbs-layer-box">
                        <div class="rbs-layer">
                            <div>
                                <label for="job_title">Job Title</label>
                                <input class="rbs-input" type="text" value="{{ $data->job_title }}" name="job_title"
                                    placeholder="Sales Representative">
                            </div>
                            <div>
                                <label for="company">Company Name</label>
                                <input class="rbs-input" type="text" value="{{ $data->company }}" name="company"
                                    placeholder="Flexcotech Limited">
                            </div>
                        </div>


                        <div class="rbs-layer">
                            <div>
                                <label for="city_town">City/Town</label>
                                <input class="rbs-input" type="text" value="{{ $data->city_town }}" name="city_town"
                                    placeholder="Accra">
                            </div>
                            <div>
                                <label for="country">Country</label>
                                <input class="rbs-input" type="text" value="{{ $data->country }}" name="country"
                                    placeholder="Ghana">
                            </div>
                        </div>

                    </div>

                    <div class="rbs-layer-box">
                        <div class="rbs-layer">
                            <div>
                                <label for="start_date">Start Date</label>
                                <input class="rbs-input" type="date" name="start_date" value="{{ $data->start_date }}">
                            </div>
                        </div>


                        <div class="rbs-layer">
                            <div class="end_date">
                                <label for="end_date">End Date</label>
                                <input class="rbs-input" type="date" name="end_date" value="{{ $data->end_date }}">
                            </div>
                            <div style="display:inline-flex;gap:10px;">
                                <input type="checkbox" name="checkbox" id="checkbox" value="">
                                <label for="checkbox">I currently work here</label>
                            </div>
                        </div>

                    </div>

                </div>
            </form>

            <div class="page-prompt2">
                <div style="padding-left: 20px;">
                    <iframe class="preview-cv" src="{{ route('preview') }}" frameborder="0" scrolling="no"></iframe>

                    <center><span>Preview</span></center>
                </div>
            </div>
        </div>

        <div class="control-btn">
            <a href="">
                <li class="cbs-btn">
                    <h3>Back</h3>
                </li>
            </a>
            <a>
                <li class="cbs-btn1" onclick="submitform()">
                    <h3>Continue</h3>
                </li>
            </a>
        </div><br><br><br><br><br>
    </div>
    <!-- ======End Page content telling the user the next step===== -->
    <script>
        var checkbox = document.getElementById('checkbox');
        const end_date = document.querySelector('.end_date');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                end_date.style.display = 'none';
            } else {
                end_date.style.display = 'block';
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const backButtons = document.querySelectorAll('.back-btn');
            const continueButton = document.getElementById('continueButton');
            const pagePrompt = document.querySelector('.page-prompt');
            const pageContent = document.querySelector('.page-content');

            // Add event listener for both "Back" buttons
            backButtons.forEach(function(backButton) {
                backButton.addEventListener("click", function(event) {
                    event.preventDefault();
                    // If in page-content, go back to page-prompt; otherwise, navigate back
                    if (pageContent.style.display === 'block') {
                        pagePrompt.style.display = 'block';
                        pageContent.style.display = 'none';
                    } else {
                        history.back(); // Navigate back to the previous page
                    }
                });
            });

            // Add event listener for the "Continue" button
            continueButton.addEventListener("click", function(event) {
                event.preventDefault();
                // Hide page-prompt and display page-content
                pagePrompt.style.display = 'none';
                pageContent.style.display = 'block';
            });
        });
    </script>
    <script>
        function submitform() {
            var form = document.getElementById('update-experience-info');
            form.action = "{{url('update-experience-info/'.$data->id) }}";
            form.submit();
        }
    </script>
@endsection
