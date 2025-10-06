<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description"
        content="Welcome to SEEES, Uniport chapter! Connect with fellow students in our society, dedicated to shaping the future through shared knowledge and collaboration. Together, let's embark on a journey of learning, growth, and impactful contributions to our community." />
    <meta name="keywords"
        content="seees, uniport, electrical, electronic," />

    <!-- DOCUMENT TITLE -->
    <title>SEEES UNIPORT - @stack('title')</title>
    <!-- FONTS -->
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Montserrat&display=swap'>

    <!-- CSS STYLING LINKS -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- EXTERNAL STYLING AGENTS -->
    @stack('styles')

    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo/favicon.ico')}}" />
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

            <div class="brand-misc hide-dropdown">
                <ul class="nav__items">
                    <li>
                        <a class="link" href="/" data-link="/">Home</a>
                    </li>
                    <li class="dropdownContainer">
                        <a class="link dropdownBtn">About <i class="fas fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu hide-dropdown">
                            <li class="link-item"><a class="link" href="{{ route('about') }}"data-link="/about">About Us</a></li>
                            <li class="link-item"><a class="link" href="{{ route('executives') }}" data-link="/executives">Executive Body</a></li>
                            <li class="link-item"><a class="link" href="{{ route('alumni') }}" data-link="/alumni">Past Presidents</a></li>
                            <li class="link-item"><a class="link" href="{{ route('staff') }}" data-link="/staff">Staff / Alumni</a></li>
                            <li class="link-item"><a class="link" href="{{ route('partnership') }}" data-link="/partnership">Partners</a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="link" href="{{ route('events') }}" data-link="/events">Events & News</a>
                    </li>
                    <li class="dropdownContainer">
                        <a class="link dropdownBtn">E-Library <i class="fas fa-caret-down"></i></a>
                        <ul class="dropdown-menu hide-dropdown">
                            <li class="link-item"><a class="link" href="{{ route('library') }}" data-link="/library">Student E-library</a></li>
                            <li class="link-item"><a class="link" href="{{ route('research') }}" data-link="/research">Research / Projects</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="link" href="{{ route('faqs') }}" data-link="/faqs">FAQs</a>
                    </li>
                    @if (auth()->check())
                        <li class="dropdownContainer">
                            <a class="link dropdownBtn">Account <i class="fas fa-caret-down"></i></a>
                            <ul class="dropdown-menu hide-dropdown">
                                @if (auth()->check()&&$user->role!='user')
                                    <li class="link-item"><a class="link" href="{{ route('dashboard') }}"><i class="fas fa-cog"></i> Admin</a></li>
                                @endif
                                @if (auth()->check())
                                    <form class="link-item" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a role="button" type="submit" class="link">
                                    <button style="all:unset"> <i class="fa-solid fa-door-closed"></i> Logout </button>
                                    </a>
                                </form>
                                @else
                                    <li class="link-item"><a class="link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Register</a></li>
                                    <li class="link-item"><a class="link" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>

            <!-- button to toggle navigation  -->
            <button class="nav__toggle">
                <!-- <i class="toggle--icon fa-solid fa-bars"></i> -->
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </button>
        </div>
    </nav>
    <x-flash-message />
    <x-error-message />
    <!-- START OF MAIN CONTENT  -->

        {{$slot}}

    <!-- END OF MAIN CONTENT  -->

    <!-- FOOTER IMPORT FROM JS  -->
    <footer>
        <div class="container">
            <div class="footer-image-container pt-1">
                <img src="{{asset('images/logo/seees-logo-footer.png')}}" alt="seees logo" />
            </div>
            <div class="footer-layout">
                <ul class="mt footer-layout-item">
                    <h2 class="title">
                        About Us
                        <hr />
                    </h2>
                    <li><a href="{{ route('about') }}">Mission and Vision</a></li>
                    <li><a href="{{ route('executives') }}">Executive Community</a></li>
                    <li><a href="{{ route('staff') }}">Alumni</a></li>
                    <li><a href="{{ route('partnership') }}">Partnership</a></li>
                </ul>


                <ul class="mt footer-layout-item">
                    <h2 class="title">
                        FAQs
                        <hr />
                    </h2>
                    <li><a href="{{ route('faqs') }}">Event Registeration Process</a></li>
                    <li><a href="{{ route('faqs') }}">General Inquries</a></li>
                </ul>
                <ul class="mt footer-layout-item">
                    <h2 class="title">
                        Contact Us
                        <hr />
                    </h2>
                    <li>
                        <a href="mailto:seees4uniport@gmail.com?subject=Message%20to%20SEEES">Email:
                            seees4uniport@gmail.com</a>
                    </li>
                    <li>
                        <a href="tel:+2349079125326">Call us at: +234-907-912-5326</a>
                    </li>
                    <li>
                        <a href="{{ route('developers') }}">Developers / Contributors</a>
                    </li>
                    <li>

                        <div class="social-links-container">
                            <a class="social-link" href="https://www.facebook.com/seeesuniport" target="_blank"><i
                                    class="fab fa-facebook"></i></a>
                            <a class="social-link" href="https://twitter.com/SEEES_UNIPORT" target="_blank"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="social-link" href="https://www.instagram.com/seeesuniport/" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                            <a class="social-link" href="https://www.linkedin.com/company/seees-uniport/" target="_blank"><i
                                    class="fab fa-linkedin"></i></a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="low-footer ">
                <p>&COPY; COPYRIGHT 2023</p>
                <ul>
                    <li>
                        <a href="{{ route('privacypolicy') }}">Terms of Use</a>
                    </li>
                    <li>
                        <a href="{{ route('cookies') }}">Cookies</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- EXTERNAL JAVASCRIPT -->
    <script language="JavaScript" type="text/javascript" src="http://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    
    <!-- JAVASCRIPT FILES -->
    <script language="JavaScript" type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script language="JavaScript" type="text/javascript" src="{{asset('js/cookies.js')}}"></script>
    @stack('scripts')
</body>
</html>