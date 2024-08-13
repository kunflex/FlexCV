@extends('cv_structure')

@section('title', 'Personal Details | FlexCV Official Website')

@section('styles')
    <style>
        .preview{
            display: none;
        }
    </style>
@endsection

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
                                <input class="rbs-input" type="text" name="firstname" id="firstname" placeholder="Vincent">
                                <div id="preview_firstname" class="preview">Country</div>
                            </div>
                            <div>
                                <label for="lastname">Last Name</label>
                                <input class="rbs-input" type="text" name="lastname" id="lastname" placeholder="Tetteh">
                                <div id="preview_lastname" class="preview">Country</div>
                            </div>
                        </div>


                        <div class="rbs-layer">
                            <div>
                                <label for="othername">Other Name(s)</label>
                                <input class="rbs-input" type="text" name="othername" id="othernames" placeholder="Adumuah">
                                <div id="preview_othernames" class="preview">Country</div>
                            </div>
                            <div>
                                <label for="country">Country</label>
                                <input class="rbs-input" type="text" name="country" id="country" placeholder="Ghana">
                                <div id="preview_country" class="preview">Country</div>
                            </div>
                        </div>

                    </div>

                    <div class="rbs-layer-box">
                        <div class="rbs-layer">
                                <div>
                                    <label for="">Email</label>
                                    <input class="rbs-input" type="text" name="email" id="email" placeholder="vincent@gmail.com">
                                    <div id="preview_email" class="preview">email</div>
                                </div>
                        </div>
                    </div>
                    

                   <div class="rbs-layer-box">
                             <div class="rbs-layer">
                                <div>
                                    <label for="city/town">City/Town</label>
                                    <input class="rbs-input" type="text" name="city/town" id="city_town" placeholder="Accra">
                                    <div id="preview_city_town" class="preview">City/Town</div>
                                </div>
                                <div>
                                    <label for="address">Postal Address</label>
                                    <input class="rbs-input" type="text" name="address" id="postal_address" placeholder="GZ-120-5412">
                                    <div id="preview_postal_address" class="preview">postal address</div>
                                </div>
                            </div>


                            <div class="rbs-layer">
                                <div>
                                    <label for="phone_number">Phone</label>
                                    <input class="rbs-input" type="text" name="phone_number" id="phone" placeholder="+233(50) 541 1255">
                                    <div id="preview_phone" class="preview">phone</div>
                                </div>
                                <div>
                                    <label for="DOB">Date of Birth</label>
                                    <input class="rbs-input" type="date" name="DOB" id="DOB" placeholder="">
                                    <div id="preview_DOB" class="preview">DOB</div>
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

<script>
    // Function to handle input and session storage
    function handleInput(inputId, previewId, storageKey) {
        const inputField = document.getElementById(inputId);
        const previewDiv = document.getElementById(previewId);

        // Load the stored value from session storage if it exists
        const storedValue = sessionStorage.getItem(storageKey);
        if (storedValue) {
            previewDiv.innerText = storedValue;
            inputField.value = storedValue; // Set the input value
        }

        // Add an event listener to the input field
        inputField.addEventListener('input', function() {
            // Update the preview div with the input field's value
            previewDiv.innerText = inputField.value;

            // Store the input field's value in session storage
            sessionStorage.setItem(storageKey, inputField.value);
        });
    }

    // Call the function for each input field
    handleInput('firstname', 'preview_firstname', 'firstname');
    handleInput('lastname', 'preview_lastname', 'lastname');
    handleInput('othernames', 'preview_othernames', 'othernames');
    handleInput('country', 'preview_country', 'country');
    handleInput('city_town', 'preview_city_town', 'city_town');
    handleInput('email', 'preview_email', 'email');
    handleInput('phone', 'preview_phone', 'phone');
    handleInput('postal_address', 'preview_postal_address', 'postal_address');
    handleInput('DOB', 'preview_DOB', 'DOB');
</script>


@endsection