<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link rel="stylesheet" href="{{asset('assets/css/finished-resume.css')}}">
</head>

<body>
    <div class="cover-color">
        <div class="layer-app">
            <div class="logo">
                <a href="{{url('Index')}}"><img src="{{asset('assets/img/logo1.png')}}" alt=""></a>
            </div>
        </div><br>

        <div class="layer-box">
            <div>
                 <iframe class="layer-mask" src="{{route('preview')}}" frameborder="0" ></iframe><br>

                <div style="margin-top:20px;margin-left:30%;">
                    <h5><a href="">Terms & Conditions | </a><a href="">Contact Us</a></h5>
                </div>
            </div>
            <div class="layer-sidebar">
                <a href="{{url('#')}}">
                    <button class="lks-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#0095ff" height="30px" width="30px" version="1.1" id="Layer_1" viewBox="0 0 503.61 503.61" xml:space="preserve"  style="margin-top:-6px;">
                            <g>
                                <g>
                                    <g>
                                        <path d="M291.313,2.459C289.735,0.881,287.603,0,285.379,0H8.395C3.762,0,0.002,3.76,0.002,8.393v486.82     c0,4.633,3.76,8.393,8.393,8.393H360.92c4.633,0,8.393-3.76,8.393-8.393V83.934c0-2.224-0.881-4.365-2.459-5.934L291.313,2.459z      M117.51,167.869h134.295c4.633,0,8.393,3.76,8.393,8.393s-3.76,8.393-8.393,8.393H117.51c-4.633,0-8.393-3.76-8.393-8.393     S112.877,167.869,117.51,167.869z M251.805,386.098H117.51c-4.633,0-8.393-3.76-8.393-8.393c0-4.633,3.76-8.393,8.393-8.393     h134.295c4.633,0,8.393,3.76,8.393,8.393C260.198,382.338,256.438,386.098,251.805,386.098z M285.379,335.738H83.936     c-4.633,0-8.393-3.76-8.393-8.393c0-4.633,3.76-8.393,8.393-8.393h201.443c4.633,0,8.393,3.76,8.393,8.393     C293.772,331.977,290.012,335.738,285.379,335.738z M109.116,276.984c0-4.633,3.76-8.393,8.393-8.393h134.295     c4.633,0,8.393,3.76,8.393,8.393c0,4.633-3.76,8.393-8.393,8.393H117.51C112.877,285.377,109.116,281.617,109.116,276.984z      M285.379,235.016H83.936c-4.633,0-8.393-3.76-8.393-8.393s3.76-8.393,8.393-8.393h201.443c4.633,0,8.393,3.76,8.393,8.393     S290.012,235.016,285.379,235.016z M293.772,75.541V28.655l46.886,46.886H293.772z"/>
                                        <path d="M495.215,41.967V20.984C495.215,9.409,485.806,0,474.231,0h-8.393c-11.575,0-20.984,9.409-20.984,20.984v20.984     c-4.633,0-8.393,3.76-8.393,8.393v3.206l-28.932,14.462c-0.386,0.193-0.629,0.52-0.974,0.764     c-0.487,0.344-0.99,0.646-1.393,1.083c-0.378,0.411-0.621,0.881-0.906,1.351c-0.277,0.445-0.579,0.865-0.772,1.368     c-0.218,0.571-0.269,1.175-0.361,1.779c-0.059,0.403-0.235,0.755-0.235,1.167v109.115c0,4.633,3.76,8.393,8.393,8.393     s8.393-3.76,8.393-8.393V80.728l16.787-8.393v213.042h67.148V50.361C503.608,45.727,499.848,41.967,495.215,41.967z      M478.428,41.967h-16.787V20.984c0-2.317,1.88-4.197,4.197-4.197h8.393c2.317,0,4.197,1.88,4.197,4.197V41.967z"/>
                                        <rect x="436.461" y="369.311" width="67.148" height="16.787"/>
                                        <rect x="436.461" y="402.885" width="67.148" height="16.787"/>
                                        <rect x="436.461" y="335.738" width="67.148" height="16.787"/>
                                        <path d="M453.678,481.082c1.142,3.425,4.348,5.741,7.965,5.741v8.393c0,4.633,3.752,8.393,8.393,8.393     c4.633,0,8.393-3.76,8.393-8.393v-8.393c3.609,0,6.815-2.317,7.957-5.741l14.882-44.62h-62.464L453.678,481.082z"/>
                                        <rect x="436.461" y="302.164" width="67.148" height="16.787"/>
                                    </g>
                                </g>
                            </g>
                            </svg>
                        <h4>Edit Resume</h4>
                    </button></a><br>
                <a id="pdfLink" href="{{ route('pdf.download', ['templateNumber' => 'TEMPLATE_ID_PLACEHOLDER']) }}"><button class="lks-btn"><img src="{{asset('assets/icons/file_type_pdf_icon_130274.svg')}}" alt="Like"><h4>Download as PDF</h4></button></a><br>
                <a href="{{url('MS-Word')}}"><button class="lks-btn"><img src="{{asset('assets/icons/file_type_word_icon_130070.svg')}}" alt="Like"><h4>Download as MS-Word</h4></button></a><br>
                <a href="{{url('jobs-nearby')}}"><button class="lks-btn"><img src="{{asset('assets/icons/job_employment_find_recuitment_seeker_icon_192532.svg')}}" alt="Like"><h4>Job Hunt</h4></button></a>
            </div>
        </div><br><br><br><br><br><br><br><br>

        <div>
            <footer>
                <div class="float-layer" style="z-index:999;">
                    <div class="fks-layer">
                        <div class="fks-mask"><input class="fks-input" type="text" name="" placeholder="--- Select Preferred Template ---" id="templateInput" readonly></div>
                        <div class="fks-mask" onclick="openColorPicker()"><input class="color-picker" type="color" name="preferredColor" id="preferredColor"><span>--- Select Preferred Color ---</span></div>
                        <div class="fks-mask">
                            <select class="fks-input" type="text" name="preferredFont" id="preferredFont">
                                <option value="">--- Select Preferred Font ---</option>
                                <option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
                                <option value="Georgia, 'Times New Roman', Times, serif">Georgia, 'Times New Roman', Times, serif</option>
                                <option value="'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif</option>
                                <option value="'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">'Segoe UI', Tahoma, Geneva, Verdana, sans-serif</option>
                                <option value="Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ">Cambria, Cochin, Georgia, Times, 'Times New Roman', serif </option>
                            </select>
                        </div>
                    </div>
                </div>
            </footer>

            <div class="template-popup" id="templatePopup">
            <!-- Content for the template popup goes here -->
            <button class="cls-btn" id="closeBtn">&plus;</button>
            <div style="width:100%;">
                <!-- Your content here -->
                <button class="back-btn" id="backcloseBtn"><img src="{{asset('assets/icons/chevron-back.svg')}}"height="20" width="20" alt=""></button>
                <div class="template-popup-content">
                    <div>
                        <img class="temp-image" id="temp-image1" src="{{asset('assets/img/template1.png')}}" alt="">
                        <div class="temp-layer" id="1">@include('ResumeTemplates.template1')</div>
                    </div>
                    
                    <div>
                        <img class="temp-image" id="temp-image2" src="{{asset('assets/img/template2.png')}}" alt="">
                        <div class="temp-layer" id="2">@include('ResumeTemplates.template2')</div>
                    </div>
                    
                    <div>
                        <img class="temp-image" id="temp-image3" src="{{asset('assets/img/template3.png')}}" alt="">
                        <div class="temp-layer" id="3">@include('ResumeTemplates.template3')</div>
                    </div>

                    <div>
                        <img class="temp-image" id="temp-image4" src="{{asset('assets/img/template4.png')}}" alt="">
                        <div class="temp-layer" id="4">@include('ResumeTemplates.template4')</div>
                    </div>

                    <div>
                        <img class="temp-image" id="temp-image5" src="{{asset('assets/img/template5.png')}}" alt="">
                        <div class="temp-layer" id="5">@include('ResumeTemplates.template5')</div>
                    </div>

                    <div>
                        <img class="temp-image" id="temp-image6" src="{{asset('assets/img/template6.png')}}" alt="">
                        <div class="temp-layer" id="6"></div>
                    </div>

                    <div>
                        <img class="temp-image" id="temp-image7" src="{{asset('assets/img/template7.png')}}" alt="">
                        <div class="temp-layer" id="7"></div>
                    </div>

                    <div>
                        <img class="temp-image" id="temp-image8" src="{{asset('assets/img/template8.png')}}" alt="">
                        <div class="temp-layer" id="8"></div>
                    </div>

                    <div>
                        <img class="temp-image" id="temp-image9" src="{{asset('assets/img/template9.png')}}" alt="">
                        <div class="temp-layer" id="9"></div>
                    </div>

                    <div>
                        <img class="temp-image" id="temp-image10" src="{{asset('assets/img/template10.png')}}" alt="">
                        <div class="temp-layer" id="10"></div>
                    </div>

                    <div>
                        <img class="temp-image" id="temp-image11" src="{{asset('assets/img/template11.png')}}" alt="">
                        <div class="temp-layer" id="2"></div>
                    </div>

                    <div>
                        <img class="temp-image" id="temp-image12" src="{{asset('assets/img/template12.png')}}" alt="">
                        <div class="temp-layer" id="12"></div>
                    </div>
                    <div class="temp-layer" id="1">@include('ResumeTemplates.template1')</div>
                    <div class="temp-layer active" id="2">@include('ResumeTemplates.template2')</div>
                    <div class="temp-layer" id="3">@include('ResumeTemplates.template3')</div>
                    <div class="temp-layer" id="4">@include('ResumeTemplates.template4')</div>
                    <div class="temp-layer" id="5"></div>
                    <div class="temp-layer" id="6"></div>
                    <div class="temp-layer" id="7"></div>
                    <div class="temp-layer" id="8"></div>
                    <div class="temp-layer" id="9"></div>
                    <div class="temp-layer" id="10"></div>
                    <div class="temp-layer" id="11"></div>
                    <div class="temp-layer" id="12"></div>
                    <div class="temp-layer" id="13"></div>
                    <div class="temp-layer" id="14"></div>
                    <div class="temp-layer" id="15"></div>
                    <div class="temp-layer" id="16"></div>
                    <div class="temp-layer" id="17"></div>
                    <div class="temp-layer" id="18"></div>
                </div>
                <button class="forward-btn" id="forwardBtn"><img src="{{asset('assets/icons/chevron-forward.svg')}}"height="20" width="20" alt=""></button>
            </div>
        </div>
    </div>
