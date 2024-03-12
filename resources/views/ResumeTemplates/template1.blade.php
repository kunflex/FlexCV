<style>
    @page {
    size: A4;
    margin: 6px;
    }
    .template-box{
        width:auto;
        height:auto;
        border:20px solid blue;
        padding:20px;
        letter-spacing: normal;
        font-family: 'Times New Roman', Times, serif;
    }
    .template-header{
        width:auto;
        height:auto;
        text-align:center;
        margin-bottom:10px;
        color:blue;
    }
    .template-section{
        width:auto;
        height:auto;
        text-align:left;
        margin-bottom:8px;
    }
    .title-content{
        width:auto;
        height:auto;
        font-weight:400;
        text-transform: uppercase;
        border-bottom:2px solid blue;
        border-top:5px solid blue;
        margin-bottom:6px;
    }
    ul{
        width:auto;
        height:auto;
        display:block;
        margin-left:0px;
    }
    ul li{
        list-style-type: upper-roman;
    }
    .dots-bullets{
        list-style-type: disc;
    }
    .section-content{
        width:100%;
        height:auto;
        display:inline-flex;
        gap: 40px;
    }
    .left-align{
        width:auto;
        height:auto;
        display:block;
    }
    .right-align{
        width:auto;
        height:auto;
        display:block;
    }
</style>

<div class="template-box" id="uniqueId1">
    <div class="template-header" >
        <h2>CURRICULUM VITAE</h2>
    </div>
    <div class="template-section">
        <h3 class="title-content">PERSONAL DETAILS</h3>
        <div class="template-section-content">
           <p>Content here!</p>
        </div>
    </div>
    <div class="template-section">
        <h3 class="title-content">PROFILE</h3>
        <div class="template-section-content">
            <p>Content here!</p>
        </div>
    </div>
    <div class="template-section">
        <h3 class="title-content">SUMMARY OF SKILLS </h3>
        <div class="template-section-content">
            <ul>
                <li class="dots-bullets">Content here!</li>
            </ul>
        </div>
    </div>


    @if(empty($cvExperience))
        <p>No experience</p>
    @else
    <div class="template-section">
        <h3 class="title-content">EXPERIENCE</h3>
        @foreach($cvExperience as $experience)
        @if(is_object($experience))
        <div class="template-section-content">
            <div class="section-content">
                <div class="left-align">
                    <p>{{$experience->start_date}} - 
                        @if($experience->end_date == null)
                            {{'current'}}
                        @else
                            {{$experience->end_date}}
                        @endif
                    </p>
                </div>
                <div class="right-align">
                    <p>{{$experience->job_title}} - {{$experience->company}}</p>
                </div>
            </div><br>
            <b>Responsibilities</b>
            <ul>
                <li class="dots-bullets">Frontend Develpoment using  HTML, JavaScript, CSS</li>
                <li class="dots-bullets">Backend Develpoment using  PHP with Laravel Framework</li>
            </ul>
        </div>
        @endif
        @endforeach
    </div>
    @endif


    <div class="template-section">
        <h3 class="title-content">EDUCATIONAL BACKGROUND</h3>
        <div class="template-section-content">
            @foreach($cvEducation as $education)
            <div class="section-content">
                <div class="left-align">
                    <p>{{$education->start_date}} – {{$education->end_date}}</p>
                </div>
                <div class="right-align">
                    <p>{{$education->institution}}</p>
                    <p>{{$education->certification}}</p>
                    <p>Course studied</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <div class="template-section">
        <h3 class="title-content">INTERESTS</h3>
        <div class="template-section-content">
            <p>Content here!</p>
        </div>
    </div>


    <div class="template-section">
        <h3 class="title-content">REFEREES</h3>
        @foreach($cvReference as $reference)
        <div class="template-section-content">
            <ul>
                <li>
                    <p>{{$reference->name}}</p>
                    <p>{{$reference->position}}</p>
                    <p>{{$reference->company}}</p>
                    <p>{{$reference->telephone}}</p> 
                </li>
            </ul>
        </div>
        @endforeach
    </div>


</div>