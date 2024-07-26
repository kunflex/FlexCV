@extends('cv_structure')

@section('title', 'Reference | FlexCV Official Website')

@section('content')
<!-- ======Page content telling the user the next step===== -->
<div class="page-content">
        <div style="margin-top:60px;margin-bottom:20px;">
            <h1 style="margin-bottom:10px;">Let's add another references</h1>
        </div>

        <div style="width:100%;height:auto;gap:20px;margin-top:35px;">
            <form id="reference-info" action="{{route('reference-info')}}" method="post">
                    @csrf
                <div class="rbs-content-layer" style="float:left;">
                    
                        <div class="rbs-layer-box">
                            <div class="rbs-layer">
                                <div>
                                    <label for="fullname">Full Name</label>
                                    <input class="rbs-input" type="text" name="fullname" placeholder="Vincent Tetteh">
                                </div>
                            </div>

                            <div class="rbs-layer">
                                <div>
                                    <label for="position">Position</label>
                                    <input class="rbs-input" type="text" name="position" placeholder="C.E.O">
                                </div>
                            </div>
                        </div>

                        <div class="rbs-layer-box">
                            <div class="rbs-layer">
                                <div>
                                    <label for="company">Institution/Company</label>
                                    <input class="rbs-input" type="text" name="company" placeholder="Flexcotech Limited">
                                </div>
                            </div>
                        </div>

                        <div class="rbs-layer-box">
                            <div class="rbs-layer">
                                <div>
                                    <label for="email">Email</label>
                                    <input class="rbs-input" type="email" name="email" placeholder="example@gmail.com">
                                </div>
                            </div>

                            <div class="rbs-layer">
                                <div>
                                    <label for="telephone">Telephone</label>
                                    <input class="rbs-input" type="text" name="telephone" placeholder="0593958236">
                                </div>
                            </div>
                        </div>
                                        
                    
                </div>
            </form>

            <div class="page-prompt2">
                <div style="padding-left: 20px;">
                    <iframe class="preview-cv" src="{{route('preview')}}" frameborder="0" scrolling="no"></iframe>
               
                    <center><span>Preview</span></center>
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
        var form = document.getElementById('reference-info');
        form.action = "{{ route('reference-info') }}";
        form.submit();
    }
</script>
@endsection