</body>
</html>
<style>
    .cover-color{
        background-image: url('assets/img/study-group-learning-library (1).jpg');
        background-position: center;
        background-size: cover;
    }
    .forward-btn:hover{
        background-color:#0095FF;
        color:white;
    }
    .back-btn:hover{
        background-color:#0095FF;
        color:white;
    }
    .forward-btn{
        width:40px;
        height:40px;
        border-radius:50%;
        border:2px solid #ddd;
        background-color:transparent;
        font-size:30px;
        margin:6px;
        top:50%;
        text-align:center;
        margin-top:100px;
        user-select:none;
        cursor:pointer;
        float:right;
    }
    .back-btn{
        width:40px;
        height:40px;
        border-radius:50%;
        border:2px solid #ddd;
        background-color:transparent;
        font-size:30px;
        margin:6px;
        margin-left:40px;
        margin-top:100px;
        user-select:none;
        cursor:pointer;
        text-align:center;
        float:left;
    }
    .cls-btn{
        width:30px;
        height:30px;
        border-radius:50%;
        border:2px solid #ddd;
        background-color:transparent;
        font-size:18px;
        margin:6px;
        user-select:none;
        cursor:pointer;
        float:right;
        transform:rotate(45deg);
    }
    .template-popup {
    display:none;
    position: fixed;
    left: 0;
    width: 100%;
    height: 230px;
    bottom: 91px;
    background-color: white;
    z-index: 999; /* Ensure the popup is above other elements */
}
.template-popup-content {
    width: 84%;
    position: absolute;
    display: inline-flex;
    gap: 8px;
    margin: 10px;
    gap: 20px;
    margin: 50px;
    margin-left: 20px;
    margin-right: 20px;
    overflow-x: auto;
    z-index: -1;
    scrollbar-width: none;
    -ms-overflow-style: none;
    margin-top:8px;
}

