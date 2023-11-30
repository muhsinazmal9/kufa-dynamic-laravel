<!doctype html>
<html class="no-js" lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ config('app.name') }}">
        <meta name="keywords" content="portfolio">
        <meta name="author" content="Muhsin Azmal - DevPenguin">

        <!-- Title -->
        {{-- <title>{{ config('app.name') }}</title> --}}
        <title>{{ $user->name . ', ' . $user->professional_title}}</title>


        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&length=1&bold=true&rounded=true&background=000&color=fff">


		<!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/animate.min.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/magnific-popup.css">
        {{-- <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/fontawesome-all.min.css"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/flaticon.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/slick.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/aos.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/default.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/style.css">
        <link rel="stylesheet" href="{{ asset('frontend_assets') }}/css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->



        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="{{ url('/') }}" class="navbar-brand logo-sticky-none"><img src="{{ asset('frontend_assets') }}/img/logo/logo.png" alt="Logo"></a>
                                    <a href="{{ url('/') }}" class="navbar-brand s-logo-none"><img src="{{ asset('frontend_assets') }}/img/logo/s_logo.png" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="{{ url('/#home') }}">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ url('/#about') }}">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ url('/#service') }}">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ url('/#portfolio') }}">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ url('/#contact') }}">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="{{ asset('frontend_assets') }}/img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p>123/A, Miranda City Likaoli
                            Prikano, Dope</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+0989 7876 9865 9</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        @yield('main_content')

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->


		<!-- JS here -->
        <script src="{{ asset('frontend_assets') }}/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/popper.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/isotope.pkgd.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/one-page-nav-min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/slick.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/ajax-form.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/wow.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/aos.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/jquery.waypoints.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/jquery.counterup.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/jquery.scrollUp.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/imagesloaded.pkgd.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/jquery.magnific-popup.min.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/plugins.js"></script>
        <script src="{{ asset('frontend_assets') }}/js/main.js"></script>
    </body>

</html>
