<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template5</title>
</head>
<body>
    <div class="control-body">
        <div class="box-layer1">
           <div>
                <img src="" alt="">
           </div>

           <div style="padding:20px;"> 
                <!-- Personal details -->
                <div class="section1" >
                    <h2>Personal Details</h2>
                </div>
                
                <!-- End Personal details -->
           </div>
        </div>

        <div class="box-layer2">
            <div class="head">
                <h1>Darko Vibes</h1>
            </div>
            <!-- Profile -->
            <div class="section1">
                    <h2>Profile</h2>
                    <p>
                        Describe your Profile
                        What hobbies, activities, or subjects are you passionate about? 
                        Feel free to share a bit about what makes you excited and engaged 
                        in your free time or professional life
                    </p>
            </div>
                <!-- End Profile -->


                <!-- Education -->
            <div class="section1">
                    <h2>Educational Background</h2>
                    <div class="section1-mk">
                        <span class="mk-span">Start date - End date</span>
                        <span>Program of Study | Institution</span>
                    </div>
                    <p>
                        <b>Course Outline</b>
                        <ul>
                            <li>List your courses</li>
                            <li>List your courses</li>
                            <li>List your courses</li>
                            <li>List your courses</li>
                        </ul>
                    </p>
            </div> 
            <!-- End Education -->

            <!-- Work Experience -->
                <div class="section1">
                        <h2>Work Experience</h2>
                        <div class="section1-mk">
                            <span class="mk-span">Start date - End date</span>
                            <span>Job Title | Company</span>
                        </div>
                        <p>
                            <b>Responsibilities</b>
                            <ul>
                                <li>Describe your responsibilities and achievements</li>
                                <li>Describe your responsibilities and achievements</li>
                                <li>Describe your responsibilities and achievements</li>
                                <li>Describe your responsibilities and achievements</li>
                            </ul>
                        </p>
                </div>
            <!-- End Work Experience -->

             <!-- Interest -->
                <div class="section1">
                        <h2>Interest</h2>
                        <p>
                            Describe your interest
                            What hobbies, activities, or subjects are you passionate about? 
                            Feel free to share a bit about what makes you excited and engaged 
                            in your free time or professional life
                        </p>
                </div>
            <!-- End Interest -->

            <!-- References -->
                <div class="section1">
                    <h2>Reference</h2>
                        <ul class="mk-ul">
                            <li>
                                <span>Reference 1</span><br>
                                <span class="nk-span">Position</span><br>
                                <span class="nk-span">Company</span><br>
                                <span class="nk-span">Email:</span><br>
                                <span class="nk-span">Tel:</span><br>
                            </li><br>

                            <li>
                                <span>Reference 2</span><br>
                                <span class="nk-span">Position</span><br>
                                <span class="nk-span">Company</span><br>
                                <span class="nk-span">Email:</span><br>
                                <span class="nk-span">Tel:</span><br>
                            </li>
                        </ul>
                </div>
            <!--End References -->
        </div>
    </div>
</body>
</html>
<style>
    @page {
    size: A4;
    margin:0px;
    }
    body{
        padding:0px;
        margin:0px;
    }
    .control-body{
        width:100%;
        height:100%;
        display:inline-flex;
        top:0;
        left:0;
    }
    .box-layer1{
        width:30%;
        min-height:100%;
        float:left;
        padding:20px;
        background-color:#0095ff;
    }
    .box-layer1 div{
        display:flex;
        justify-content:center;
    }
    .box-layer1 img{
        border:6px solid #fff;
        width:180px;
        height:180px;
        margin-top:30px;
        border-radius:50%;
    }
    .box-layer2{
        width:70%;
        height:auto;
        padding:20px;
        background-color:#fff;
    }
    
</style>