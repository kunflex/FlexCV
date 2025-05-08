<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlexCV Official Website</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/logo1.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

</head>

<body>
    <div style="margin-top:10%;margin-bottom:50px;">
        <h1 style="display:flex;justify-content:center;margin-bottom:10px;">How do you want to build your resume?</h1>
    </div>
    <form action="{{ route('processForm') }}" method="post">
        @csrf
        <div class="rbs-content">
            <a>
                <div class="rbs-card">
                    <div>
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 64 64"
                            enable-background="new 0 0 64 64" xml:space="preserve" fill="#00000" stroke="#00000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <polygon fill="#0095FF" points="45,0.586 45,14 58.414,14 "></polygon>
                                    <path fill="#0095FF"
                                        d="M44,16c-0.553,0-1-0.447-1-1V0H7C4.789,0,3,1.789,3,4v56c0,2.211,1.789,4,4,4h48c2.211,0,4-1.789,4-4V16H44 z M14,18h16c0.553,0,1,0.447,1,1s-0.447,1-1,1H14c-0.553,0-1-0.447-1-1S13.447,18,14,18z M48,51H14c-0.553,0-1-0.447-1-1 s0.447-1,1-1h34c0.553,0,1,0.447,1,1S48.553,51,48,51z M48,45H14c-0.553,0-1-0.447-1-1s0.447-1,1-1h34c0.553,0,1,0.447,1,1 S48.553,45,48,45z M48,39H14c-0.553,0-1-0.447-1-1s0.447-1,1-1h34c0.553,0,1,0.447,1,1S48.553,39,48,39z M48,33H14 c-0.553,0-1-0.447-1-1s0.447-1,1-1h34c0.553,0,1,0.447,1,1S48.553,33,48,33z M48,27H14c-0.553,0-1-0.447-1-1s0.447-1,1-1h34 c0.553,0,1,0.447,1,1S48.553,27,48,27z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <h4 style="margin-bottom:10px;">Create a New Resume</h4>
                        <span>we'll go through each section together</span>
                    </div>
                    <input class="rbs-radio" type="radio" name="new-resume" id="new-resume" onclick="Activemenu(0)">
                </div>
            </a>

            <a>
                <div class="rbs-card">
                    <div>
                        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 64 64"
                            enable-background="new 0 0 64 64" xml:space="preserve" fill="#00000" stroke="#00000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <polygon fill="#0095FF" points="45,0.586 45,14 58.414,14 "></polygon>
                                    <path fill="#0095FF"
                                        d="M44,16c-0.553,0-1-0.447-1-1V0H7C4.789,0,3,1.789,3,4v56c0,2.211,1.789,4,4,4h48c2.211,0,4-1.789,4-4V16H44 z M14,18h16c0.553,0,1,0.447,1,1s-0.447,1-1,1H14c-0.553,0-1-0.447-1-1S13.447,18,14,18z M48,51H14c-0.553,0-1-0.447-1-1 s0.447-1,1-1h34c0.553,0,1,0.447,1,1S48.553,51,48,51z M48,45H14c-0.553,0-1-0.447-1-1s0.447-1,1-1h34c0.553,0,1,0.447,1,1 S48.553,45,48,45z M48,39H14c-0.553,0-1-0.447-1-1s0.447-1,1-1h34c0.553,0,1,0.447,1,1S48.553,39,48,39z M48,33H14 c-0.553,0-1-0.447-1-1s0.447-1,1-1h34c0.553,0,1,0.447,1,1S48.553,33,48,33z M48,27H14c-0.553,0-1-0.447-1-1s0.447-1,1-1h34 c0.553,0,1,0.447,1,1S48.553,27,48,27z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div>
                        <h4 style="margin-bottom:10px;">I Already have a Resume</h4>
                        <span>we'll transfer everything to your new template</span>
                    </div>
                    <input class="rbs-radio" type="radio" name="upload-resume" id="upload-resume"
                        onclick="Activemenu(1)">
                </div>
            </a>
        </div>

        <div class="control-btn">
            <a href="">
                <li class="cbs-btn">
                    <h3>Back</h3>
                </li>
            </a>
            <button class="cbs-btn1">
                <h3>Continue</h3>
            </button>
        </div>
    </form>

</body>

</html>
<script>
    function Activemenu(index) {
        // Remove 'active' class from all links
        const links = document.querySelectorAll('.rbs-content a');
        links.forEach(link => link.classList.remove('active'));

        // Add 'active' class to the clicked link
        document.querySelector(`.rbs-content a:nth-child(${index + 1})`).classList.add('active');

        // Add your logic for menu activation here...
    }
</script>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const newResumeRadio = document.getElementById("new-resume");
        const uploadResumeRadio = document.getElementById("upload-resume");

        uploadResumeRadio.addEventListener("change", function() {
            if (uploadResumeRadio.checked) {
                newResumeRadio.checked = false;
            }
        });

        newResumeRadio.addEventListener("change", function() {
            if (newResumeRadio.checked) {
                uploadResumeRadio.checked = false;
            }
        });
    });
</script>


<style>
    a {
        list-style: none;
    }

    body {
        background-color: whitesmoke;
        display: block;
        padding: 20px;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .cbs-btn {
        padding-left: 20px;
        padding-right: 20px;
        background-color: transparent;
        border: 2px solid #0095FF;
        border-radius: 50px;
        color: #0095FF;
        font-size: 13px;
        float: left;
        font-family: Arial, Helvetica, sans-serif;
    }

    .rbs-card {
        display: flex;
        padding: 20px;
        gap: 20px;
        border: 2px solid #0095FF;
        border-radius: 6px;
    }

    .rbs-content {
        height: auto;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        padding-left: 60px;
        padding-right: 60px;
        gap: 8%;
        margin-bottom: 50px;
    }

    @media (max-width:768px) {
        .rbs-content {
            grid-template-columns: 1fr;
            padding: 0;
        }
    }

    .cbs-btn1 {
        padding-left: 15px;
        padding-right: 15px;
        background-color: #0FFF;
        border-style: none;
        border-radius: 50px;
        color: white;
        font-size: 13px;
        float: right;
        font-family: Arial, Helvetica, sans-serif;
    }

    .control-btn {
        height: auto;
        user-select: none;
        display: flex;
        justify-content: center;
        cursor: pointer;
        gap: 60%;
    }

    .rbs-radio {
        width: 30px;
        height: 30px;
        visibility: hidden;
    }

    .active {
        background-color: rgba(0, 255, 255, 0.185);
    }

    a:hover {
        opacity: 0.8;
    }

    a:hover .rbs-radio {
        visibility: visible;
    }

    .active .rbs-radio {
        visibility: visible;
    }
</style>
