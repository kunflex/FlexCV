@extends('cv_structure')

@section('title', 'Skills | FlexCV Official Website')

@section('content')
<!-- ======Page prompt telling the user the next step===== -->
    <div class="page-prompt">
        <div class="page-prompt1">
            <div style="margin-top:60px;margin-bottom:20px;">
                <span>Step: 4</span>
                <h1 style="margin-bottom:10px;font-size:60px;">Now, Let's add your skills</h1>
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
            <h1 style="margin-bottom:10px;">Let’s pick your top skills</h1>
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
                                Possessing a strong foundation in [Key Skill Area], 
                                I excel in [specific skills]. My proficiency includes 
                                [Skill 1], [Skill 2], and [Skill 3], allowing me to 
                                contribute effectively to projects and tasks requiring 
                                these competencies.
                            </p>
                        </div>
                        <div class="my-card">
                            <span class="add-content" id="add2" onclick="Addfunction(2)">&plus;</span>
                            <span class="add-content" id="remove2" onclick="Clearfunction(2)" style="display:none">&minus;</span>
                            <p class="show">
                                As a skilled professional, I bring expertise in [Key Skill Area]. 
                                My capabilities extend to [Skill 1], [Skill 2], and [Skill 3], 
                                enabling me to navigate challenges and deliver high-quality 
                                results in my field.
                            </p>
                        </div>
                        <div class="my-card">
                            <span class="add-content" id="add3" onclick="Addfunction(3)">&plus;</span>
                            <span class="add-content" id="remove3" onclick="Clearfunction(3)" style="display:none">&minus;</span>
                            <p class="show">
                                With a solid background in [Key Skill Area], I have honed my abilities 
                                in [Skill 1], [Skill 2], and [Skill 3]. This skill set equips me to 
                                approach projects with a strategic mindset and deliver solutions that 
                                meet or exceed expectations.
                            </p>
                        </div>
                        <div class="my-card">
                            <span class="add-content" id="add4" onclick="Addfunction(4)">&plus;</span>
                            <span class="add-content" id="remove4" onclick="Clearfunction(4)" style="display:none">&minus;</span>
                            <p class="show">
                                Demonstrating proficiency in [Key Skill Area], I am well-versed in 
                                [Skill 1], [Skill 2], and [Skill 3]. These skills empower me to 
                                tackle complex problems, collaborate effectively, and achieve 
                                optimal outcomes in various professional settings.
                            </p>
                        </div>
                        <div class="my-card">
                            <span class="add-content" id="add5" onclick="Addfunction(5)">&plus;</span>
                            <span class="add-content" id="remove5" onclick="Clearfunction(5)" style="display:none">&minus;</span>
                            <p class="show">
                                My skill set revolves around [Key Skill Area], encompassing [Skill 1], 
                                [Skill 2], and [Skill 3]. These competencies not only reflect my 
                                technical prowess but also my commitment to continuous learning and 
                                staying abreast of industry trends.
                            </p>
                        </div>
                    </div>
                </div class="double-layer">
                <div>
                    <form id="update-skills" action="{{route('update-skills')}}" method="post">
                        @csrf
                            @method('PUT')
                        <textarea id="summernote" name="editordata"> {!! $cvPersonalDetails->skills !!}</textarea>
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
        var form = document.getElementById('update-skills');
        form.action = "{{ route('update-skills') }}";
        form.submit();
    }
</script>
@endsection