@extends('cv_structure')

@section('content')

<!-- ======Page content telling the user the next step===== -->
<div class="page-content">
        <div style="margin-top:60px;margin-bottom:20px;">
            <h1 style="margin-bottom:10px;">Review your education</h1>
        </div>

        <div class="rbs-content">
            <div class="double-box" style="width:60%;display:grid;">
            @foreach($cvEducation as $Education)
               <div class="play-box">
                    <div class="action">
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 24 24" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="m3.99 16.854-1.314 3.504a.75.75 0 0 0 .966.965l3.503-1.314a3 3 0 0 0 1.068-.687L18.36 9.175s-.354-1.061-1.414-2.122c-1.06-1.06-2.122-1.414-2.122-1.414L4.677 15.786a3 3 0 0 0-.687 1.068zm12.249-12.63 1.383-1.383c.248-.248.579-.406.925-.348.487.08 1.232.322 1.934 1.025.703.703.945 1.447 1.025 1.934.058.346-.1.677-.348.925L19.774 7.76s-.353-1.06-1.414-2.12c-1.06-1.062-2.121-1.415-2.121-1.415z" fill="#0095FF"/></svg>
                        </a>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#0095FF" height="23px" width="23px" version="1.1" id="Layer_1" viewBox="0 0 297 297" xml:space="preserve">
                                <g>
                                    <g>
                                        <g>
                                            <path d="M150.333,203.762c0-32.35,26.317-58.667,58.667-58.667c6.527,0,12.8,1.087,18.669,3.063l4.882-58.587H47.163     l14.518,174.21C63.233,282.408,79.091,297,97.784,297h84.147c18.692,0,34.551-14.592,36.103-33.219l0.173-2.081     c-3.001,0.475-6.075,0.729-9.207,0.729C176.651,262.429,150.333,236.112,150.333,203.762z"/>
                                            <path d="M209,158.714c-24.839,0-45.048,20.209-45.048,45.048c0,24.839,20.209,45.048,45.048,45.048s45.048-20.209,45.048-45.048     C254.048,178.923,233.839,158.714,209,158.714z M231.101,216.232c2.659,2.66,2.659,6.971,0,9.631     c-1.33,1.329-3.073,1.994-4.816,1.994c-1.742,0-3.486-0.665-4.816-1.994L209,213.393l-12.47,12.47     c-1.33,1.329-3.073,1.994-4.816,1.994c-1.742,0-3.486-0.665-4.816-1.994c-2.659-2.66-2.659-6.971,0-9.631l12.47-12.47     l-12.47-12.47c-2.659-2.66-2.659-6.971,0-9.631c2.66-2.658,6.971-2.658,9.631,0l12.47,12.47l12.47-12.47     c2.661-2.658,6.972-2.658,9.632,0c2.659,2.66,2.659,6.971,0,9.631l-12.47,12.47L231.101,216.232z"/>
                                            <path d="M112.095,26.102c0-6.883,5.6-12.483,12.483-12.483h30.556c6.884,0,12.484,5.6,12.484,12.483v8.507h13.619v-8.507     C181.238,11.71,169.528,0,155.135,0h-30.556c-14.392,0-26.102,11.71-26.102,26.102v8.507h13.618V26.102z"/>
                                            <path d="M236.762,63.643c0-8.5-6.915-15.415-15.415-15.415H58.367c-8.5,0-15.415,6.915-15.415,15.415v12.31h193.81V63.643z"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>

                    <div style="margin-bottom:10px;">
                        <h2>{{$Education->field_of_study}} | {{$Education->institution}}</h2>
                        <p>{{$Education->location}} <b style="font-size:25px">|</b> {{$Education->start_date}} -  
                        @if($Education->end_date == null)
                                {{'current'}}
                            @else
                                {{$Education->end_date}}
                            @endif</p>
                    </div>
                    <p>
                       {{ $Education->certification}}
                    </p>
                    <a href="{{url('experience-details')}}" style="color:#0095FF"><b>&plus; add descriptions</b></a><br>
               </div>
            @endforeach
            </div>
            
            <div class="page-prompt2">
                    <div>
                        <iframe class="preview-cv" src="{{route('preview')}}" frameborder="0" scrolling="no"></iframe>
              
                        <center><span>Preview</span></center>
                    </div>
                </div>
        </div>

        <div class="control-btn">
            <a href=""><li class="cbs-btn"><h3>Back</h3></li></a>
            <a href="{{url('more-education')}}" ><li class="cbs-btn" style="margin-left:30%;width:auto;background-color:#0095FF;border-style:none;color:#fff;"><h3>&plus; Add more education</h3></li></a>
            <a href="{{url('skills')}}"><li class="cbs-btn1"><h3>Continue</h3></li></a>
        </div><br><br><br><br><br>
    </div>
<!-- ======End Page content telling the user the next step===== -->

@endsection

@section('styles')
<style>
    .play-box{
        width:100%;
        min-height:160px;
        background-color:whitesmoke;
        border:1px solid #ccc;
        border-radius:8px;
        padding:20px;
    }
    .action{
        width:auto;
        height:auto;
        float:right;
    }
</style>
@endsection