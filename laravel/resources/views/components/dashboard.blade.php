@props(['currentRoute'])


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- META DATA -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
        <meta name="description"
            content="SEEES, uniport chapter is a student society organisation in the University of Port Harcourt comprising of electrical/electronic students" />
        <meta name="keywords"
            content="seees, uniport, elect, electrical, electronic, student society,society of electrical and electronics students" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- DOCUMENT TITLE -->
        <title>SEEES UNIPORT - HOME</title>

        <!-- CSS STYLING LINKS -->
        <style>

        </style>

        <!-- CSS STYLING LINKS -->
        <link rel="stylesheet" href="{{asset('css/main.css')}}">

        <!-- EXTERNAL STYLING AGENTS -->
        <link rel="stylesheet" href="{{asset('vendors/splide-4.1.3/dist/css/splide.min.css')}}">
        @stack('styles')

        <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- FONTS -->
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>


        <!-- ICONS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

        <!-- FAVICON -->
        <link rel="icon" type="image/png" href="{{asset('images/logo/favicon.ico')}}" />
        <link rel="apple-touch-icon" href="{{asset('images/logo/apple-touch-icon.png')}}">
        <link rel="icon" sizes="192x192" href="{{asset('images/logo/android-chrome-192x192.png')}}">
        <link rel="icon" sizes="512x512" href="{{asset('images/logo/android-chrome-512x512.png')}}">
    </head>
    <body>
        <!-- NAVIGATION IMPORT FROM JS -->
        <nav class="header-nav-section">
            <!-- NAVIGATION CONTENT -->
            <div class="nav-container container">
                <!-- brand name section  -->
                <a class="brand__container" href="/">
                    <img class="brand-image" src="{{asset('images/logo/seees-detailed.png')}}" alt="logo" />
                </a>
                <!-- main link items for navigatioins -->
                <div>
                    <button id="navToggleIcon" style="all:unset; color:black" onclick="toggleNav()">&#9776;</button>
                </div>
            </div>
        </nav>
        <x-flash-message />
        <x-error-message />
        <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleNav()">&times;</a>
        <a class="link" href="/"><i class="fa-solid fa-home px-2"></i>Home</a>
        <a class="link" style="{{ $currentRoute === 'statistics' ? 'background-color: white; color:#2d7bd8' : 'background-color: inherit; color: white' }}" href="{{ route('dashboard') }}"><i class="fa-solid fa-chart-pie px-2"></i>Statistics</a>
        <a class="link" style="{{ $currentRoute === 'content' ? 'background-color: white; color:#2d7bd8' : 'background-color: inherit; color: white' }}" href="{{ route('content') }}"><i class="fa-solid fa-pen-nib px-2"></i>Content</a>
        <a class="link" style="{{ $currentRoute === 'pages' ? 'background-color: white; color:#2d7bd8' : 'background-color: inherit; color: white' }}" href="{{ route('pages') }}"><i class="fa-solid fa-file-lines px-2"></i>Articles</a>
        <form class="link-item" method="POST" action="{{ route('logout') }}">
            @csrf
            <a role="button" type="submit" class="link">
              <button style="all:unset"> <i class="fa-solid fa-door-closed px-2"></i> Logout </button>
            </a>
        </form>
        </div>
        <div id="sidenav__main">
            {{$slot}}
        </div>
        <script>
            function toggleNav() {
                var sideNav = $("#mySidenav");
                var mainContent = $("#sidenav__main");
                var body = $("body");
                var navToggleIcon = $("#navToggleIcon");    
                if (sideNav.width() === 250) {
                    // If side navigation is open, close it
                    sideNav.animate({ width: "0" });
                    mainContent.animate({ marginLeft: "0" });
                    // body.css("background-color", "white");
                    // Switch to bars icon with a smooth fade
                    navToggleIcon.fadeOut(function() {
                        $(this).html('&#9776;').fadeIn();
                    });
                } else {
                    // If side navigation is closed, open it
                    sideNav.animate({ width: "250px" });
                    if ($(window).width() >= 768) {
                        mainContent.animate({ marginLeft: "250px" });
                    }
                    // body.css("background-color", "rgba(0,0,0,0.4)");
                    // Switch to times icon with a smooth fade
                    navToggleIcon.fadeOut(function() {
                        $(this).html('&#x2716;').fadeIn();
                    });
                }
            }
        </script>
        <script language="JavaScript" type="text/javascript" src="http://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
        <script language="JavaScript" type="text/javascript" src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
        <!-- JAVASCRIPT FILES -->
        <script language="JavaScript" type="text/javascript" src="{{asset('js/splide.min.js')}}"></script>
        <script language="JavaScript" type="text/javascript" src="{{asset('js/splide-extension-auto-scroll.min.js')}}"></script>
        <script language="JavaScript" type="text/javascript" src="{{asset('js/swiper-bundle.min.js')}}"></script>
        <script language="JavaScript" type="text/javascript" src="{{asset('js/main.js')}}"></script>
        <script language="JavaScript" type="text/javascript" src="{{asset('js/img_background.js')}}"></script>
        <script language="JavaScript" type="text/javascript" src="{{asset('js/cookies.js')}}"></script>
        @stack('scripts')
    </body>
</html>