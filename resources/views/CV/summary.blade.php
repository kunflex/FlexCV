@extends('cv_structure')

@section('content')
<!-- ======Page prompt telling the user the next step===== -->
    <div class="page-prompt">
        <div class="page-prompt1">
            <div style="margin-top:60px;margin-bottom:20px;">
                <span>Step: 5</span>
                <h1 style="margin-bottom:10px;font-size:60px;">Now, Let's add your summary</h1>
            </div>

            <div class="rbs-content">
                
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
            <h1 style="margin-bottom:10px;">Almost done! Let’s finish with a strong profile</h1>
            <span>Including your personal details helps employeers to recognize you easily.</span>
        </div>

        <div class="rbs-content">
            <div class="double-box">
                <div class="double-layer">
                        <div class="search-container">
                            <input class="double-input" type="search" name="" placeholder="Suggestions for job title Accounting">
                            <span class="search-icon">&#128269;</span>
                        </div>
                    
                    <span>showing 45 results for </span><strong>search</strong>
                    <div class="double-cont">
                        <div class="my-card">
                            <span class="add-content" id="add1" onclick="Addfunction(1)">&plus;</span>
                            <span class="add-content" id="remove1" onclick="Clearfunction(1)" style="display:none">&minus;</span>
                            <p class="show">
                                I am a passionate individual currently pursuing my [degree/field] 
                                at [University/Institute]. As a dedicated [year]-year student at 
                                [School/Department], I am honing my skills in [specific areas] and 
                                actively seeking opportunities to apply my knowledge in real-world 
                                scenarios.
                            </p>
                        </div>
                        <div class="my-card">
                            <span class="add-content" id="add2" onclick="Addfunction(2)">&plus;</span>
                            <span class="add-content" id="remove2" onclick="Clearfunction(2)" style="display:none">&minus;</span>
                            <p class="show">
                                In the pursuit of academic excellence, I find myself immersed in 
                                the dynamic world of [your field of study] at [University/College]. 
                                As a [year]-year student, I am cultivating a strong foundation in 
                                [key subjects] and always eager to expand my understanding through 
                                practical experiences.
                            </p class="show">
                        </div>
                        <div class="my-card">
                            <span class="add-content" id="add3" onclick="Addfunction(3)">&plus;</span>
                            <span class="add-content" id="remove3" onclick="Clearfunction(3)" style="display:none">&minus;</span>
                            <p class="show">
                                Currently enrolled in the [your degree program] at [University], 
                                I am navigating the exciting challenges presented by the [specific 
                                field]. My academic journey has equipped me with valuable insights 
                                into [relevant topics], and I am enthusiastic about leveraging this 
                                knowledge to make meaningful contributions.
                            </p>
                        </div>
                        <div class="my-card">
                            <span class="add-content" id="add4" onclick="Addfunction(4)">&plus;</span>
                            <span class="add-content" id="remove4" onclick="Clearfunction(4)" style="display:none">&minus;</span>
                            <p class="show">
                                I find myself on a compelling educational journey at [University], 
                                pursuing a degree in [your major]. As a [year]-year student, I am 
                                not only acquiring theoretical knowledge but also engaging in 
                                hands-on experiences that fuel my passion for [specific interests].
                            </p>
                        </div>
                    </div>
                </div class="double-layer">
                <div>
                    <form id="update-summary" action="{{route('update-summary')}}" method="post">
                        @csrf
                            @method('PUT')
                        <textarea id="summernote" name="editordata"> {!! $cvPersonalDetails->summary !!}</textarea>
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
        var form = document.getElementById('update-summary');
        form.action = "{{ route('update-summary') }}";
        form.submit();
    }
</script>
@endsection