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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
                                        <img src="{{ url('frontend/images/logo1.png') }}" class="logo_main"
                                            alt="">
                                        <img src="{{ url('frontend/images/logo1.png') }}" class="logo_fixed"
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
                                        <li
                                            class="{{ request()->is('/') ? 'menu-item current-menu-ancestor' : 'menu-item' }}">
                                            <a href="{{ url('/') }}"><span>Home</span></a>
                                        </li>
                                        <!-- /Menu: Home -->

                                        <!-- Menu: About -->
                                        <li
                                            class="{{ request()->is('about*') ? 'menu-item current-menu-ancestor' : 'menu-item' }}">
                                            <a href="{{ url('/about') }}"><span>About</span></a>
                                        </li>
                                        <!-- /Menu: About -->

                                        <!-- Menu: Teams -->
                                        <li
                                            class="{{ request()->is('teams*') ? 'menu-item current-menu-ancestor' : 'menu-item' }}">
                                            <a href="{{ url('/teams') }}"><span>Teams</span></a>
                                        </li>
                                        <!-- /Menu: Teams -->

                                        <!-- Menu: Services -->
                                        <li
                                            class="{{ request()->is('services*') ? 'menu-item current-menu-ancestor' : 'menu-item' }}">
                                            <a href="{{ url('/services') }}"><span>Services</span></a>
                                        </li>
                                        <!-- /Menu: Services -->

                                        <!-- Menu: Announcement -->
                                        <li
                                            class="{{ request()->is('announcement*') ? 'menu-item current-menu-ancestor' : 'menu-item' }}">
                                            <a href="{{ url('/announcement') }}"><span>Announcement</span></a>
                                        </li>
                                        <li
                                        class="{{ request()->is('events') ? 'menu-item current-menu-ancestor' : 'menu-item' }}">
                                        <a href="{{ url('/events') }}"><span>Events</span></a>
                                    </li>
                                        <!-- /Menu: Announcement -->

                                        <!-- Menu: Media Gallery or Registration -->
                                        @if (!Auth::user())
                                            <li
                                                class="{{ request()->is('registration*') ? 'menu-item current-menu-ancestor menu-item-has-children' : 'menu-item menu-item-has-children' }}">
                                                <a href="#"><span>Registration</span></a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item current-menu-item">
                                                        <a href="{{ url('/registration/associationRegistration') }}"><span>Association</span></a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{ url('/registration/athletesRegistration') }}"><span>Athlete</span></a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="{{ url('/registration/sponsorshipRegistration') }}"><span>Sponsership</span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endif
                                        <!-- /Menu: Media Gallery or Registration -->
                                         <!-- Booking button block -->
                                <!-- <div class="menu_main_additional_button top_panel_icon">
                                    <div class="menu_main_additional_button_container">
                                        <a href={{ url('/donate') }}>
                                            <img src="{{ url('frontend/images/booking_heared_img.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div> -->
                                <li class="{{ request()->is('donate*') ? 'menu-item current-menu-ancestor' : 'menu-item' }}">
                                            <a href="{{ url('/donate') }}"><span>Donate</span></a>
                                 </li>
                                <!-- /Booking button block -->
                                        <!-- Menu: Contact Us -->
                                        <li
                                            class="{{ request()->is('contact*') ? 'menu-item current-menu-ancestor' : 'menu-item' }}">
                                            <a href="{{ url('/contact') }}"><span>Contact Us</span></a>
                                        </li>
                                        <!-- /Menu: Contact Us -->
                                    </ul>


                                </nav>
                                <!-- Cart -->
                                <div class="menu_main_cart top_panel_icon">
                                    @if (Auth::user())
                                        <a href="#" class="top_panel_cart_button">
                                            <span class="contact_icon icon-user"></span>
                                            <span class="cart_summa">{{ Auth::user()->first_name }}
                                                {{ Auth::user()->last_name }}</span>
                                            <span class="contact_label contact_cart_label">Your cart:</span>
                                        </a>
                                        <ul class="widget_area sidebar_cart sidebar">
                                            <li>
                                                <div class="widget woocommerce widget_shopping_cart">
                                                    <div class="hide_cart_widget_if_empty">
                                                        <div class="widget_shopping_cart_content">
                                                            <ul class="cart_list product_list_widget ">
                                                                <!-- Cart item -->
                                                                <li class="mini_cart_item">

                                                                    <a href="{{ url('/profile') }}">

                                                                        Profile
                                                                    </a>

                                                                </li>
                                                                <!-- /Cart item -->
                                                                <!-- Cart item -->
                                                                {{-- <li class="mini_cart_item">

                                                                    <a href="{{ url('/media-gallery') }}">

                                                                        Media Gallery
                                                                    </a>

                                                                </li> --}}
                                                                <li class="mini_cart_item">

                                                                    <a href="{{ url('/logout') }}">

                                                                        Logout
                                                                    </a>

                                                                </li>
                                                                <!-- /Cart item -->
                                                            </ul>


                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="{{ url('/login') }}" class="">
                                            <span class="contact_icon icon-user"></span>
                                            <span class="cart_summa">Login</span>
                                            {{-- <span class="contact_label contact_cart_label">Your cart:</span> --}}
                                        </a>
                                    @endif
                                </div>
                                <!-- /Cart -->

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
                            <img src="{{ url('frontend/images/logo1.png') }}" class="logo_main" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->

                    <!-- Cart -->
                    <div class="menu_main_cart top_panel_icon">
                        <a href="{{ url('/login') }}"
                            >
                            <span style=" color:white">Login</span>
                         </a>
                    </div>
                    <div class="menu_main_additional_button top_panel_icon">
                        <div class="menu_main_additional_button_container">
                        <a href="{{ url('/login') }}" >
                           <span class="contact_icon icon-user"></span>
                        </a>
                        </div>
                   </div>
                    <!-- /Cart -->

                    <!-- Booking button block -->
                  <!-- <div class="menu_main_additional_button top_panel_icon">
                        <div class="menu_main_additional_button_container">
                            <a href="{{ url('/donate') }}">
                                <img src="{{ url('frontend/images/booking_heared_img.png') }}" alt="">
                            </a>
                        </div>
                    </div> -->

                </div>
                <div class="side_wrap">
                    <div class="close">Close</div>
                    <div class="panel_top">
                        <nav class="menu_main_nav_area">
                        <!-- Mobile Menu -->
                        <ul id="menu_mobile" class="menu_main_nav">
                            <!-- Menu: Home -->
                            <li
                                class="{{ Route::currentRouteName() == 'home' ? 'menu-item current-menu-item' : 'menu-item' }}">
                                <a href="{{ url('/') }}"><span>Home</span></a>
                            </li>
                            <!-- /Menu: Home -->

                            <!-- Menu: About -->
                            <li
                                class="{{ Route::currentRouteName() == 'about' ? 'menu-item current-menu-item' : 'menu-item' }}">
                                <a href="{{ url('/about') }}"><span>About</span></a>
                            </li>
                            <!-- /Menu: About -->

                            <!-- Menu: Teams -->
                            <li
                                class="{{ Route::currentRouteName() == 'teams' ? 'menu-item current-menu-item' : 'menu-item' }}">
                                <a href="{{ url('/teams') }}"><span>Teams</span></a>
                            </li>
                            <!-- /Menu: Teams -->

                            <!-- Menu: Services -->
                            <li
                                class="{{ Route::currentRouteName() == 'services' ? 'menu-item current-menu-item' : 'menu-item' }}">
                                <a href="{{ url('/services') }}"><span>Services</span></a>
                            </li>
                            <!-- /Menu: Services -->



                            <!-- Menu: Announcement -->
                            <li
                                class="{{ Route::currentRouteName() == 'announcement' ? 'menu-item current-menu-item' : 'menu-item' }}">
                                <a href="{{ url('/announcement') }}"><span>Announcement</span></a>
                            </li>
                            <li
                            class="{{ Route::currentRouteName() == 'events' ? 'menu-item current-menu-item' : 'menu-item' }}">
                            <a href="{{ url('/events') }}"><span>Events</span></a>
                        </li>

                            <!-- Menu: Media Gallery or Registration -->
                            @if (!Auth::user())

                                <li
                                    class="{{ Route::currentRouteName() == 'registration*' ? 'menu-item current-menu-item menu-item-has-children' : 'menu-item menu-item-has-children' }}">
                                    <a href="#"><span>Registration</span></a>
                                    <ul class="sub-menu">
                                        <li class="menu-item current-menu-item">
                                            <a href="{{ url('/registration/associationRegistration') }}"><span>Association</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ url('/registration/athletesRegistration') }}"><span>Athlete</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ url('/registration/sponsorshipRegistration') }}"><span>Sponsership</span></a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <!-- /Menu: Media Gallery or Registration -->
                            <li class="{{ Route::currentRouteName() == 'donate' ? 'menu-item current-menu-item' : 'menu-item' }}">

                             <a href="{{ url('/donate') }}"><span>Donate</span></a>
                            </li>
                            <!-- Menu: Contact Us -->
                            <li
                                class="{{ Route::currentRouteName() == 'contact' ? 'menu-item current-menu-item' : 'menu-item' }}">
                                <a href="{{ url('/contact') }}"><span>Contact Us</span></a>
                            </li>

                            <!-- /Menu: Contact Us -->
                        </ul>
                        <!-- /Mobile Menu -->

                        </nav>
                    </div>
                    <div class="panel_bottom"></div>
                </div>
                <div class="mask"></div>
            </div>
            <!-- /Header mobile -->
