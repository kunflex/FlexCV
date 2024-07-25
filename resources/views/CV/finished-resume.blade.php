<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview | FlexCV Official Website</title>
    <link rel="stylesheet" href="{{ asset('assets/css/finished-resume.css') }}">
</head>
<style>
    body {
        position: fixed;
    }

    .cover-color {
        background-color: #00000052;
        background-image: url('{{ asset('assets/img/study-group-learning-library (1).jpg') }}');
        background-position: center;
        background-size: cover;
    }

    .forward-btn:hover {
        background-color: #0095FF;
        color: white;
    }

    .back-btn:hover {
        background-color: #0095FF;
        color: white;
    }

    .forward-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid #ddd;
        background-color: transparent;
        font-size: 30px;
        margin: 6px;
        top: 50%;
        text-align: center;
        margin-top: 100px;
        user-select: none;
        cursor: pointer;
        float: right;
    }

    .back-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid #ddd;
        background-color: transparent;
        font-size: 30px;
        margin: 6px;
        margin-left: 40px;
        margin-top: 100px;
        user-select: none;
        cursor: pointer;
        text-align: center;
        float: left;
    }

    .cls-btn {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 2px solid #ddd;
        background-color: transparent;
        font-size: 18px;
        margin: 6px;
        user-select: none;
        cursor: pointer;
        float: right;
        transform: rotate(45deg);
    }

    .template-popup {
        display: none;
        position: fixed;
        left: 0;
        width: 100%;
        height: 230px;
        bottom: 91px;
        background-color: white;
        z-index: 999;
        /* Ensure the popup is above other elements */
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
        margin-top: 8px;
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
        transform: scale(0.9);
        overflow: hidden;
        user-select: none;
        display: flex;
        align-items: center;
        justify-content: center;
        display: none;
    }

    .temp-image {
        flex: 0 0 auto;
        width: 190px;
        height: 220px;
        border: 2px solid #ddd;
        border-radius: 6px;
        transform: scale(0.8);
        overflow: hidden;
        user-select: none;
        display: flex;
        align-items: center;
        justify-content: center;
        -webkit-user-drag: none;
    }

    /* bbb */
    .temp-image:hover {
        border: 2px solid #0095FF;
        transform: scale(0.9);
    }

    .active {
        border: 2px solid #0095FF;
        transform: scale(0.9);
    }

    iframe {
        border-radius: 8px;
    }

    .style-fx-color {
        display: inline-flex;
        gap: 10px;
        position: absolute;
        background-color: white;
        top: -86px;
        padding: 20px;
        border-radius: 8px;
        border: 2px solid #ddd;
        visibility: hidden;
        z-index: 2;
    }

    .fx-color {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 2px solid #ddd;
    }

    .fx-color:hover {
        border-color: #000;
    }
</style>