.template-popup-content::-webkit-scrollbar {
    display: none;
}

/* bbb */
 .temp-layer {
    flex: 0 0 auto;
    width: 160px;
    height: 160px;
    border: 2px solid #ddd;
    border-radius: 6px;
    transform:scale(0.9);
    overflow: hidden;
    user-select:none;
    display:flex;
    align-items:center;
    justify-content:center;
    display:none;
}
.temp-image {
    flex: 0 0 auto;
    width: 190px;
    height: 220px;
    border: 2px solid #ddd;
    border-radius: 6px;
    transform:scale(0.8);
    overflow: hidden;
    user-select:none;
    display:flex;
    align-items:center;
    justify-content:center;
}
/* bbb */
.temp-image:hover{
    border:2px solid #0095FF;
    transform:scale(0.9);
}
.active{
    border:2px solid #0095FF;
    transform:scale(0.9);
}

</style>


<script>
     // Function to handle the click event for a template
     function handleTemplateClick(imageId, layerId) {
        var tempImage = document.getElementById(imageId);
        var tempLayer = document.getElementById(layerId);

        tempImage.addEventListener('click', function() {
             // Remove 'active' class from all temp-images
             document.querySelectorAll('.temp-image').forEach(function(img) {
                img.classList.remove('active');
            });

            // Add 'active' class to the clicked temp-image
            tempImage.classList.add('active');

            // Trigger a click event on the corresponding layer element
            tempLayer.dispatchEvent(new Event('click'));
        });
    }

    // Use the function for each template
    handleTemplateClick('temp-image1', '1');
    handleTemplateClick('temp-image2', '2');
    handleTemplateClick('temp-image3', '3');
    handleTemplateClick('temp-image4', '4');
    handleTemplateClick('temp-image5', '5');
    handleTemplateClick('temp-image6', '6');
    handleTemplateClick('temp-image7', '7');
    handleTemplateClick('temp-image8', '8');
    handleTemplateClick('temp-image9', '9');
    handleTemplateClick('temp-image10', '10');
    handleTemplateClick('temp-image11', '11');
    handleTemplateClick('temp-image12', '12');
