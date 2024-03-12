
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template3</title>
</head>
<body>
   <div class="head">
        <h1>Curriculum Vitae</h1>
   </div>

     <!-- Personal details -->
   <div class="section" >
    <h2>Personal Details</h2>
        <span>Kelvin Boateng</span><br>
        <span>Ghana,Accra</span><br>
        <span>(+233593958236)</span><br>
        <span>example@gmail.com</span><br>
   </div>
    <!-- End Personal details -->


     <!-- Profile -->
   <div class="section">
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
   <div class="section">
        <h2>Educational Background</h2>
        <div class="section-mk">
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
   <div class="section">
        <h2>Work Experience</h2>
        <div class="section-mk">
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
   <div class="section">
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
   <div class="section">
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
</body>
</html>
<style>
    @page {
    size: A4;
    margin: 10px;
    }
     .head{
        
     }
    h1{
        width:260px;
        border-bottom:3px solid #0095ff;
        color:#0095ff;margin:0 auto;
        text-align:center;
    }
    .mk-ul li{
       list-style-type: lower-roman;
    }
    .mk-ul li .nk-span{
       margin-left:20px;
    }
    .mk-span{
        margin-right:30px;
    }
    .section-mk{
        width:auto;
        height:auto;
        display:inline-flex;
        gap:20px;
    }
    body{
        margin:0px;
        padding:10px;
        font-family: Arial, sans-serif;
        border:20px solid #0095ff;
    }
    .section{
        width:100%;
        height:auto;
        display:block;
    }
    .section h2{
        color:#0095ff;
        border-bottom:2px solid #0095ff;
    }
</style>