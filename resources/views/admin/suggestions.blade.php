@extends('admin-layout')

@section('title', 'AdminDashboard | Suggestions')

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
    <div class="header">
        <a href="admin">
            {{ __('AdminDashboard') }}
        </a>/Suggestions
    </div><br>

    <h3>Suggestions Details</h3><br>
    <div class="ojs">
        <div class="data-layer">
            <form action="{{url('new-suggestions')}}" method="post">
                
                <div class="cbs-group">
                    <div class="cbs">
                        <label for="">Job Title:</label>
                        <input class="rbs-input" type="text" placeholder="Accountant">
                    </div>
                </div>

                <div class="cbs-group">
                    <div  class="cbs">
                        <label for="">Suggestion Type:</label>
                        <select type="text">
                            <option value="">--- Select one ---</option>
                            <option value="">Skills</option>
                            <option value="">Summary</option>
                            <option value="">Additional Details</option>
                        </select>
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
                <br>

                <div>
                    <label for="Job Description">Job Description:</label>
                    <textarea id="editor1" name="editordata"></textarea>
                </div>
        </div>
    </div>

        <div class="cbs">
                    <button class="cbs-btn1"><h4>Post</h4></button>
                </div>
            </form>
        <br><br><br><br>
@endsection
