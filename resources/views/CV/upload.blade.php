<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CV | FlexCV Official Website</title>
</head>
<body>
<div class="box-area">
    <div class="drag-area" >
        <form action="{{ route('cv.process') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="icon">
                <svg width="160px" height="160px" viewBox="0 -1.5 35 35" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <title>upload1</title>
                    <path d="M29.426 15.535c0 0 0.649-8.743-7.361-9.74-6.865-0.701-8.955 5.679-8.955 5.679s-2.067-1.988-4.872-0.364c-2.511 1.55-2.067 4.388-2.067 4.388s-5.576 1.084-5.576 6.768c0.124 5.677 6.054 5.734 6.054 5.734h9.351v-6h-3l5-5 5 5h-3v6h8.467c0 0 5.52 0.006 6.295-5.395 0.369-5.906-5.336-7.070-5.336-7.070z"></path>
                </svg>
            </div>
            <header>Drag & Drop to Upload</header>
            <header>OR</header>
            <div class="button" onclick="uploadcv()">Browse File</div>
            <input type="file" name="cv" id="cv" accept=".pdf" hidden required>
            <div class="file-name" style="color:darkgray;margin-top:4px;">Accepts Only PDF File Formats </div><br>
            <div class="file-name" id="file-name"></div><br>
        </form>
    </div>
</div>

<script>
    function uploadcv() {
        const upload = document.getElementById('cv');
        const fileNameDisplay = document.getElementById('file-name');

        // Add an event listener to detect changes in the file input
        upload.addEventListener('change', function () {
            // Display the selected file name in the "file-name" div
            fileNameDisplay.textContent = upload.files.length > 0 ? upload.files[0].name : '';

            // Check if a file has been selected
            if (upload.files.length > 0) {
                // You can perform additional checks or actions here if needed

                // Submit the form
                const form = document.querySelector('form');
                form.submit();
            } else {
                // Display an error message or take appropriate action if no file is selected
                alert('Please select a file before submitting.');
            }
        });

        // Trigger a click on the file input to open the file dialog
        upload.click();
    }
</script>
<style>
    *{
        margin:0px;
        padding:0px;
    }
    body{
        background-color: rgba(0, 0, 0, 0.11);
    }
    .button{
        width:100px;
        display: flex; 
        align-items:center;
        justify-content:center;
        font-size:16px;
        margin:0 auto;
        background-color:#0095FF;
        border-radius:4px;
        color:white;
        padding:6px;
        border-style:none;
        user-select:none;
        cursor: pointer;
    }
    .file-name{
        display:flex;
        align-items:center;
        justify-content:center;
        text-align:center;
    }
    .box-area{
        width:35%;
        height:60%;
        display:flex;
        align-items:center;
        justify-content:center;
        border-radius:10px;
        margin:0 auto;
        padding:20px;
        margin-top:10%;
        box-shadow:2px 2px 6px #ddd;
        user-select:none; 
        background-color:#fff;
    }
    
    .drag-area header{
        font-size:20px;
        text-align:center;
    }
    .icon{
        display: flex; 
        margin:0 auto;
        justify-content:center;
        align-items:center;
    }
    .drag-area{
        width:100%;
        height:100%;
        border:2px solid #0095FF;
        border-radius:8px;
        display: flex; 
        justify-content:center;
        align-items:center;
        margin:0 auto;
        border-style: dashed;
        animation: borderAnimation 20s infinite;
    }
    @keyframes borderAnimation {
        0% {
            border-color: #0095FF; /* Initial color */
        }
        20% {
        border-color: #FF4500; /* Midway color */
        }
        40% {
            border-color: darkblue; /* Midway color */
        }
        80% {
        border-color: #FF4500; /* Midway color */
        }
        100% {
            border-color: blue; /* Final color */
        }
    }
    svg{
        fill:#0095FF;
    }

    @media (72px < width >= 1920px) {
        .box-area{
            width:35%;
            height:60%;
            margin-top:10%;
        }
    }
    @media (480px < width <= 720px) {
        .box-area{
            width:400px;
            height:60%;
            margin-top:10%;
        }
    }
    @media (max-width: 480px) {
        .box-area{
            width:300px;
            height:60%;
            margin-top:20%;
        }
    }
</style>

<!-- Add this script inside your HTML file, preferably at the end, just before the closing </body> tag -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dragArea = document.querySelector('.drag-area');
        const uploadInput = document.getElementById('cv');
        const fileNameDisplay = document.getElementById('file-name');

        dragArea.addEventListener('dragover', function (e) {
            e.preventDefault();
            dragArea.classList.add('drag-over');
        });

        dragArea.addEventListener('dragleave', function () {
            dragArea.classList.remove('drag-over');
        });

        dragArea.addEventListener('drop', function (e) {
            e.preventDefault();

            dragArea.classList.remove('drag-over');

            const droppedFiles = e.dataTransfer.files;

            if (droppedFiles.length > 0) {
                uploadInput.files = droppedFiles;
                fileNameDisplay.textContent = droppedFiles[0].name;

                // Submit the form after dropping the file
                submitForm();
            }
        });

        uploadInput.addEventListener('change', function () {
            fileNameDisplay.textContent = uploadInput.files.length > 0 ? uploadInput.files[0].name : '';
        });

        function submitForm() {
            // Get the form element and submit it
            const form = document.querySelector('form');
            form.submit();
        }
    });
</script>

</body>
</html>