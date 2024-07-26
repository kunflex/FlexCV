@extends('cv_structure')

@section('title', 'Personal Details | FlexCV Official Website')

@section('content')
<!-- ======Page prompt telling the user the next step===== -->
    <div class="page-prompt">
        <div class="page-prompt1">
            <div style="margin-top:60px;margin-bottom:20px;">
                <span>Step: 1</span>
                <h1 style="margin-bottom:10px;font-size:60px;">Now, Let's add your Personal details</h1>
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
        <div style="margin-top:10px;">
            <h1 style="margin-bottom:10px;">Tell us about yourself</h1>
            <span>Including your personal details helps employeers to recognize you easily.</span>
        </div>

       <div style="width:90%;height:auto;gap:20px;margin-top:35px;">
           <form id="personal-info" action="{{route('personal_info')}}" method="post">
                @csrf 
                <div class="rbs-content-layer" style="float:left;">
                    <div class="rbs-layer-box">
                        <div class="rbs-layer">
                            <div>
                                <label for="firstname">First Name</label>
                                <input class="rbs-input" type="text" name="firstname" placeholder="Vincent">
                            </div>
                            <div>
                                <label for="lastname">Last Name</label>
                                <input class="rbs-input" type="text" name="lastname" placeholder="Tetteh">
                            </div>
                        </div>


                        <div class="rbs-layer">
                            <div>
                                <label for="othername">Other Name(s)</label>
                                <input class="rbs-input" type="text" name="othername" placeholder="Adumuah">
                            </div>
                            <div>
                                <label for="country">Country</label>
                                <input class="rbs-input" type="text" name="country" placeholder="Ghana">
                            </div>
                        </div>

                    </div>

                    <div class="rbs-layer-box">
                        <div class="rbs-layer">
                                <div>
                                    <label for="">Email</label>
                                    <input class="rbs-input" type="text" name="email" placeholder="vincent@gmail.com">
                                </div>
                        </div>
                    </div>
                    

                   <div class="rbs-layer-box">
                             <div class="rbs-layer">
                                <div>
                                    <label for="city/town">City/Town</label>
                                    <input class="rbs-input" type="text" name="city/town" placeholder="Accra">
                                </div>
                                <div>
                                    <label for="address">Postal Address</label>
                                    <input class="rbs-input" type="text" name="address" placeholder="GZ-120-5412">
                                </div>
                            </div>


                            <div class="rbs-layer">
                                <div>
                                    <label for="phone_number">Phone</label>
                                    <input class="rbs-input" type="text" name="phone_number" placeholder="+233(50) 541 1255">
                                </div>
                                <div>
                                    <label for="DOB">Date of Birth</label>
                                    <input class="rbs-input" type="date" name="DOB" placeholder="">
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
        var form = document.getElementById('personal-info');
        form.action = "{{ route('personal_info') }}";
        form.submit();
    }
</script>
@endsection