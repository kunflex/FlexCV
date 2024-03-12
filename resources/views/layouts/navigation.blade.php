    <!-- ======Navigation======= -->
    <div style="height:auto;width:100%;position:fixed;z-index: 2;">
        <div class="AI-powered"><b>&#10026;</b> AI-Powered CV builder with job matching. Coming soon! <b>&#10026;</b></div>
            <div class="nav-color">
                <header>
                    <nav>
                        <ul>
                            <div class="logo-design">
                                <a href="{{route('landingpage')}}"><h1>Flex<span>CV</span></h1></a>
                             </div>

                            <div class="nav-menu-container">
                                <div class="nav-menu">
                                    <div class="dropdown">
                                        <a href=""><li>Resume</li></a>
                                        <div style="margin-top:10px;">
                                            <div class="dropdown-content">
                                                <a href="{{route('template-display')}}"><li>Resume Template</li></a>
                                                <a href="{{url('select-resume')}}"><li>Create a resume</li></a>
                                                <a href="#"><li>How to write a resume</li></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropdown">
                                        <a href=""><li>Job Search</li></a>
                                        <div style="margin-top:10px;">
                                            <div class="dropdown-content">
                                                <a href="job-search">
                                                    <li>
                                                        Find Jobs available
                                                    </li>
                                                </a>
                                                <a href="jobs-nearby">
                                                    <li>
                                                        Jobs near by
                                                    </li>
                                                </a>
                                                <a href="#"><li>How to get your dream job</li></a>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{url('about')}}"><li>About Us</li></a>
                                    <a href="{{url('contact')}}"><li>Contact Us</li></a>
                                </div>
                            </div>

                                @if (Route::has('login')) 
                                    @auth
                                            
                                <div class="dropdown" style="margin-right:30px">
                                    <a href="{{route('dashboard')}}">
                                        <img src="{{asset('assets/img/avarta.png')}}" alt="">
                                    </a>
                                        <div style="margin-top:10px;">
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
                                    </div> 
                                        @else
                                    <div class="authenticate-layer">
                                            <a href="{{ route('login') }}" ><li class="authenticate2">Log In</li></a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" ><li class="authenticate">Register</li></a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                        </ul>
                    </nav>
                </header>
            </div>
    </div>
    <!-- ======End Navigation======= -->
    <style>
        .logo-design h1{
            font-size:35px;
            font-family:Arial, Helvetica, sans-serif;
            padding:6px;
        }
        a{
            text-decoration:none;
            color:black;
        }
        .logo-design h1 span{
            color:#0095ff;
        }
    </style>