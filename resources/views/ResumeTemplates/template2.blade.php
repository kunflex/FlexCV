
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template2</title>
</head>
<body>
   <div class="head">
        <h1>Curriculum Vitae</h1>
   </div>

     <!-- Personal details -->
    @if(!empty($cvPersonalDetails))
   <div class="section" >
    <h2>Personal Details</h2>
        @foreach($cvPersonalDetails as $PersonalDetails)
        <span>{{$PersonalDetails->firstname}} {{$PersonalDetails->othername}} {{$PersonalDetails->lastname}}</span><br>
        <span>Nationality: {{$PersonalDetails->country}}</span><br>
        <span>City/Town: {{$PersonalDetails->city_town}}</span><br>
        <span>Email: {{$PersonalDetails->email}}</span><br>
        <span>Tel: {{$PersonalDetails->phone_number}}</span><br>
        @endforeach
   </div>
   @else
    Personal Details field is empty
   @endif
    <!-- End Personal details -->


     <!-- Profile -->
     @if(!empty($cvPersonalDetails))
   <div class="section">
        <h2>Profile</h2>
        @foreach($cvPersonalDetails as $Summary)
        <p>
            {{$Summary->summary}}
        </p>
        @endforeach
   </div>
   @else
    <br>Profile field is empty
   @endif
    <!-- End Profile -->


    <!-- Education -->
    @if(!empty($cvEducation))
   <div class="section">
        <h2>Educational Background</h2>
        @foreach($cvEducation as $Education)
        <div class="section-mk">
            <span class="mk-span">{{$Education->start_date}} - 
                @if($Education->end_date == null)
                    {{'current'}}
                @else
                {{$Education->end_date}}
                @endif
            </span>
            <span>{{$Education->field_of_study}} | {{$Education->institution}}</span>
        </div><br>
        <span>{{$Education->certification}}</span>
        <p>
            <b>Course Outline</b>
            <ul>
                <li>List your courses</li>
                <li>List your courses</li>
                <li>List your courses</li>
                <li>List your courses</li>
            </ul>
        </p>
        @endforeach
   </div> 
   @else
    <br>{{'No education'}}
   @endif
   <!-- End Education -->


   <!-- Work Experience -->
   @if(!empty($cvExperience))
   <div class="section">
        <h2>Work Experience</h2>
        @foreach($cvExperience as $Experience)
        <div class="section-mk">
            <span class="mk-span">{{$Experience->start_date}} - 
                @if($Experience->end_date == null)
                    {{'current'}}
                @else
                {{$Experience->end_date}}
                @endif
            </span>
            <span>{{$Experience->job_title}} | {{$Experience->company}}</span>
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
        @endforeach
   </div>
   @else
    <br>{{'No experience'}}
   @endif
    <!-- End Work Experience -->


     <!-- Interest -->
     @if(!empty($cvAdditionalDetails))
   <div class="section">
        <h2>Interest</h2>
        @foreach($cvAdditionalDetails as $AdditionalDetails)
        <p>
            {{$AdditionalDetails->other_details}}
        </p>
        @endforeach
   </div>
   @else
    <br>{{'No Interest'}}
   @endif
    <!-- End Interest -->


     <!-- References -->
     @if(!empty($cvReference))
   <div class="section">
        <h2>Reference</h2>
            <ul class="mk-ul">
                @foreach($cvReference as $Reference)
                <li>
                    <span>{{$Reference->fullname}}</span><br>
                    <span class="nk-span">{{$Reference->position}}</span><br>
                    <span class="nk-span">{{$Reference->company}}</span><br>
                    <span class="nk-span">Email: {{$Reference->email}}</span><br>
                    <span class="nk-span">Tel: {{$Reference->telephone}}</span><br>
                </li><br>
                @endforeach
            </ul>
   </div>
   @else
    <br>{{'No Reference'}}
   @endif
    <!--End References -->
</body>
</html>
<style>
    @page {
    size: A4;
    margin:0px;
    margin-left: 40px;
    margin-right: 40px;
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
        border-top:28px solid #0095ff;
        border-bottom:28px solid #0095ff;
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