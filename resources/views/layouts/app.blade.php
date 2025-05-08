<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> FlexCV Official Website</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo1.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <br><br><br><br><br><br><br>
            <header style="padding:10px 20px 0px ">
                <div>
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- ======Main body======= -->
        <div class="body-content">
            <main>
                {{ $slot }}
            </main>
        </div>
        @include('layouts.footer')
    </div>

    {{-- mobile Menu contents --}}
    <div class="phone-bg" id="mobile-device">
        <div class="phone-cont">
            <div style="height:20px;margin-right:10px;width:20px;top:0;padding-top:6px;font-size: 16px;user-select: select none;cursor: pointer;float:right"
                id="closemenu" onclick="Closemenu()">
                <b style="border-radius:50%;border:2px solid white;padding:4px">&#10006;</b>
            </div><br><br>

            <div style="display:flex;justify-content:center;align-items:center;">
                <nav>
                    <ul>
                        <div class="phone-menu">
                            <a href="">
                                <li onclick="Opendrop1()">Resume</li>
                            </a>
                            <div id="drop1" style="display:none">
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


                            <div class="phone-menu">
                                <a href="">
                                    <li onclick="Opendrop2">Job Search</li>
                                </a>
                                <div id="drop2" style="display:none">
                                    <div class="">
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

                    </ul>
                </nav>
            </div>

        </div>
    </div>
    {{-- end Menu contents --}}
</body>
<!-- ======navigation script====== -->
<script src="{{ asset('assets/js/nav.js') }}"></script>
<!-- ====== end navigation script====== -->

<!-- ======cv script====== -->
<script src="{{ asset('assets/js/cv.js') }}"></script>
<!-- ====== end cv script====== -->

<script>
    function Opendrop1() {
        const menu = document.getElementById('drop1');
            menu.addEventListener("click", function(event) {
                event.preventDefault();
                menu.style.display = 'block';
            });
    }

    function Opendrop2() {
        const menu = document.getElementById('drop2');
        if (menu) {
            menu.addEventListener("click", function(event) {
                event.preventDefault();
                menu.style.display = 'block';
            });
        }
    }

    function Openmenu() {
        const menu = document.getElementById('mobile-menu');
        const device = document.getElementById('mobile-device');
        if (menu) {
            menu.addEventListener("click", function(event) {
                event.preventDefault();
                device.style.display = 'block';
            });
        }
    }

    function Closemenu() {
        const closemenu = document.getElementById('closemenu');
        const device = document.getElementById('mobile-device');
        if (closemenu) {
            closemenu.addEventListener("click", function(event) {
                event.preventDefault();
                device.style.display = 'none';
            });
        }
    }
</script>

</html>
<style>
    .phone-menu a li {
        height: 10%;
        padding: 4px;
        color: white;
    }

    .phone-menu a li:hover {
        border-bottom: 2px solid white;
        opacity: 0.6;
    }

    .phone-bg {
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        display: none;
        position: fixed;
        z-index: 1000;
        background-color: rgba(0, 0, 0, 0.185);
    }

    .mobile-menu {
        user-select: none;
        -webkit-user-drag: none;
        cursor: pointer;
        display: none;
        margin-top: 15px;
    }

    .phone-cont {
        width: 54%;
        top: 0;
        left: 0;
        padding: 10px;
        position: fixed;
        background: #0095ff;
        height: 100%;
        color: white;
        box-shadow: 0px 0px 3px 1px #ddd;
    }



    @media (max-width: 980px) {
        .sidebar-content2 {
            width: 100%;
        }

        .mobile-menu {
            display: block;
        }

        .sidebar-color {
            display: none;
        }
    }
</style>
