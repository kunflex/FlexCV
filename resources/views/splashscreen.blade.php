<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlexCV Official Website</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo1.png') }}" type="image/png">
</head>

<body>

    <div class="container_left">
        <div class="div-tri">
            <div class="uls">
                <div class="icon-symbol">
                    <b>&#10022;</b>
                    <h1>&#10022;</h1><b>&#10022;</b>
                </div>
                <div class="icon-box">
                    <h1>Transforming concepts into reality.</h1>
                </div>
            </div>
        </div>
        <div class="div-tri" style="margin-top:400px;gap:20px;">
            <div class="icon-symbol">
                <img src="{{ asset('assets/img/portrait-young-woman-with-laptop-hands-outside-school.jpg') }}"
                    alt="">
                <img src="{{ asset('assets/img/portrait-young-woman-with-laptop-hands-outside-school.jpg') }}"
                    alt="">
                <img src="{{ asset('assets/img/portrait-young-woman-with-laptop-hands-outside-school.jpg') }}"
                    alt="">
                <img src="{{ asset('assets/img/portrait-young-woman-with-laptop-hands-outside-school.jpg') }}"
                    alt="">
                <img src="{{ asset('assets/img/portrait-young-woman-with-laptop-hands-outside-school.jpg') }}"
                    alt="">
            </div>
            <div class="icon-box">
                <span>Creating a persuasive resume to acquire dream job</span>
            </div>
        </div>
    </div>



    <div class="container_right">
        <a href="{{ route('landingpage') }}">
            <div class="chl-skip">Skip</div>
        </a><br><br><br><br>

        <div class="logo-design">
            <a>
                <h1><span>F</span></h1>
                <h1><span>l</span></h1>
                <h1><span>e</span></h1>
                <h1><span>x</span></h1>
                <h1><span class="paint">C</span></h1>
                <h1><span class="paint">V</span></h1>
            </a>
        </div>

        <div class="spl-icon">
            <img src="{{ asset('assets/img/authentication.jpg') }}" alt="">
        </div>

        <div class="footer">
            <div>
                <a href="{{ route('login') }}">
                    <div class="chl-btn-left">LogIn</div>
                </a>
            </div>
            <div>
                <a href="{{ route('register') }}">
                    <div class="chl-btn-right">Sign Up</div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
<style>
    * {
        padding: 0px;
        margin: 0px;
    }

    .icon-box h1 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 48px;
    }

    .icon-box span {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
    }

    .icon-symbol {
        display: inline-flex;
    }

    .icon-symbol b {
        font-size: 20px;
        color: rgb(255, 238, 0);
    }

    .icon-symbol h1 {
        font-size: 60px;
    }

    .container_left .div-tri {
        width: auto;
        height: auto;
        position: absolute;
        color: white;
        display: flex;
        align-items: center;
        margin-left: 60px;
        margin-top: 240px;
    }

    .uls {
        display: inline-flex;
        gap: 20px;
    }


    .spl-icon {
        width: auto;
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .spl-icon img {
        width: 400px;
        height: 400px;
        margin-top: -30px;
        border-radius: 50%;

    }

    @keyframes typing {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .logo-design {
        overflow: hidden;
        white-space: nowrap;
        margin-left: 15px;
    }

    .logo-design h1 {
        display: inline-flex;
        white-space: nowrap;
        overflow: hidden;
    }

    .logo-design h1 span {
        display: inline-block;
        animation: fadeIn 0.1s ease forwards;
        /* Adjust duration as needed */
        opacity: 0;
        /* Start with characters invisible */
    }

    .logo-design h1:nth-child(1) span {
        animation-delay: 0.3s;
    }

    .logo-design h1:nth-child(2) span {
        animation-delay: 0.5s;
    }

    .logo-design h1:nth-child(3) span {
        animation-delay: 0.7s;
    }

    .logo-design h1:nth-child(4) span {
        animation-delay: 0.9s;
    }

    .logo-design h1:nth-child(5) span {
        animation-delay: 1.1s;
    }

    .logo-design h1:nth-child(6) span {
        animation-delay: 1.3s;
    }

    .logo-design h1:after {
        content: '';
        /* Create a pseudo-element for the cursor */
        display: inline-block;
        width: 0;
        animation: typing 1s steps(5, end) infinite;
    }


    body {
        width: 100%;
        height: 100%;
        display: inline-flex;
        top: 0px;
        left: 0px;
        position: fixed;
    }

    .footer {
        width: 29%;
        height: auto;
        bottom: 0;
        position: fixed;
        margin-bottom: 30px;
        display: block;
    }

    .chl-btn-left {
        width: auto;
        height: auto;
        padding: 8px;
        margin: 10px;
        user-select: none;
        cursor: pointer;
        border: 1px solid #0095ff;
        border-radius: 8px;
        text-align: center;
        color: #0095ff;
        font-size: 20px;
    }

    .chl-btn-left:hover {
        background-color: whitesmoke;
    }

    .chl-btn-right {
        width: auto;
        height: auto;
        padding: 8px;
        margin: 10px;
        user-select: none;
        cursor: pointer;
        text-align: center;
        background-color: #0095ff;
        color: white;
        border-radius: 8px;
        font-size: 20px;
    }

    .chl-btn-right:hover {
        opacity: 0.9;
        background-color: #0095ff;
    }

    .chl-skip {
        width: auto;
        height: auto;
        padding: 6px;
        float: right;
        margin: 6px;
        user-select: none;
        cursor: pointer;
        margin-right: 10px;
        border: 1px solid #0095ff;
        border-radius: 8px;
        color: #0095ff;
        font-size: 20px;
    }

    a {
        text-decoration: none;
    }

    .chl-skip:hover {
        background-color: whitesmoke;
    }

    .container_left {
        width: 68%;
        background-color: #0095ff;
        height: 100%;
        background-image: url('{{ asset('assets/img/young-student-learning-library.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    .icon-symbol img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 2px solid #fff;
        background-color: #0095ff;
        margin-left: -10px;
    }

    .container_right {
        width: 30%;
        height: 100%;
        background-color: white;
        padding: 20px;
    }

    .logo-design h1 {
        font-size: 45px;
        font-family: Arial, Helvetica, sans-serif;
        padding: 0px;
        margin: 0px;
        user-select: none;
    }

    a {
        text-decoration: none;
        color: black;
    }

    .logo-design h1 .paint {
        color: #0095ff;
    }

    @media (width < 780px){
        .container_left{
            display: none;
        }
        .container_right{
            width:100%;
        }
        .footer{
            width:88%;
        }
    }
</style>
