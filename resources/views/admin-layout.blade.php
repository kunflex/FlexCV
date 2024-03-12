
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/cv.css')}}">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

<!-- include libraries(jQuery, bootstrap) -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>
@yield('styles')
<body>
    <header>
   
    <div>

        <section>
            
                        
            @if(Auth::user()->hasRole('admin'))
            <div class="sidebar-color" style="z-index:2;">
                <nav>
                    <ul>
                        <div class="logo">

                            <a href="{{route('landingpage')}}"><img src="{{asset('assets/img/logo1.png')}}" alt=""></a>

                        </div>
                        <div class="side-menu">
                            <a href="{{url('jobs')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Jobs & Categories</span>
                                </li>
                            </a><br>

                            <a href="{{url('suggestions')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Suggestions</span>
                                </li>
                            </a><br>

                            <a href="{{url('pages')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Pages</span>
                                </li>
                            </a><br>

                            <a href="">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Messages</span>
                                </li>
                            </a><br>

                            <a href="{{url('account')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Users</span>
                                </li>
                            </a><br>

                            <a href="">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Settings</span>
                                </li>
                            </a><br>

                            <a href="">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Reports</span>
                                </li>
                            </a><br>
                        </div>

            @elseif(Auth::user()->hasRole('employer'))
            <div class="sidebar-color" style="z-index:2;">
                <nav>
                    <ul>
                        <div class="logo">

                            <a href="{{route('landingpage')}}"><img src="{{asset('assets/img/logo1.png')}}" alt=""></a>

                        </div>
                        <div class="side-menu">
                            <a href="{{url('jobs')}}">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">Jobs & Categories</span>
                                </li>
                            </a><br>

                            <a href="">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">empty</span>
                                </li>
                            </a><br>

                            <a href="">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">empty</span>
                                </li>
                            </a><br>

                            <a href="">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">empty</span>
                                </li>
                            </a><br>

                            <a href="">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">empty</span>
                                </li>
                            </a><br>

                            <a href="">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">empty</span>
                                </li>
                            </a><br>

                            <a href="">
                                <li class="menu-btn">
                                    <span class="progress-count"></span>
                                    <span class="progress-label">empty</span>
                                </li>
                            </a><br>
                        </div>

                        <div class="side-footer">
                            <h5><a href="">Terms & Conditions</a> | <a href="">Contact Us</a></h5>
                            <span><b>&copy;</b> 2023 FlexCV. All Copyright Reserved</span>
                        </div>
                    </ul>
                </nav>
            </div>
        </section>
    </div>
    @else
    <style>
        .sidebar-content2{
            width:100%;
        }
        .logo-design h1{
            font-size:35px;
            font-family:Arial, Helvetica, sans-serif;
            position:absolute;
            margin-top:-10px;
            margin-left:10px;
        }
        a{
            text-decoration:none;
            color:black;
        }
        .logo-design h1 span{
            color:#0095ff;
        }
    </style>
    @endif
    </header>

    
    <div>
        <div class="sidebar-content2">
            <div class="top-mkc">
                @role('user')
                    <div class="logo-design">
                        <a href="{{route('landingpage')}}"><h1>Flex<span>CV</span></h1></a>
                    </div>
                @endrole


                @if (Route::has('login')) 
                @auth
                <div class="dropdown">
                    <img src="{{asset('assets/img/avarta.png')}}" alt="avarta">
                        <div class="dropdown-content" style="width:190px; margin-left: -130px;">
                            <a style="user-select:none;">
                                <li><b>{{Auth::user()->name}}</b> <br> 
                                    <span style="font-size:12px;color:gray;margin-right:10px;">
                                        {{Auth::user()->email }}
                                    </span>
                                </li>
                            </a>
                            <a style="user-select:none"href="{{route('profile.edit')}}"><li>profile</li></a>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <a href="{{route('logout')}}" 
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();" style="user-select:none">
                                        <li>logout</li>
                                    </a>
                            </form>
                        </div>
                </div>
                @else
                
                @endauth
                @endif
            </div><br><br><br>

            <main>
                @yield('content')
            </main>
        </div>
    </div>

  

</body>
</html>
<style>
    .sidebar-content2{
        background-color:whitesmoke;
    }
    body{
        background-color:whitesmoke;
    }
    
    .dropdown img{
        margin-top: 8px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display:flex;
        align-items:center;
        justify-content::center;
        background:linear-gradient(to left, #0FFF, #0095FF);
        padding: 4px;
    }
    .dropdown{
        float:right;
        margin-right:16px;
        margin-top:-15px;
        display: inline-block;
    }
    li{
        list-style-type: none;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #FFFF;
        box-shadow: 0px 2px 3px #ddd;
        z-index: 1;
        margin-left: -28px;
    }
    .dropdown-content a {
        color: #333;
        padding: 10px 16px;
        display: block;
        text-decoration: none;
    }
    .dropdown-content a li{
        font-size: 16px;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
    .dropdown-content a:hover{
    background-color: #0FFF;
    }
    .top-mkc{
    width:100%;
    height:60px;
    position: inherit;
    padding:20px;
    top:0;
    left:0;
    z-index: 999;
    background-color:white;
    border-bottom:1px solid #ddd;
    transition: top 0.3s ease; 
    }
    .progress-count{
        width:30px;
        height:30px;
        border-radius:50%;
        text-align:center;
        background-color:white;
        position:relative;
        color:#0095FF;
    }
    .progress-count::before{
        counter-increment:step;
        content:counter(step);
    }
    .progress-label{
        width:auto;
        height:auto;
    }
    .side-menu::before{
        content:"";
        position: absolute;
        justify-content:center;
        text-align:center;
        transform:translateX(50%);
        width:4px;
        margin-left:12px;
        margin-top:10px;
        height: 400px;
        user-select:none;
        background-color:#ffff;
        counter-reset:step;
    }
    .active{
        color:white;
        background-color:#0091FF;
        border: 2px solid #ffff;
    }
</style>

<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            placeholder: 'Description here!',
            tabsize: 2,
            height: 450,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic']],
                ['fontname', ['fontname']], // Added for font family
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['undo', ['undo']],
                ['redo', ['redo']],
                ['view', ['codeview']]
            ]
        });
    });
</script>
@yield('scripts')