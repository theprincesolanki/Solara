<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">

    <title> Prince Enterprise – Innovation & Excellence </title>
    
    <!-- CSS Files -->
    <link href="{{ asset('fronted/assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/swiper.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/odometer-theme-default.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/owl.transitions.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('fronted/assets/css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="gear two">
                    <svg viewbox="0 0 100 100" fill="#131e4a">
                        <path d="M97.6,55.7V44.3l-13.6-2.9c-0.8-3.3-2.1-6.4-3.9-9.3l7.6-11.7l-8-8L67.9,20c-2.9-1.7-6-3.1-9.3-3.9L55.7,2.4H44.3l-2.9,13.6      c-3.3,0.8-6.4,2.1-9.3,3.9l-11.7-7.6l-8,8L20,32.1c-1.7,2.9-3.1,6-3.9,9.3L2.4,44.3v11.4l13.6,2.9c0.8,3.3,2.1,6.4,3.9,9.3      l-7.6,11.7l8,8L32.1,80c2.9,1.7,6,3.1,9.3,3.9l2.9,13.6h11.4l2.9-13.6c3.3-0.8,6.4-2.1,9.3-3.9l11.7,7.6l8-8L80,67.9      c1.7-2.9,3.1-6,3.9-9.3L97.6,55.7z M50,65.6c-8.7,0-15.6-7-15.6-15.6s7-15.6,15.6-15.6s15.6,7,15.6,15.6S58.7,65.6,50,65.6z"></path>
                    </svg>
                </div>
                <div class="gear three">
                    <svg viewbox="0 0 100 100" fill="#fd5f17">
                        <path d="M97.6,55.7V44.3l-13.6-2.9c-0.8-3.3-2.1-6.4-3.9-9.3l7.6-11.7l-8-8L67.9,20c-2.9-1.7-6-3.1-9.3-3.9L55.7,2.4H44.3l-2.9,13.6      c-3.3,0.8-6.4,2.1-9.3,3.9l-11.7-7.6l-8,8L20,32.1c-1.7,2.9-3.1,6-3.9,9.3L2.4,44.3v11.4l13.6,2.9c0.8,3.3,2.1,6.4,3.9,9.3      l-7.6,11.7l8,8L32.1,80c2.9,1.7,6,3.1,9.3,3.9l2.9,13.6h11.4l2.9-13.6c3.3-0.8,6.4-2.1,9.3-3.9l11.7,7.6l8-8L80,67.9      c1.7-2.9,3.1-6,3.9-9.3L97.6,55.7z M50,65.6c-8.7,0-15.6-7-15.6-15.6s7-15.6,15.6-15.6s15.6,7,15.6,15.6S58.7,65.6,50,65.6z"></path>
                    </svg>
                </div>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start header -->
        <header id="header" class="site-header header-style-3">
            <nav class="navigation navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ route('home') }}"><img src="fronted/assets/images/logo-2.png" alt></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navigation-holder">
                        <button class="close-navbar"><i class="ti-close"></i></button>
                        <ul class="nav navbar-nav">
                            <li class="menu-item-has-children">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li><a href="about.html">About</a></li>
                            <li class="menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="testimonials.html">Testimonials</a></li>
                                    <li><a href="testimonials-s2.html">Testimonials style 2</a></li>
                                    <li><a href="team.html">Team</a></li>
                                    <li><a href="faq.html">FAQ</a></li>
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-single.html">Shop single</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Services</a>
                                <ul class="sub-menu">
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="services-s2.html">Services style 2</a></li>
                                    <li><a href="service-single.html">Mechanical Engineering</a></li>
                                    <li><a href="oil-gas.html">Oil And Gas</a></li>
                                    <li><a href="power-energy.html">Power And Energy</a></li>
                                    <li><a href="sanitary-plumbing.html">Sanitary & Plumbing</a></li>
                                    <li><a href="electrical-power.html">Electrical Power</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Projects</a>
                                <ul class="sub-menu">
                                    <li><a href="portfolio.html">Projects</a></li>
                                    <li><a href="portfolio-s2.html">Projects style 2</a></li>
                                    <li><a href="project-single.html">Project single</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                    <li><a href="blog-fullwidth.html">Blog full width</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#Level3">Blog single</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-single.html">Blog single</a></li>
                                            <li><a href="blog-single-left-sidebar.html">Blog single left sidebar</a></li>
                                            <li><a href="blog-single-fullwidth.html">Blog single full width</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div><!-- end of nav-collapse -->

                    <div class="search-contact">
                        <div class="header-search-area">
                            <div class="header-search-form">
                                <form class="form">
                                    <div>
                                        <input type="text" class="form-control" placeholder="Search here">
                                    </div>
                                    <button type="submit" class="btn"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <div>
                                <button class="btn open-btn"><i class="ti-search"></i></button>
                            </div>
                        </div>
                        <div class="contact">
                            <div class="call">
                                <i class="fi flaticon-call"></i>
                                <p>Call us anytime</p>
                                <h5>+65487441584</h5>
                            </div>
                        </div>
                    </div>
                </div><!-- end of container -->
            </nav>
        </header>
        <!-- end of header -->