</script>
           
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var templateInput = document.getElementById('templateInput');
        var templatePopup = document.getElementById('templatePopup');
        var closeBtn = document.getElementById('closeBtn');
        var backBtn = document.getElementById('backcloseBtn');
        var forwardBtn = document.getElementById('forwardBtn');
        var templateContent = document.querySelector('.template-popup-content');
        var tempLayers = document.querySelectorAll('.temp-layer');
        var layerMask = document.querySelector('.layer-mask');
        var fontSelect = document.getElementById('preferredFont');
        var colorPicker = document.getElementById('preferredColor');

        // Function to open the color picker
        window.openColorPicker = function () {
            colorPicker.click();
        };

        templateInput.addEventListener('click', function () {
            // Show the template popup when the input is clicked
            templatePopup.style.display = 'block';
        });

        closeBtn.addEventListener('click', function () {
            // Close the template popup when the close button is clicked
            templatePopup.style.display = 'none';
        });

        backBtn.addEventListener('click', function () {
            // Scroll the template content to the left when the "Back" button is clicked
            templateContent.scrollLeft -= 200; // Adjust the scrolling amount as needed
        });

        forwardBtn.addEventListener('click', function () {
            // Scroll the template content to the right when the "Forward" button is clicked
            templateContent.scrollLeft += 200; // Adjust the scrolling amount as needed
        });

        // Set the content of layer-mask to the content of temp-layer with id "1"
        var initialTemplate = document.getElementById('2');
        layerMask.innerHTML = initialTemplate.innerHTML;

        // Set the template id placeholder to "1" initially
        var templateIdPlaceholder = document.getElementById('pdfLink');
        templateIdPlaceholder.href = "{{ route('pdf.download', ['templateNumber' => 'TEMPLATE_ID']) }}".replace('TEMPLATE_ID', 2);

        // Add click event listeners to each temp-layer
        tempLayers.forEach(function (tempLayer) {
            tempLayer.addEventListener('click', function () {
                // Remove 'active' class from all temp-layers
                tempLayers.forEach(function (tl) {
                    tl.classList.remove('active');
                    templatePopup.style.display = 'none';
                });

                // Add 'active' class to the clicked temp-layer
                tempLayer.classList.add('active');

                // Change the content of layer-mask to the active temp-layer
                layerMask.innerHTML = tempLayer.innerHTML;

                // Get the id of the active temp-layer
                var activeTemplateId = tempLayer.id;

                // Update the href of the PDF link with the active templateNumber
                var pdfLink = document.getElementById('pdfLink');
                pdfLink.href = "{{ route('pdf.download', ['templateNumber' => 'TEMPLATE_ID']) }}".replace('TEMPLATE_ID', activeTemplateId);

                // Update the srcdoc attribute of the iframe with the content of the active temp-layer
                var iframe = document.querySelector('.layer-mask');
                iframe.srcdoc = tempLayer.innerHTML;
            });
        });

        // Add change event listener to font select input
        fontSelect.addEventListener('change', function () {
            var selectedFont = fontSelect.value;
            layerMask.style.fontFamily = selectedFont;
        });

        
    });
</script>
<!-- Add this script to your existing code -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var colorPicker = document.getElementById('preferredColor');
        var layerMask = document.querySelector('.layer-mask');

        // Add change event listener to color picker
        colorPicker.addEventListener('input', function () {
            var selectedColor = colorPicker.value;

            // Set the selected color to the --fine-color CSS variable
            document.documentElement.style.setProperty('--fine-color', selectedColor);

            // Update the background color of the layer-mask
            layerMask.style.backgroundColor = selectedColor;

            // Iframe contentDocument may be null if the iframe is from a different origin
            var iframeDocument = document.getElementById('myIframe').contentDocument;
            if (iframeDocument) {
                // Update the background color of elements inside the iframe with a specific class or attribute
                var iframeElements = iframeDocument.querySelectorAll('.fine-color-class'); // replace with your specific class or attribute
                iframeElements.forEach(function (element) {
                    element.style.backgroundColor = selectedColor;
                });
            }
        });
    });
</script>