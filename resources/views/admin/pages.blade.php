@extends('admin-layout')

@section('title', 'AdminDashboard | About Page Content')

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
    padding:20px;
    background-color:#fff;
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
        </a>/About Page
    </div><br>

    <h3>About Page</h3><br>
    <div class="ojs">
        <div class="data-layer">
            <form action="{{url('about-page')}}" method="post">
                
                <div>
                    <label for="Job Description">Page Content:</label>
                    <textarea id="summernote" name="editordata"></textarea>
                </div>
        </div>
    </div>

        <div class="cbs">
                    <button class="cbs-btn1"><h4>Submit</h4></button>
                </div>
            </form>
        <br><br><br><br>
@endsection
