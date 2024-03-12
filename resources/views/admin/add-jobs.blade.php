@extends('admin-layout')

@if(auth()->user()->hasRole('admin'))
    @section('title', 'Admin Dashboard | Jobs')
@elseif(auth()->user()->hasRole('employer'))
    @section('title', 'Employer Dashboard | Jobs')
@endif

@section('styles')
<style>
.cbs{
    width:100%;
    display:block;
}
.cbs-group{
    width:100%;
    height:auto;
    display:inline-flex;
    gap:30px;
    margin-bottom:10px;
}
h3{
    text-align:center;
}
.ojs{
    background-color:#fff;
    padding:20px;
    border-radius:8px;
    margin-bottom:40px;
}
.header{
    user-select:none;
}
.header a{
    text-decoration:none;
    color:black;
}
</style>
@endsection

@section('content')

@if(auth()->user()->hasRole('admin'))
    <div class="header">
        <a href="admin">
            {{ __('Admin Dashboard') }}
        </a>/Jobs
    </div><br>
    @elseif(auth()->user()->hasRole('employer'))
    <div class="header">
        <a href="employer">
            {{ __('Employer Dashboard') }}
        </a>/Jobs
    </div><br>
@endif

    <h3>Job Details</h3><br>
    <div class="ojs">
        <div class="data-layer">
            <form action="{{url('new-jobs')}}" method="post">
                
                <div class="cbs-group">
                    <div class="cbs">
                        <label for="">Job Title:</label>
                        <input class="rbs-input" type="text" placeholder="Accountant">
                    </div>
                    
                    <div class="cbs">
                        <label for="">Job Type:</label>
                        <select  type="text">
                            <option value="">--- Select one ---</option>
                            <option value="">Full - Time</option>
                            <option value="">Part - Time</option>
                            <option value="">Remote</option>
                            <option value="">Contract</option>
                        </select>
                    </div>
                </div>

                <div class="cbs-group">
                    <div class="cbs">
                        <label for="">Company:</label>
                        <input class="rbs-input" type="text" placeholder="Flexcotech Limited ">
                    </div>

                    <div class="cbs">
                        <label for="">Location:</label>
                        <input class="rbs-input" type="text">
                    </div>
                </div>

                <div class="cbs-group">
                    <div  class="cbs">
                        <label for="salary">Salary Range:</label>
                        <input class="rbs-input" type="text" placeholder="GHS1200 - GHS2000">
                    </div>

                    <div  class="cbs">
                        <label for="Application Instructions">Category:</label>
                        <select type="text">
                            <option value="">--- Select one ---</option>
                            <option value="">IT</option>
                            <option value="">Marketing</option>
                            <option value="">Accounting</option>
                            <option value="">Engineering</option>
                            <option value="">Fashion Design</option>
                        </select>
                    </div>
                </div>

                <div  class="cbs">
                    <label for="Application Instructions">Application Instructions:</label>
                    <input class="rbs-input" type="text">
                </div>
                <br>

                <div>
                    <label for="Job Description">Job Description:</label>
                    <textarea id="summernote" name="editordata"></textarea>
                </div>
        </div>
    </div>
                
                <div class="cbs">
                    <button class="cbs-btn1"><h3>Post</h3></button>
                </div>
            </form>
        <br><br><br><br>
    
@endsection

@section('scripts')
<script>

</script>
@endsection