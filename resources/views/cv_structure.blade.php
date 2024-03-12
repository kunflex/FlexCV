
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
   <link rel="stylesheet" href="{{asset('assets/css/cv.css')}}">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

<!-- include libraries(jQuery, bootstrap) -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

</head>

@yield('styles')
<body>
    <header>
    <div>
        <section>
            <div class="sidebar-color">
                <nav>
                    <ul>
                        <div class="logo">
                            <a href="{{url('/Index')}}"><img src="{{asset('assets/img/logo1.png')}}" alt=""></a>
                        </div>
                        
                        <div class="side-menu">
                            <a href="{{url('new-resume')}}">
                                <li class="menu-btn">
                                    <span class="progress-count "></span>
                                    <span class="progress-label">Header</span>
                                </li>
                            </a><br>

                            <a href="{{url('experience')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Experience</span>
                                </li>
                            </a><br>

                            <a href="{{url('education')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Education</span>
                                </li>
                            </a><br>

                            <a href="{{url('skills')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Skills</span>
                                </li>
                            </a><br>

                            <a href="{{url('summary')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Summary</span>
                                </li>
                            </a><br>

                            <a href="{{url('additional-details')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Additional Details</span>
                                </li>
                            </a><br>

                            <a href="{{url('finalize')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Finalize</span>
                                </li>
                            </a><br>
                        </div>

                        <div class="side-footer">
                            <h5><a href="">Terms & Conditions</a> | <a href="">Contact Us</a></h5>
                            <span><b>&copy;</b> 2023 FlexCV. All Copyright Reserved</span>
                        </div>
                    </ul>
                </nav>
            </div>
        </section>
    </div>
    </header>
    <div>
        <div class="sidebar-content">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
  

</body>
</html>
<style>
    .progress-count{
        width:30px;
        height:30px;
        border-radius:50%;
        text-align:center;
        background-color:white;
        position:relative;
        color:#0095FF;
    }
    .progress-count::before{
        counter-increment:step;
        content:counter(step);
    }
    .progress-label{
        width:auto;
        height:auto;
    }
    .side-menu::before{
        content:"";
        position: absolute;
        justify-content:center;
        text-align:center;
        transform:translateX(50%);
        width:4px;
        margin-left:12px;
        margin-top:10px;
        height: 400px;
        user-select:none;
        background-color:#ffff;
        counter-reset:step;
    }
</style>
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            placeholder: 'Description here!',
            callbacks: {
                onInit: function () {
                    $('#summernote').summernote('');
                }
            },
            tabsize: 2,
            height: 480,
            width: 490,
            toolbar: [
                ['font', ['bold', 'underline', 'italic']],
                ['para', ['ol','ul', 'paragraph']],
                ['undo', ['undo']],
                ['redo', ['redo']]
            ]
        });
    });
</script>
<!-- Updated script section -->
<script>
    // Object to keep track of added content
    const addedContent = {};

    function Addfunction(cardNumber) {
        const addContent = document.getElementById(`add${cardNumber}`);
        const removeContent = document.getElementById(`remove${cardNumber}`);
        const showElement = document.querySelector(`.my-card:nth-child(${cardNumber}) .show`);
        const summernote = $('#summernote');

        // Toggle to content
        addContent.style.display = 'none';
        removeContent.style.display = 'flex';

        // Get the content of the paragraph tag
        const cardContent = showElement.textContent.trim();

        // Append the content to Summernote and store it
        const currentContent = summernote.summernote('code');
        summernote.summernote('code', currentContent + '\n' + cardContent);
        addedContent[cardNumber] = cardContent;
    }

    function Clearfunction(cardNumber) {
        const addContent = document.getElementById(`add${cardNumber}`);
        const removeContent = document.getElementById(`remove${cardNumber}`);
        const summernote = $('#summernote');

        // Hide minus, show plus
        addContent.style.display = 'flex';
        removeContent.style.display = 'none';

        // Remove card content from Summernote and from addedContent
        const cardContent = addedContent[cardNumber];
        const currentContent = summernote.summernote('code');
        const newContent = currentContent.replace(cardContent, '').trim();
        summernote.summernote('code', newContent);
        delete addedContent[cardNumber];
    }
</script>
  
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const backButton = document.querySelector('.cbs-btn');

        // Add event listener for the "Back" button
        backButton.addEventListener("click", function (event) {
            event.preventDefault();
            history.back(); // Navigate back to the previous page
        });
    });
</script>