@extends('cv_structure')

@section('content')
<!-- ======Page prompt telling the user the next step===== -->
    <div class="page-prompt">
        <div class="page-prompt1">
            <div style="margin-top:60px;margin-bottom:20px;">
                <span>Step: 7</span>
                <h1 style="margin-bottom:10px;font-size:60px;">Now, Let's finalize your resume</h1>
            </div>

            <div class="rbs-content">
                
            </div>

            <div class="control-btn">
                <a href=""><li class="cbs-btn"><h3>Back</h3></li></a>
                <a href="{{url('finished-resume')}}"><li class="cbs-btn1"><h3>Continue</h3></li></a>
            </div>
        </div>


        <div class="page-prompt2">
            <div>
                <iframe class="preview-cv" src="{{route('preview')}}" frameborder="0" scrolling="no"></iframe>
                
                <center><span>Preview</span></center>
            </div>
        </div>
    </div>
<!-- ======End Page prompt telling the user the next step===== -->

@endsection