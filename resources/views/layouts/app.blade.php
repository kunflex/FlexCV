<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> FlexCV Official Website</title>
        
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">


    </head>
    <body class="font-sans antialiased">
            <div class="min-h-screen bg-gray-100">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @if (isset($header)) <br><br><br><br><br><br><br>
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
    </body>
     <!-- ======navigation script====== -->
     <script src="{{asset('assets/js/nav.js')}}"></script>
     <!-- ====== end navigation script====== -->

    <!-- ======cv script====== -->
    <script src="{{asset('assets/js/cv.js')}}"></script>
     <!-- ====== end cv script====== -->
</html>
