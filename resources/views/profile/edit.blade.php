
@extends('admin-layout')

@section('title', 'Profile Overview | Flexcv Official website')

@section('styles')
<style>
.header{
    width:100%;
    height:auto;
    padding-bottom:10px;
    border-bottom:1px solid #ddd;
    margin-bottom:20px;
}
.profile-content-layer{
    width:100%;
    height:auto;
    border-radius:10px;
    background-color:#ddd;
    margin-bottom:30px;
}
.cover{
    height:130px;
    width:auto;
    padding:20px;
    background-color:#0095ff;
    border-top-left-radius:10px;
    border-top-right-radius:10px;
}
.cover-layer{
    height:150px;
    width:auto;
    padding:20px;
    background-color:#fff;
    border-bottom-left-radius:10px;
    border-bottom-right-radius:10px;
}
.profile-content{
    width:100%;
    height:auto;
    border-radius:10px;
    background-color:#fff;
    margin-bottom:6px;
    padding:20px;
}
.div-flex{
    display:grid;
    gap:30px;
    grid-template-columns: repeat(2, 1fr);
}

@media (480px < width <=1080px) {
    .div-flex{
    display:grid;
    gap:30px;
    grid-template-columns: repeat(1, 1fr);
}
}
.div-box{
    display:grid;
    gap:30px;
    grid-template-columns: repeat(2, 1fr);
}
.cover-img img{
    width:130px;
    height:130px;
    border-radius:50%;
    border:4px solid #fff;
    position:absolute;
    margin-top:-200px;
    margin-left:30px;
    background-color:#ddd;
}
.cover-name{
    margin-left:160px;
    padding:10px;
}
.cover-line{
    border-bottom:1px solid #ddd;
}
</style>
@endsection

@section('content')
    <div class="header">
        <h2>
            {{ __('Profile Overview') }}
        </h2>
    </div>

  
        <div class="profile-content-layer">
            <div class="cover"></div>
            <div class="cover-layer">
                <div class="cover-name">
                    <h2>{{Auth::user()->name}}</h2>
                    <p>{{Auth::user()->email}}</p>
                </div><br>
                <div class="cover-line"></div>
            </div>
            <div class="cover-img">
                <img src="{{asset('assets/img/avarta.png')}}" alt="avarta">
            </div>
        </div>

        
        <div class="div-flex">
            <div class="profile-content">
                <h2>About</h2><br>
                <p>
                    <b>Bio</b><br>
                    Hello your description here
                </p><br>
                <div class="div-box">
                    <p>
                        <b>Usertype</b><br>
                        @role('admin')
                            admin
                        @endrole

                        @role('employer')
                            employer
                        @endrole

                        @role('user')
                            user
                        @endrole
                    </p>
                    <p>
                        <b>Location</b><br>
                        Accra city
                    </p>
                    <p>
                        <b>Phone</b><br>
                        +2330593958236
                    </p>
                    <p>
                        <b>Email</b><br>
                        {{Auth::user()->email}}
                    </p>
                </div>
            </div>

            <div class="profile-content">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="profile-content">
                @include('profile.partials.update-password-form')
            </div>

            <div class="profile-content">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
@endsection

@section('scripts')
<script>

</script>
@endsection