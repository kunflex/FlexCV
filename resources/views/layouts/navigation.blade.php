    <!-- ======Navigation======= -->
    <div style="height:auto;width:100%;position:fixed;z-index: 2;">
        <div class="AI-powered"><b>&#10026;</b> AI-Powered CV builder with job matching. Coming soon! <b>&#10026;</b>
        </div>
        <div class="nav-color">
            <header>
                <nav>
                    <ul>


                        <div class="logo-design" style="display: inline-flex;gap:10px;">
                            {{-- menu bar --}}
                            <div class="mobile-menu" id="mobile-menu" onclick="Openmenu()">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    fill="#000000" version="1.1" id="Capa_1" width="20px" height="20px"
                                    viewBox="0 0 344.339 344.339" xml:space="preserve">
                                    <g>
                                        <g>
                                            <g>
                                                <rect y="46.06" width="344.339" height="29.52" />
                                            </g>
                                            <g>
                                                <rect y="156.506" width="344.339" height="29.52" />
                                            </g>
                                            <g>
                                                <rect y="268.748" width="344.339" height="29.531" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            {{-- end menu bar --}}

                            <a href="{{ route('landingpage') }}">
                                <h1>Flex<span>CV</span></h1>
                            </a>
                        </div>

                        <div class="nav-menu-container">
                            <div class="nav-menu">
                                <div class="dropdown">
                                    <a href="">
                                        <li>Resume</li>
                                    </a>
                                    <div style="margin-top:10px;">
                                        <div class="dropdown-content">
                                            <a href="{{ route('template-display') }}">
                                                <li>Resume Template</li>
                                            </a>
                                            <a href="{{ url('select-resume') }}">
                                                <li>Create a resume</li>
                                            </a>
                                            <a href="#">
                                                <li>How to write a resume</li>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown">
                                    <a href="">
                                        <li>Job Search</li>
                                    </a>
                                    <div style="margin-top:10px;">
                                        <div class="dropdown-content">
                                            <a href="{{ url('job-search') }}">
                                                <li>
                                                    Find Jobs available
                                                </li>
                                            </a>
                                            <a href="{{ url('jobs-nearby') }}">
                                                <li>
                                                    Jobs near by
                                                </li>
                                            </a>
                                            <a href="#">
                                                <li>How to get your dream job</li>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ url('about') }}">
                                    <li>About Us</li>
                                </a>
                                <a href="{{ url('contact') }}">
                                    <li>Contact Us</li>
                                </a>
                            </div>
                        </div>

                        @if (Route::has('login'))
                            @auth

                                <div class="dropdown" style="margin-right:30px">
                                    <img src="{{ asset('assets/img/avarta.png') }}" alt=""
                                        style="-webkit-user-drag: none;">
                                    <div style="margin-top:10px;">
                                        <div class="dropdown-content" style="width:190px; margin-left: -130px;">
                                            <div class="bg-color"></div>
                                            <div class="div-pro">
                                                @if (!empty(Auth::user()->profile))
                                                    <img src="{{ Auth::user()->profile }}" alt="avarta">
                                                @else
                                                    <img src="{{ asset('assets/img/avarta.png') }}" alt="avarta">
                                                @endif
                                                <b>{{ Auth::user()->name }}</b> <br>
                                                <span style="font-size:12px;color:gray;margin-right:10px;">
                                                    {{ Auth::user()->email }}
                                                </span>
                                            </div>
                                            <a style="user-select:none"href="{{ route('dashboard') }}">
                                                <li>Dashboard</li>
                                            </a>
                                            <a style="user-select:none"href="{{ route('profile.edit') }}">
                                                <li>Profile</li>
                                            </a>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();"
                                                    style="user-select:none;border-bottom-left-radius: 8px;border-bottom-right-radius: 8px;">
                                                    <li>Logout</li>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="authenticate-layer">
                                    <a href="{{ route('login') }}">
                                        <li class="authenticate2">Log In</li>
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}">
                                            <li class="authenticate">Register</li>
                                        </a>
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
        .bg-color {
            background-color: #0091FF;
            height: 80px;
            width: auto;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .div-pro {
            width: auto;
            height: auto;
            margin: 0px 20px 0px 20px;
            user-select: none;
            cursor: pointer;
            text-align: center;
            background-color: transparent;
            border-bottom: 1px solid #ddd;
            padding: 8px;
            margin-top: -60px;
        }

        .div-pro img {
            height: 70px;
            width: 70px;
            margin: 0 auto;
            border-radius: 50%;
            display: flex;
            background: whitesmoke;
            border: 3px solid #fff;
            margin-bottom: 10px;
            margin-top: 20px;
            -webkit-user-drag: none;
        }

        .logo-design h1 {
            font-size: 35px;
            font-family: Arial, Helvetica, sans-serif;
            padding: 6px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .logo-design h1 span {
            color: #0095ff;
        }

        .dropdown-content {
            border-radius: 8px;
        }

        @media (max-width: 992px) {
            .nav-menu {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-menu-container {
                width: 100%;
                display: none;
            }

            .nav-menu-container.active {
                display: flex;
                flex-direction: column;
            }

            .nav-menu a {
                width: 100%;
            }

            .dropdown-content {
                position: static;
                box-shadow: none;
            }

            .dropdown-content a {
                padding: 10px 20px;
            }
        }
    </style>
