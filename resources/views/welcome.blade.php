<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Brainstorm Board</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid" id="welcome-page">
            <!-- Dotted Line -->
            <svg width="100%" height="50px" viewBox="0 0 1300 15" class="fade-el-wait">
                <line x1="25" x2="100%" y1="90%" y2="90%" stroke="#22d1b8" stroke-width="7" stroke-linecap="round" stroke-dasharray="1, 50"/>
            </svg>
            <div class="row mt-md-3 mb-md-5">
                <!-- Logo -->
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-wrapper d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/full-logo.png') }}" alt="logo">
                    </div>
                </div>
                <!-- Main Text + Login/Registration -->
                <div class="col-lg-4 col-md-12 col-sm-12 cl-xs-12 d-flex justify-content-center align-items-center flex-column fade-el-wait">
                    <p class="font-md">
                        The Brainstorm Board is a web application that allows users to log in and create an online board for brainstorming. It simulates the usual sticker board and allows for collaboration among multiple users. The user that creates the board can share its unique URL with their collaborators, so everyone can have access to it and be able to add new ideas.
                    </p>
                    <br>
                    <div class="align-self-start">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-lg button-outline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-lg button-outline mr-4">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-lg button-outline green-border">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
                <!-- Feature Menu -->
                <div class="feature-menu col-lg-4 col-md-12 col-sm-12 col-xs-12 p-0 pl-md-5 mt-5 fade-el-wait">
                    <div class="sticky-menu bg-primary white d-flex justify-content-center align-items-center flex-column ml-md-5 p-5">
                        <i class="far fa-sticky-note pb-2"></i> 
                        <p>Share your ideas!</p>
                    </div>
                    <div class="sticky-menu bg-blue mt-5 white d-flex justify-content-center align-items-center ml-md-5 flex-column p-5">
                        <i class="far fa-star pb-2"></i> 
                        <p>What makes us great?</p>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="row text-center pt-md-5 mt-5">
                <div class="col pt-3 pb-1 bg-gray">
                    <p>Brainstorm Boards 2018 &copy; All right reserved.</p>
                </div>
            </footer>
        </div>
    </body>
</html>
