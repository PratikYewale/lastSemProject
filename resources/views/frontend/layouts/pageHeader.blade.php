<!DOCTYPE html>
<html lang="en-US" class="scheme_original">

<head>
    <title>Ski Snowboard India</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('frontend/js/vendor/woocommerce/css/woocommerce-layout.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ url('frontend/js/vendor/woocommerce/css/woocommerce-smallscreen.css') }}"
        type="text/css" media="only screen and (max-width: 768px)" />
    <link rel="stylesheet" href="{{ url('frontend/js/vendor/woocommerce/css/woocommerce.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ url('frontend/js/vendor/wp-cloudy/css/wpcloudy.min.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ url('frontend/js/vendor/wp-cloudy/css/wpcloudy-anim.min.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,300i,400,400i,500,600,700,700i">
    <link rel="stylesheet" href="{{ url('frontend/css/fontello/css/fontello.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/core.animation.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/shortcodes.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/skin.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/plugin.woocommerce.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/responsive.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ url('frontend/js/vendor/magnific/magnific-popup.min.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ url('frontend/js/core.messages/core.messages.min.css') }}" type="text/css"
        media="all" />

    <link rel="icon" href="http://placehold.it/32x32" sizes="32x32" />
    <link rel="icon" href="http://placehold.it/32x32" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="http://placehold.it/32x32" />

</head>

<body class="page body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide">
    <!-- Body wrap -->
    <div class="body_wrap">
        <!-- Page wrap -->
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <!-- Header -->
            <header class="top_panel_wrap top_panel_style_7">
                <div class="top_panel_wrap_inner top_panel_inner_style_7 top_panel_position_above">
                    <div class="top_panel_middle">
                        <div class="content_wrap">
                            <!-- Contact logo -->
                            <div class="column-1_4 contact_logo">
                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ url('frontend/images/logo.png') }}" class="logo_main"
                                            alt="">
                                        <img src="{{ url('frontend/images/logo.png') }}" class="logo_fixed"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- /Contact logo -->
                            <!-- Main menu -->
                            <div class="column-2_1 menu_main_wrap">
                                <nav class="menu_main_nav_area menu_hover_slide_line">
                                    <ul id="menu_main" class="menu_main_nav">
                                        <!-- Menu: Home -->
                                        <li class="menu-item current-menu-ancestor ">
                                            <a href="{{ url('/') }}"><span>Home</span></a>

                                        </li>
                                        <!-- /Menu: Home -->

                                        <!-- Menu: Classes -->
                                        <li class="menu-item">
                                            <a href="{{ url('/about') }}"><span>About</span></a>
                                        </li>
                                        <!-- /Menu: Classes -->
                                        <!-- Menu: Rent -->
                                        <li class="menu-item">
                                            <a href="{{ url('/teams') }}"><span>Teams</span></a>
                                        </li>
                                        <!-- /Menu: Rent -->
                                        <!-- Menu: Rent -->
                                        <li class="menu-item">
                                            <a href="{{ url('/services') }}"><span>Services</span></a>
                                        </li>
                                        <!-- /Menu: Rent -->
                                        <!-- Menu: Store -->
                                        <li class="menu-item">
                                            <a href="{{ url('/announcement') }}"><span>Announcement</span></a>
                                        </li>
                                        <!-- /Menu: Store -->
                                        <!-- Menu: News -->
                                        <li class="menu-item ">
                                            <a href="{{ url('/registration') }}"><span>Registration</span></a>

                                        </li>
                                        <!-- /Menu: News -->
                                        <!-- Menu: Contact Us -->
                                        {{-- <li class="menu-item">
                                            <a href="{{ url('/membership') }}"><span>Membership</span></a>
                                        </li> --}}
                                        <li class="menu-item">
                                            <a href="{{ url('/contact') }}"><span>Contact Us</span></a>
                                        </li>




                                    </ul>
                                </nav>
                                <!-- Cart -->
                                <div class="menu_main_cart top_panel_icon">
                                    @if (Auth::user())
                                        <a href="{{ url('/') }}">
                                            <span class="contact_icon icon-user"></span>
                                            <span class="cart_summa">{{ Auth::user()->first_name }}
                                                {{ Auth::user()->last_name }}</span>

                                        </a>
                                    @else
                                        <a href="{{ url('/login') }}">
                                            <span class="contact_icon icon-user"></span>
                                            <span class="cart_summa">Login</span>

                                        </a>
                                    @endif

                                </div>
                                <!-- /Cart -->
                                <!-- Booking button block -->
                                <div class="menu_main_additional_button top_panel_icon">
                                    <div class="menu_main_additional_button_container">
                                        <a href="#">
                                            <img src="{{ url('frontend/images/booking_heared_img.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <!-- /Booking button block -->
                            </div>
                            <!-- /Main menu -->
                        </div>
                    </div>
                </div>
            </header>
            <!-- /Header -->

            <!-- Header mobile -->
            <div class="header_mobile">
                <div class="content_wrap">
                    <div class="menu_button icon-menu"></div>
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ url('frontend/images/logo.png') }}" class="logo_main" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->
                    <!-- Booking button block -->
                    <div class="menu_main_additional_button top_panel_icon">
                        <div class="menu_main_additional_button_container">
                            <a href="#">
                                <img src="{{ url('frontend/images/booking_heared_img.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- Cart -->
                    <div class="menu_main_cart top_panel_icon">
                        <a href="{{ url('/login') }}" class="top_panel_cart_button" data-items="2"
                            data-summa="&#036;538.00">
                            <span class="contact_icon icon-user"></span>

                        </a>

                    </div>
                    <!-- /Cart -->
                </div>
                <div class="side_wrap">
                    <div class="close">Close</div>
                    <div class="panel_top">
                        <nav class="menu_main_nav_area">
                            <!-- Mobile Menu -->
                            <ul id="menu_mobile" class="menu_main_nav">
                                <!-- Menu: Home -->
                                <li class="menu-item ">
                                    <a href="{{ url('/') }}"><span>Home</span></a>

                                </li>
                                <!-- /Menu: Home -->

                                <!-- Menu: Classes -->
                                <li class="menu-item">
                                    <a href="{{ url('/about') }}"><span>About</span></a>
                                </li>
                                <!-- /Menu: Classes -->
                                <!-- Menu: Rent -->
                                <li class="menu-item">
                                    <a href="{{ url('/teams') }}"><span>Teams</span></a>
                                </li>
                                <!-- /Menu: Rent -->
                                <li class="menu-item">
                                    <a href="{{ url('/services') }}"><span>Services</span></a>
                                </li>
                                <!-- Menu: Shop -->
                                <li class="menu-item">
                                    <a href="shop-page.html"><span>Store</span></a>
                                </li>
                                <!-- /Menu: Shop -->
                                <!-- Menu: News -->
                                <li class="menu-item ">
                                    <a href="{{ url('/announcement') }}"><span>Announcement</span></a>

                                </li>
                                <li class="menu-item ">
                                    <a href="{{ url('/registration') }}"><span>Registration</span></a>

                                </li>
                                {{-- <li class="menu-item ">
                                        <a href="{{ url('/membership') }}"><span>Membership</span></a>
    
                                    </li> --}}
                                <li class="menu-item current-menu-item">
                                    <a href="{{ url('/contact') }}"><span>Contact Us</span></a>
                                </li>
                            </ul>
                            <!-- /Mobile Menu -->
                        </nav>
                    </div>
                    <div class="panel_bottom"></div>
                </div>
                <div class="mask"></div>
            </div>
            <!-- /Header mobile -->