<body>
    <div class="cover-color">
        <div class="layer-app">
            <div class="logo">
                <a href="{{ url('Index') }}"><img src="{{ asset('assets/img/logo1.png') }}" alt=""></a>
            </div>
        </div><br>

        <div class="layer-box">
            <div>
                <iframe class="layer-mask" src="{{ route('preview') }}" frameborder="0"></iframe><br>

                <div style="margin-top:20px;margin-left:30%;">
                    <h5><a href="">Terms & Conditions | </a><a href="">Contact Us</a></h5>
                </div>
            </div>
            <div class="layer-sidebar">
                <a href="{{ route('updateResume') }}">
                    <button class="lks-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            fill="#0095ff" height="30px" width="30px" version="1.1" id="Layer_1"
                            viewBox="0 0 503.61 503.61" xml:space="preserve" style="margin-top:-6px;">
                            <g>
                                <g>
                                    <g>
                                        <path
                                            d="M291.313,2.459C289.735,0.881,287.603,0,285.379,0H8.395C3.762,0,0.002,3.76,0.002,8.393v486.82     c0,4.633,3.76,8.393,8.393,8.393H360.92c4.633,0,8.393-3.76,8.393-8.393V83.934c0-2.224-0.881-4.365-2.459-5.934L291.313,2.459z      M117.51,167.869h134.295c4.633,0,8.393,3.76,8.393,8.393s-3.76,8.393-8.393,8.393H117.51c-4.633,0-8.393-3.76-8.393-8.393     S112.877,167.869,117.51,167.869z M251.805,386.098H117.51c-4.633,0-8.393-3.76-8.393-8.393c0-4.633,3.76-8.393,8.393-8.393     h134.295c4.633,0,8.393,3.76,8.393,8.393C260.198,382.338,256.438,386.098,251.805,386.098z M285.379,335.738H83.936     c-4.633,0-8.393-3.76-8.393-8.393c0-4.633,3.76-8.393,8.393-8.393h201.443c4.633,0,8.393,3.76,8.393,8.393     C293.772,331.977,290.012,335.738,285.379,335.738z M109.116,276.984c0-4.633,3.76-8.393,8.393-8.393h134.295     c4.633,0,8.393,3.76,8.393,8.393c0,4.633-3.76,8.393-8.393,8.393H117.51C112.877,285.377,109.116,281.617,109.116,276.984z      M285.379,235.016H83.936c-4.633,0-8.393-3.76-8.393-8.393s3.76-8.393,8.393-8.393h201.443c4.633,0,8.393,3.76,8.393,8.393     S290.012,235.016,285.379,235.016z M293.772,75.541V28.655l46.886,46.886H293.772z" />
                                        <path
                                            d="M495.215,41.967V20.984C495.215,9.409,485.806,0,474.231,0h-8.393c-11.575,0-20.984,9.409-20.984,20.984v20.984     c-4.633,0-8.393,3.76-8.393,8.393v3.206l-28.932,14.462c-0.386,0.193-0.629,0.52-0.974,0.764     c-0.487,0.344-0.99,0.646-1.393,1.083c-0.378,0.411-0.621,0.881-0.906,1.351c-0.277,0.445-0.579,0.865-0.772,1.368     c-0.218,0.571-0.269,1.175-0.361,1.779c-0.059,0.403-0.235,0.755-0.235,1.167v109.115c0,4.633,3.76,8.393,8.393,8.393     s8.393-3.76,8.393-8.393V80.728l16.787-8.393v213.042h67.148V50.361C503.608,45.727,499.848,41.967,495.215,41.967z      M478.428,41.967h-16.787V20.984c0-2.317,1.88-4.197,4.197-4.197h8.393c2.317,0,4.197,1.88,4.197,4.197V41.967z" />
                                        <rect x="436.461" y="369.311" width="67.148" height="16.787" />
                                        <rect x="436.461" y="402.885" width="67.148" height="16.787" />
                                        <rect x="436.461" y="335.738" width="67.148" height="16.787" />
                                        <path
                                            d="M453.678,481.082c1.142,3.425,4.348,5.741,7.965,5.741v8.393c0,4.633,3.752,8.393,8.393,8.393     c4.633,0,8.393-3.76,8.393-8.393v-8.393c3.609,0,6.815-2.317,7.957-5.741l14.882-44.62h-62.464L453.678,481.082z" />
                                        <rect x="436.461" y="302.164" width="67.148" height="16.787" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <h4>Edit Resume</h4>
                    </button></a><br>
                <a id="pdfLink"
                    href="{{ route('pdf.download', ['templateNumber' => $template_id, 'colorCode' => $colorCode]) }}"><button
                        class="lks-btn"><img src="{{ asset('assets/icons/file_type_pdf_icon_130274.svg') }}"
                            alt="Like">
                        <h4>Download as PDF</h4>
                    </button></a><br>
                <a href="{{ url('jobs-nearby') }}"><button class="lks-btn"><img
                            src="{{ asset('assets/icons/job_employment_find_recuitment_seeker_icon_192532.svg') }}"
                            alt="Like">
                        <h4>Job Hunt</h4>
                    </button></a>
            </div>
        </div><br><br><br><br><br><br><br><br>

        <div>
            <footer>
                <div class="float-layer" style="z-index:999;">
                    <div class="fks-layer">
                        <div class="fks-mask"><input class="fks-input" type="text" name=""
                                placeholder="--- Select Preferred Template ---" id="templateInput" readonly></div>
                        <div class="fks-mask" onclick="openColorPicker()">
                            <div>
                                <form action="{{url('select/color')}}" method="get">
                                    {{-- colors layer --}}
                                    <div class="style-fx-color" name="preferredColor" id="preferredColor">
                                        {{-- color 1 --}}
                                        <div>
                                            <div class="fx-color" onclick="selectColor('color1','dodgerblue')"
                                                style="background-color:dodgerblue" id="btn1"></div>
                                            <input type="checkbox" name="color1" id="color1" hidden>
                                        </div>
                                        {{-- color 2 --}}
                                        <div>
                                            <div class="fx-color" onclick="selectColor('color2','deeppink')"
                                                style="background-color:deeppink" id="btn2"></div>
                                            <input type="checkbox" name="color2" id="color2" hidden>
                                        </div>
                                        {{-- color 3 --}}
                                        <div>
                                            <div class="fx-color" onclick="selectColor('color3','orange')"
                                                style="background-color:orange" id="btn3"></div>
                                            <input type="checkbox" name="color3" id="color3" hidden>
                                        </div>
                                        {{-- color 4 --}}
                                        <div>
                                            <div class="fx-color" onclick="selectColor('color4','green')"
                                                style="background-color:green" id="btn4"></div>
                                            <input type="checkbox" name="color4" id="color4" hidden>
                                        </div>
                                        {{-- color 5 --}}
                                        <div>
                                            <div class="fx-color" onclick="selectColor('color5','mediumblue')"
                                                style="background-color:mediumblue" id="btn5"></div>
                                            <input type="checkbox" name="color5" id="color5" hidden>
                                        </div>
                                        {{-- color 6 --}}
                                        <div>
                                            <div class="fx-color" onclick="selectColor('color6','red')"
                                                style="background-color:darkred" id="btn6"></div>
                                            <input type="checkbox" name="color6" id="color6" hidden>
                                        </div>
                                        {{-- color 7 --}}
                                        <div>
                                            <div class="fx-color" onclick="selectColor('color7','darkblue')"
                                                style="background-color:darkblue" id="btn7"></div>
                                            <input type="checkbox" name="color7" id="color7" hidden>
                                        </div>
                                        {{-- color 8 --}}
                                        <div>
                                            <div class="fx-color" onclick="selectColor('color8','orangered')"
                                                style="background-color:orangered" id="btn8"></div>
                                            <input type="checkbox" name="color8" id="color8" hidden>
                                        </div>
                                        {{-- color 9 --}}
                                        <div>
                                            <div class="fx-color" onclick="selectColor('color9','purple')"
                                                style="background-color:purple" id="btn9"></div>
                                            <input type="checkbox" name="color9" id="color9" hidden>
                                        </div>
                                        {{-- Submit button --}}
                                        <button type="submit" hidden>Submit</button>

                                    </div>
                                </form>
                            </div><span>--- Select Preferred Color ---</span>
                        </div>
                        <div class="fks-mask">
                            <select class="fks-input" type="text" name="preferredFont" id="preferredFont">
                                <option value="">--- Select Preferred Font ---</option>
                                <option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
                                <option value="Georgia, 'Times New Roman', Times, serif">Georgia, 'Times New Roman',
                                    Times, serif</option>
                                <option value="'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">'Franklin
                                    Gothic Medium', 'Arial Narrow', Arial, sans-serif</option>
                                <option value="'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">'Segoe UI', Tahoma,
                                    Geneva, Verdana, sans-serif</option>
                                <option value="Cambria, Cochin, Georgia, Times, 'Times New Roman', serif ">Cambria,
                                    Cochin, Georgia, Times, 'Times New Roman', serif </option>
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
                    <button class="back-btn" id="backcloseBtn"><img
                            src="{{ asset('assets/icons/chevron-back.svg') }}"height="20" width="20"
                            alt=""></button>

                    <form id="templateForm" action="{{ url('change/template') }}" method="get">
                        <div class="template-popup-content">
                            <div>
                                <img onclick="setTemplate('1')" class="temp-image" id="temp-image1"
                                    src="{{ asset('assets/img/template1.png') }}" alt="">
                                <input type="checkbox" name="template1" id="1" hidden>
                            </div>

                            <div>
                                <img onclick="setTemplate('2')" class="temp-image" id="temp-image2"
                                    src="{{ asset('assets/img/template2.png') }}" alt="">
                                <input type="checkbox" name="template2" id="2" hidden>
                            </div>

                            <div>
                                <img onclick="setTemplate('3')" class="temp-image" id="temp-image3"
                                    src="{{ asset('assets/img/template3.png') }}" alt="">
                                <input type="checkbox" name="template3" id="3" hidden>
                            </div>

                            <div>
                                <img onclick="setTemplate('4')" class="temp-image" id="temp-image4"
                                    src="{{ asset('assets/img/template4.png') }}" alt="">
                                <input type="checkbox" name="template4" id="4" hidden>
                            </div>

                            <div>
                                <img onclick="setTemplate('5')" class="temp-image" id="temp-image5"
                                    src="{{ asset('assets/img/template5.png') }}" alt="">
                                <input type="checkbox" name="template5" id="5" hidden>
                            </div>

                            <div>
                                <img onclick="setTemplate('6')" class="temp-image" id="temp-image6"
                                    src="{{ asset('assets/img/template6.png') }}" alt="">
                                <input type="checkbox" name="template6" id="6" hidden>
                            </div>
                            <button type="submit" hidden>submit</button>
                        </div>
                    </form>

                    <button class="forward-btn" id="forwardBtn"><img
                            src="{{ asset('assets/icons/chevron-forward.svg') }}"height="20" width="20"
                            alt=""></button>
                </div>
            </div>
        </div>
