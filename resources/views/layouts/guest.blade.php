<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    </head>
    <body>
        <div class="shape-container">
            <div class="logo">
                <a href="{{route('landingpage')}}">
                    <h1>Flex<span>CV</span></h1>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
               {{ $slot }}
            </div>
        </div>
    </body>
</html>
<style>
    .logo h1{
            font-size:35px;
            font-family:Arial, Helvetica, sans-serif;
            padding:6px;
            margin-left:-28px;
        }
        a{
            text-decoration:none;
            color:black;
        }
        .logo h1 span{
            color:#0095ff;
        }
    *{
        padding:0px;
        margin:0px;
    }
    body{
        width:100%;
        height:auto;
        background-color:white;
        display:flex;
        align-items:center;
        justify-content:center;
        padding-top:30px;
        padding-bottom:30px;
    }
    input{
        outline-color:#0095FF;
        width:90%;
        height:auto;
        border-radius:8px;
        border:1px solid #ddd;
        font-size:16px;
        padding:16px;
    }
    select{
        outline-color:#0095FF;
        width:100%;
        height:auto;
        border-radius:8px;
        border:1px solid #ddd;
        font-size:16px;
        padding:16px;
    }
    button{
        width:100%;
        border-style:none;
        border-radius:8px;
        color:#fff;
        font-size:18px;
        padding:16px;
        background-color:#0095FF;
    }
    .logo{
        width:80px;
        height:80px;
        margin:0 auto;
        margin-bottom:60px;
    }
    .shape-container{
        width:320px;
        height:auto;
    }
    .tab{
        width:100%;
        height:auto;
        margin-bottom:20px;
    }
    .tab1{
        width:100%;
        height:50px;
        border:1px solid #ddd;
        border-radius:8px;
        margin-bottom:20px;
        display:inline-flex;
        user-select:none;
        cursor:pointer;
    }
    .tab1:hover{
        background-color:whitesmoke;
    }
    .text{
        font-size:20px;
        padding-top:14px;
    }
    svg{
        padding:14px;
    }
    a{
        text-decoration:none;
        color:black;
    }
    .divider{
        padding-top:10px;
        display:flex;
        gap:20px;
        align-items:center;
        justify-content:center;
    }
    .line{
        width:100%;
        height:1px;
        background-color:#ccc;
    }
    .mt-2{
        list-style-type:none;
        color:red;
    }
    h1{
        text-align:center;
        font-family:arial;
        margin-bottom:20px;
    }
    .footer{
        text-align:center;
        margin-top:30px;
    }
</Style>