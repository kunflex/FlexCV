@extends('cv_structure')

@section('title', 'Additional Information | FlexCV Official Website')

@section('content')
<!-- ======Page prompt telling the user the next step===== -->
    <div class="page-prompt">
        <div class="page-prompt1">
            <div style="margin-top:-30px;margin-bottom:20px;">
                <span>Step: 6</span>
                <h1 style="margin-bottom:10px;font-size:60px;">Share more about yourself</h1>
                <span>Include the following details to make your work complete</span>
            </div>

            <div class="rbs-content" style="display:block;">
                <div class="flow-box">
                    <div>&plus;</div>
                    <div>Other details (Optional)</div>
                </div>
                <div class="flow-box">
                    <div>&plus;</div>
                    <div>Interest</div>
                </div>
                <div class="flow-box">
                    <div>&plus;</div>
                    <div>Reference</div>
                </div>
            </div>

            <div class="control-btn">
                <a href=""><li class="cbs-btn"><h3>Back</h3></li></a>
                <a href=""><li onclick="nextpage()" class="cbs-btn1" id="continueButton"><h3>Continue</h3></li></a>
            </div>
        </div>


        <div class="page-prompt2">
            <div>
                <iframe class="preview-cv" src="{{route('preview')}}" frameborder="0" scrolling="no"></iframe>
                
                <center><span>Preview</span></center>
            </div>
        </div>
    </div>
<!-- ======End Page prompt telling the user the next step===== -->



<!-- ======Page content telling the user the next step===== -->
<div class="page-content" style="display:none;">
        <div style="margin-top:60px;margin-bottom:20px;">
            <h1 style="margin-bottom:10px;">Add More Details</h1>
            <span>This is an opportunity to highlight qualifications that don't fit into standard resume sections.</span>
        </div>

            <div class="rbs-content">
                <div class="double-box">
                    <div class="double-layer">
                        <div class="search-container">
                            <input class="double-input" type="search" name="" placeholder="Suggestions for Interest">
                            <span class="search-icon">&#128269;</span>
                        </div>

                        <span>showing 45 results for </span><strong>search</strong>
                        <div class="double-cont">
                            <div class="my-card">
                                <span class="add-content" id="add1" onclick="Addfunction(1)">&plus;</span>
                                <span class="add-content" id="remove1" onclick="Clearfunction(1)" style="display:none">&minus;</span>
                                <p class="show">
                                    I have a profound interest in [specific interest], driven by a passion 
                                    for [related activities]. This interest not only reflects my personal 
                                    pursuits but also influences my professional endeavors, allowing me to 
                                    bring enthusiasm and dedication to my work.
                                </p>
                            </div>
                            <div class="my-card">
                                <span class="add-content" id="add2" onclick="Addfunction(2)">&plus;</span>
                                <span class="add-content" id="remove2" onclick="Clearfunction(2)" style="display:none">&minus;</span>
                                <p class="show">
                                    Exploring [specific interest] has been a significant part of my personal 
                                    and professional journey. I find joy in [related activities], and this 
                                    passion serves as a source of inspiration, contributing to my creativity 
                                    and overall well-being.
                                </p>
                            </div>
                            <div class="my-card">
                                <span class="add-content" id="add3" onclick="Addfunction(3)">&plus;</span>
                                <span class="add-content" id="remove3" onclick="Clearfunction(3)" style="display:none">&minus;</span>
                                <p class="show">
                                    My interests extend to [specific interest], a domain that captivates my 
                                    curiosity and fuels my desire for continuous learning. Engaging in 
                                    [related activities] not only brings me fulfillment but also enhances 
                                    my ability to approach challenges with a fresh perspective.
                                </p>
                            </div>
                            <div class="my-card">
                                <span class="add-content" id="add4" onclick="Addfunction(4)">&plus;</span>
                                <span class="add-content" id="remove4" onclick="Clearfunction(4)" style="display:none">&minus;</span>
                                <p class="show">
                                    I am deeply passionate about [specific interest], and my commitment to 
                                    [related activities] reflects my dedication to personal growth. This 
                                    interest influences my professional mindset, fostering creativity, 
                                    resilience, and a proactive approach to problem-solving.
                                </p>
                            </div>
                            <div class="my-card">
                                <span class="add-content" id="add5" onclick="Addfunction(5)">&plus;</span>
                                <span class="add-content" id="remove5" onclick="Clearfunction(5)" style="display:none">&minus;</span>
                                <p class="show">
                                    Exploring [specific interest] has been a lifelong pursuit that shapes my 
                                    perspective both personally and professionally. Engaging in [related 
                                    activities] provides me with a sense of balance, inspiration, and a 
                                    unique lens through which I approach various aspects of my life.
                                </p>
                            </div>
                        </div>
                    </div class="double-layer">
                    <div>
                        <form id="update-other_details" action="{{route('update-other_details')}}" method="post">
                            @csrf
                                @method('PUT')
                            <textarea id="summernote" name="editordata"> {!! $cvPersonalDetails->other_details !!}</textarea>
                        </form>
                    </div>
                </div>
            </div>

        <div class="control-btn">
            <a href=""><li class="cbs-btn"><h3>Back</h3></li></a>
            <a><li class="cbs-btn1" onclick="submitform()"><h3>Continue</h3></li></a>
        </div><br><br><br><br><br>
    </div>
<!-- ======End Page content telling the user the next step===== -->

<script>
        document.addEventListener("DOMContentLoaded", function () {
            const backButtons = document.querySelectorAll('.back-btn');
            const continueButton = document.getElementById('continueButton');
            const pagePrompt = document.querySelector('.page-prompt');
            const pageContent = document.querySelector('.page-content');

            // Add event listener for both "Back" buttons
            backButtons.forEach(function (backButton) {
                backButton.addEventListener("click", function (event) {
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
            continueButton.addEventListener("click", function (event) {
                event.preventDefault();
                // Hide page-prompt and display page-content
                pagePrompt.style.display = 'none';
                pageContent.style.display = 'block';
            });
        });
    </script>
<script>
    function submitform(){
        var form = document.getElementById('update-other_details');
        form.action = "{{ route('update-other_details') }}";
        form.submit();
    }
</script>
@endsection

@section('styles')
<style>
    .flow-box{
        width:100%;
        height:auto;
        padding:20px;
        border:1px solid #ccc;
        border-radius:8px;
        font-size:25px;
        margin-bottom:10px;
        display:inline-flex;
        gap:20px;
    }
</style>
@endsection