</body>

</html>

<script>
    function setTemplate(templateId) {
        var input = document.getElementById(templateId);
        if (input) {
            input.checked = true;
            document.getElementById('templateForm').submit();
        }
    }
</script>

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

    // Function to set up all templates
    function setupTemplates(count, activeTemplateId) {
        for (let i = 1; i <= count; i++) {
            let imageId = `temp-image${i}`;
            handleTemplateClick(imageId, `${i}`);

            // Set the active class if the imageId matches the activeTemplateId
            if (`${i}` === activeTemplateId) {
                document.getElementById(imageId).classList.add('active');
            }
        }
    }

    // Call setupTemplates with the number of templates and the active template id
    setupTemplates(12, '{{ $template_id }}');
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var templateInput = document.getElementById('templateInput');
        var templatePopup = document.getElementById('templatePopup');
        var closeBtn = document.getElementById('closeBtn');
        var backBtn = document.getElementById('backcloseBtn');
        var forwardBtn = document.getElementById('forwardBtn');
        var templateContent = document.querySelector('.template-popup-content');
        var colorPicker = document.getElementById('preferredColor');
        var colorPickerButtons = document.querySelectorAll('.fx-color');

        // Function to toggle visibility of the color picker
        function toggleColorPicker() {
            if (colorPicker) {
                colorPicker.style.visibility = colorPicker.style.visibility === 'hidden' ? 'visible' : 'hidden';
            }
        }

        // Function to select color and check the corresponding input
        function selectColor(colorId, colorCode) {
            var colorInput = document.getElementById(colorId);
            if (colorInput) {
                // Uncheck all checkboxes first
                var allInputs = document.querySelectorAll('input[name="color"]');
                allInputs.forEach(function(input) {
                    input.checked = false;
                });

                // Check the selected color's checkbox
                colorInput.checked = true;

                // Submit the form
                colorInput.form.submit();
            }
        }

        // Add event listeners
        if (templateInput) {
            templateInput.addEventListener('click', function() {
                if (templatePopup) {
                    templatePopup.style.display = 'block';
                }
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                if (templatePopup) {
                    templatePopup.style.display = 'none';
                }
            });
        }
        // Function to close the template popup
        function closeTemplatePopup() {
            if (templatePopup && templatePopup.style.display === 'block') {
                templatePopup.style.display = 'none';
            }
        }

        // Add event listener to the document to close the popup when clicking anywhere
        document.addEventListener('click', function(event) {
            if (templatePopup && templatePopup.style.display === 'block' && !templatePopup.contains(
                    event.target) && event.target !== templateInput) {
                closeTemplatePopup();
            }
        });

        if (backBtn) {
            backBtn.addEventListener('click', function() {
                if (templateContent) {
                    templateContent.scrollLeft -= 200; // Adjust the scrolling amount as needed
                }
            });
        }

        if (forwardBtn) {
            forwardBtn.addEventListener('click', function() {
                if (templateContent) {
                    templateContent.scrollLeft += 200; // Adjust the scrolling amount as needed
                }
            });
        }

        colorPickerButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var colorId = this.id.replace('btn', 'color');
                var colorCode = this.style.backgroundColor ||
                defaultColor; // Ensure defaultColor is defined
                selectColor(colorId, colorCode);
            });
        });

        window.openColorPicker = toggleColorPicker;
    });
</script>
