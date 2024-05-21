<!DOCTYPE html>
<html lang="en-US" class="scheme_original">

<head>
    <title>Ski Snowboard India</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('frontend/js/vendor/essential-grid/css/settings.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ url('frontend/css/tpl-essential-grids.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ url('frontend/js/vendor/revslider/css/settings.css') }}" type="text/css"
        media="all" />

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

<body class="home page body_filled article_style_stretch scheme_original top_panel_show top_panel_over sidebar_hide">
    <!-- Body wrap -->
    <div class="body_wrap">
        <!-- Page wrap -->
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <!-- Header -->
            <header class="top_panel_wrap top_panel_style_7 top_panel_position_over">
                <div class="top_panel_wrap_inner top_panel_inner_style_6 top_panel_position_over">
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
                                        <!-- /Menu: Announcement -->

                                        <!-- Menu: Media Gallery or Registration -->
                                        @if (!Auth::user())
                                     
                                        <li
                                        class="{{ request()->is('registration*') ? 'menu-item current-menu-ancestor menu-item-has-children' : 'menu-item menu-item-has-children' }}">
                                        <a href="{{ url('/registration') }}"><span>Registration</span></a>
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
                                    @if(Auth::user())
                                    <a href="#" class="top_panel_cart_button" >
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
                                                            <li class="mini_cart_item">
                                                              
                                                                <a href="{{ url('/media-gallery') }}">
                                                                   
                                                                  Media  Gallery
                                                                </a>
                                                           
                                                            </li>
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
                                        </li>+
                                    </ul>
                                    @else
                                    <a href="{{ url('/login') }}" >
                                        <span class="contact_icon icon-user"></span>
                                        <span class="cart_summa">Login</span>
                                        {{-- <span class="contact_label contact_cart_label">Your cart:</span> --}}
                                    </a>
                                  
                                    @endif
                                </div>
                                <!-- /Cart -->
                                <!-- Booking button block -->
                                <div class="menu_main_additional_button top_panel_icon">
                                    <div class="menu_main_additional_button_container">
                                        <a href={{ url('/donate') }}>
                                            <img src="{{ url('frontend/images/booking_heared_img.png') }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                                <!-- /Booking button block -->

                            </div>

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
                        <a href="{{ url('/donate') }}">
                            <img src="{{ url('frontend/images/booking_heared_img.png') }}" alt="">
                        </a>
                    </div>
                </div>

            </div>
            <div class="side_wrap">
                <div class="close">Close</div>
                <div class="panel_top">
                    <nav class="menu_main_nav_area">
                        <!-- Mobile Menu -->
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

                            <!-- Menu: Media Gallery or Registration -->
                            @if (!Auth::user())
                        
                                <li
                                    class="{{ Route::currentRouteName() == 'registration*' ? 'menu-item current-menu-item menu-item-has-children' : 'menu-item menu-item-has-children' }}">
                                    <a href="{{ url('/registration') }}"><span>Registration</span></a>
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

                            <!-- Menu: Contact Us -->
                            <li
                                class="{{ Route::currentRouteName() == 'contact' ? 'menu-item current-menu-item' : 'menu-item' }}">
                                <a href="{{ url('/contact') }}"><span>Contact Us</span></a>
                            </li>
                            <!-- /Menu: Contact Us -->
                        </ul>
                        <!-- /Mobile Menu -->

                        <!-- /Mobile Menu -->

                    </nav>
                </div>
                <div class="panel_bottom"></div>
            </div>
            <div class="mask"></div>
        </div>
        <!-- /Header mobile -->
        <!-- Page content wrap -->

        <div class="page_content_wrap page_paddings_no">
            <!-- Content -->
            <div class="content">
                <article class="post_item post_item_single page">
                    <section class="post_content">
                        <div id="rev_slider_3_1_wrapper" class="rev_slider_wrapper fullscreen-container"
                            data-source="gallery" style="">
                            <!-- START REVOLUTION SLIDER 5.3.1.5 fullscreen mode -->
                            <div id="rev_slider_3_1" class="rev_slider fullscreenbanner" data-version="5.3.1.5">
                                <ul>
                                    <!-- SLIDE  -->
                                    <li data-index="rs-9" data-transition="fade" data-slotamount="default"
                                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                        data-easeout="default" data-masterspeed="300" data-rotate="0"
                                        data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                                        data-param8="" data-param9="" data-param10="" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{ url('frontend/images/slider_3_slide_1.jpg') }}" alt=""
                                            title="slider_3_slide_1" width="1920" height="980"
                                            data-bgposition="center center" data-bgfit="cover"
                                            data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg"
                                            data-no-retina>
                                        <!-- LAYERS -->
                                        <!-- LAYER NR. 1 -->
                                        <div class="tp-caption tp-resizeme" id="slide-9-layer-3" data-x="right"
                                            data-hoffset="-9" data-y="28"
                                            data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":400,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_1_boarder.png') }}"
                                                alt="" data-ww="934px" data-hh="837px" width="934"
                                                height="837" data-no-retina>
                                        </div>
                                        <!-- LAYER NR. 2 -->
                                        <div class="tp-caption tp-resizeme" id="slide-9-layer-6" data-x="right"
                                            data-hoffset="875" data-y="179"
                                            data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":650,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_1_2.png') }}"
                                                alt="" data-ww="915px" data-hh="805px" width="915"
                                                height="805" data-no-retina>
                                        </div>
                                        <!-- LAYER NR. 3 -->
                                        <div class="tp-caption tp-resizeme" id="slide-9-layer-7" data-x="right"
                                            data-hoffset="700" data-y="324"
                                            data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":830,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_1_3.png') }}"
                                                alt="" data-ww="1178px" data-hh="858px" width="1178"
                                                height="858" data-no-retina>
                                        </div>
                                        <!-- LAYER NR. 4 -->
                                        <div class="tp-caption slider_3_text_80 tp-resizeme rs-parallaxlevel-1"
                                            id="slide-9-layer-8" data-x="center" data-hoffset="-182" data-y="398"
                                            data-width="['auto']" data-height="['auto']" data-type="text"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":1000,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]">You’re
                                            here </div>
                                        <!-- LAYER NR. 5 -->
                                        <div class="tp-caption slider_3_slide_text_100 tp-resizeme rs-parallaxlevel-1"
                                            id="slide-9-layer-9" data-x="center" data-hoffset="-292" data-y="485"
                                            data-width="['auto']" data-height="['auto']" data-type="text"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":1160,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]">for the
                                            point, </div>
                                        <!-- LAYER NR. 6 -->
                                        <div class="tp-caption slider_3_text_70 tp-resizeme rs-parallaxlevel-1"
                                            id="slide-9-layer-10" data-x="center" data-hoffset="-302" data-y="602"
                                            data-width="['auto']" data-height="['auto']" data-type="text"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":1370,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]">not the
                                            points... </div>
                                        <!-- LAYER NR. 7 -->
                                        <div class="tp-caption tp-resizeme" id="slide-9-layer-5" data-x="right"
                                            data-hoffset="23" data-y="220"
                                            data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":500,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_1_1.png') }}"
                                                alt="" data-ww="1892px" data-hh="841px" width="1892"
                                                height="841" data-no-retina>
                                        </div>
                                    </li>
                                    <!-- SLIDE  -->
                                    <li data-index="rs-10" data-transition="fade" data-slotamount="default"
                                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                        data-easeout="default" data-masterspeed="300" data-rotate="0"
                                        data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                                        data-param8="" data-param9="" data-param10="" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{ url('frontend/images/slider_3_slide_2.jpg') }}" alt=""
                                            title="slider_3_slide_2" width="1920" height="1080"
                                            data-bgposition="center center" data-bgfit="cover"
                                            data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg"
                                            data-no-retina>
                                        <!-- LAYERS -->
                                        <!-- LAYER NR. 8 -->
                                        <div class="tp-caption tp-resizeme" id="slide-10-layer-1" data-x="right"
                                            data-hoffset="" data-y="66" data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":90,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_2_boarder.png') }}"
                                                alt="" data-ww="1847px" data-hh="951px" width="1847"
                                                height="951" data-no-retina>
                                        </div>
                                        <!-- LAYER NR. 9 -->
                                        <div class="tp-caption tp-resizeme" id="slide-10-layer-7" data-x="right"
                                            data-hoffset="944" data-y="109"
                                            data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":300,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_2_2.png') }}"
                                                alt="" data-ww="915px" data-hh="805px" width="915"
                                                height="805" data-no-retina>
                                        </div>
                                        <!-- LAYER NR. 10 -->
                                        <div class="tp-caption tp-resizeme" id="slide-10-layer-8" data-x="right"
                                            data-hoffset="750" data-y="258"
                                            data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":400,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_2_3.png') }}"
                                                alt="" data-ww="1178px" data-hh="858px" width="1178"
                                                height="858" data-no-retina>
                                        </div>
                                        <!-- LAYER NR. 11 -->
                                        <div class="tp-caption slider_3_text_80 tp-resizeme rs-parallaxlevel-1"
                                            id="slide-10-layer-2" data-x="center" data-hoffset="-355" data-y="350"
                                            data-width="['auto']" data-height="['auto']" data-type="text"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":550,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]">I've
                                            reached </div>
                                        <!-- LAYER NR. 12 -->
                                        <div class="tp-caption slider_3_slide_text_100 tp-resizeme rs-parallaxlevel-1"
                                            id="slide-10-layer-3" data-x="center" data-hoffset="-341" data-y="439"
                                            data-width="['auto']" data-height="['auto']" data-type="text"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":690,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]">my goal
                                        </div>
                                        <!-- LAYER NR. 13 -->
                                        <div class="tp-caption slider_3_text_70 tp-resizeme rs-parallaxlevel-1"
                                            id="slide-10-layer-4" data-x="center" data-hoffset="-338" data-y="570"
                                            data-width="['auto']" data-height="['auto']" data-type="text"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":810,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]">with
                                            snowboarding </div>
                                        <!-- LAYER NR. 14 -->
                                        <div class="tp-caption   tp-resizeme" id="slide-10-layer-6" data-x="right"
                                            data-hoffset="33" data-y="177"
                                            data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":200,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_2_1.png') }}"
                                                alt="" data-ww="1891px" data-hh="803px" width="1891"
                                                height="803" data-no-retina>
                                        </div>
                                    </li>
                                    <!-- SLIDE  -->
                                    <li data-index="rs-8" data-transition="fade" data-slotamount="default"
                                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                        data-easeout="default" data-masterspeed="300" data-rotate="0"
                                        data-saveperformance="off" data-title="Slide" data-param1="" data-param2=""
                                        data-param3="" data-param4="" data-param5="" data-param6="" data-param7=""
                                        data-param8="" data-param9="" data-param10="" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{ url('frontend/images/slider_3_slide_3.jpg') }}" alt=""
                                            title="slider_3_slide_3" width="1920" height="980"
                                            data-bgposition="center center" data-bgfit="cover"
                                            data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg"
                                            data-no-retina>
                                        <!-- LAYERS -->
                                        <!-- LAYER NR. 15 -->
                                        <div class="tp-caption tp-resizeme" id="slide-8-layer-1" data-x="right"
                                            data-hoffset="3" data-y="162"
                                            data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":200,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_3_boarder.png') }}"
                                                alt="" data-ww="1085px" data-hh="832px" width="1085"
                                                height="832" data-no-retina>
                                        </div>
                                        <!-- LAYER NR. 16 -->
                                        <div class="tp-caption tp-resizeme" id="slide-8-layer-6" data-x="68"
                                            data-y="79" data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":500,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_3_2.png') }}"
                                                alt="" data-ww="915px" data-hh="805px" width="915"
                                                height="805" data-no-retina>
                                        </div>
                                        <!-- LAYER NR. 17 -->
                                        <div class="tp-caption tp-resizeme" id="slide-8-layer-7" data-x="-2"
                                            data-y="223" data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":600,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_3_3.png') }}"
                                                alt="" data-ww="1178px" data-hh="858px" width="1178"
                                                height="858" data-no-retina>
                                        </div>
                                        <!-- LAYER NR. 18 -->
                                        <div class="tp-caption slider_3_text_80 tp-resizeme rs-parallaxlevel-1"
                                            id="slide-8-layer-2" data-x="310" data-y="264" data-width="['auto']"
                                            data-height="['auto']" data-type="text" data-responsive_offset="on"
                                            data-frames='[{"delay":890,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]">You Have
                                            To </div>
                                        <!-- LAYER NR. 19 -->
                                        <div class="tp-caption slider_3_slide_text_100 tp-resizeme rs-parallaxlevel-1"
                                            id="slide-8-layer-3" data-x="361" data-y="359" data-width="['auto']"
                                            data-height="['auto']" data-type="text" data-responsive_offset="on"
                                            data-frames='[{"delay":1160,"speed":300,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:-50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]">get back
                                        </div>
                                        <!-- LAYER NR. 20 -->
                                        <div class="tp-caption slider_3_text_70 tp-resizeme rs-parallaxlevel-1"
                                            id="slide-8-layer-4" data-x="264" data-y="481" data-width="['auto']"
                                            data-height="['auto']" data-type="text" data-responsive_offset="on"
                                            data-frames='[{"delay":1440,"speed":300,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"y:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]">into
                                            surfing again </div>
                                        <!-- LAYER NR. 21 -->
                                        <div class="tp-caption tp-resizeme" id="slide-8-layer-5" data-x="6"
                                            data-y="146" data-width="['none','none','none','none']"
                                            data-height="['none','none','none','none']" data-type="image"
                                            data-responsive_offset="on"
                                            data-frames='[{"delay":400,"speed":300,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"Power3.easeInOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]">
                                            <img src="{{ url('frontend/images/slider_3_slide_3_1.png') }}"
                                                alt="" data-ww="1891px" data-hh="803px" width="1891"
                                                height="803" data-no-retina>
                                        </div>
                                    </li>
                                </ul>
                                <div class="tp-bannertimer tp-bottom"></div>
                            </div>
                        </div>
                        <!-- END REVOLUTION SLIDER -->
                        {{-- @include('frontend.commonComponants.aboutSection') --}}
                        @include('frontend.commonComponants.three_sports')
                        @include('frontend.commonComponants.chairmanWords')


                        <!-- Online Booking -->
                        {{-- <div class="hp_booking_section">
                                <div class="content_wrap">
                                    <div class="sc_columns columns_wrap">
                                        <div class="column-1_2">
                                            <div class="custom_title_1 text_align_left">Ski and Snowboard India</div>
                                            <div class="sc_section">
                                                <div class="sc_section_inner">
                                                    <h2
                                                        class="sc_section_title sc_item_title sc_item_title_with_descr">
                                                        About SSI</h2>
                                                    <div class="sc_section_descr sc_item_descr">Ski and Snowboard India
                                                        (SSI) is the National Sports Association governing sport
                                                        disciplines under the International Ski Federation (FIS) in the
                                                        territory of India. SSI is also a recognised member of the
                                                        Indian Olympic Association </div>
                                           
                                                    <div class="sc_section_content_wrap">
                                                        <a href="#"
                                                            class="sc_button sc_button_square sc_button_style_filled sc_button_size_small margin_top_tiny">Contact
                                                            Us</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        <!-- /Online Booking -->
                        <!-- The Essential Grid -->

                        <div class="clear"></div>
                        <!-- /The Essential Grid -->

                        <!-- Crew -->
                        <div class="hp_crew_section">
                            <div class="content_wrap">
                                <div class="custom_title_1 text_align_center">Team</div>
                                <div class="sc_section title_center">
                                    <div class="sc_section_inner">
                                        <h2 class="sc_section_title sc_item_title sc_item_title_without_descr">meet
                                            our crew</h2>
                                        <div class="sc_section_content_wrap">
                                            <div class="sc_team_wrap margin_top_small">
                                                <div class="sc_team sc_team_style_team-3 title_center width_100_per">
                                                    <div class="sc_columns columns_wrap row">
                                                        <!-- Team item -->
                                                        <div class="col-lg-3 column_padding_bottom">
                                                            <div class="sc_team_item sc_team_item_1 odd first">
                                                                <div class="sc_team_item_avatar">
                                                                    <img alt="Mr Shiva Keshavan"
                                                                        src="{{ url('frontend/images/team-4-370x370.jpg') }}">
                                                                    <div class="sc_team_item_hover">
                                                                        <div class="sc_team_item_socials">
                                                                            <div
                                                                                class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_facebook">
                                                                                        <span
                                                                                            class="icon-facebook"></span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_twitter">
                                                                                        <span
                                                                                            class="icon-twitter"></span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_instagram-3">
                                                                                        <span
                                                                                            class="icon-instagram-3"></span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="sc_team_item_info">
                                                                    <h5 class="sc_team_item_title">
                                                                        <a href="team-single.html">Mr Shiva
                                                                            Keshavan</a>
                                                                    </h5>
                                                                    <div class="sc_team_item_position">Chairman
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /Team item --><!-- Team item -->
                                                        <div class="col-lg-3 column_padding_bottom">
                                                            <div class="sc_team_item sc_team_item_2 even">
                                                                <div class="sc_team_item_avatar">
                                                                    <img alt="Bhavani TN "
                                                                        src="{{ url('frontend/images/team-3-370x370.jpg') }}">
                                                                    <div class="sc_team_item_hover">
                                                                        <div class="sc_team_item_socials">
                                                                            <div
                                                                                class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_facebook">
                                                                                        <span
                                                                                            class="icon-facebook"></span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_twitter">
                                                                                        <span
                                                                                            class="icon-twitter"></span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_instagram-3">
                                                                                        <span
                                                                                            class="icon-instagram-3"></span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="sc_team_item_info">
                                                                    <h5 class="sc_team_item_title">
                                                                        <a href="team-single.html">Bhavani TN </a>
                                                                    </h5>
                                                                    <div class="sc_team_item_position">Member
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /Team item --><!-- Team item -->
                                                        <div class="col-lg-3 column_padding_bottom">
                                                            <div class="sc_team_item sc_team_item_3 odd">
                                                                <div class="sc_team_item_avatar">
                                                                    <img alt="Mr Arif Mohd Khan "
                                                                        src="{{ url('frontend/images/team-2-370x370.jpg') }}">
                                                                    <div class="sc_team_item_hover">
                                                                        <div class="sc_team_item_socials">
                                                                            <div
                                                                                class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_facebook">
                                                                                        <span
                                                                                            class="icon-facebook"></span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_twitter">
                                                                                        <span
                                                                                            class="icon-twitter"></span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_instagram-3">
                                                                                        <span
                                                                                            class="icon-instagram-3"></span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="sc_team_item_info">
                                                                    <h5 class="sc_team_item_title">
                                                                        <a href="team-single.html">Mr Arif Mohd
                                                                            Khan </a>
                                                                    </h5>
                                                                    <div class="sc_team_item_position">Member
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /Team item --><!-- Team item -->
                                                        <div class="col-lg-3 column_padding_bottom">
                                                            <div class="sc_team_item sc_team_item_4 even">
                                                                <div class="sc_team_item_avatar">
                                                                    <img alt="Ms Jelena Dojcinovic "
                                                                        src="{{ url('frontend/images/team-1-370x370.jpg') }}">
                                                                    <div class="sc_team_item_hover">
                                                                        <div class="sc_team_item_socials">
                                                                            <div
                                                                                class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_facebook">
                                                                                        <span
                                                                                            class="icon-facebook"></span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_twitter">
                                                                                        <span
                                                                                            class="icon-twitter"></span>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="sc_socials_item">
                                                                                    <a href="#" target="_blank"
                                                                                        class="social_icons social_instagram-3">
                                                                                        <span
                                                                                            class="icon-instagram-3"></span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="sc_team_item_info">
                                                                    <h5 class="sc_team_item_title">
                                                                        <a href="team-single.html">Ms Jelena
                                                                            Dojcinovic </a>
                                                                    </h5>
                                                                    <div class="sc_team_item_position">Independent
                                                                        Observer
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Team item -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Crew -->
                        <article class="myportfolio-container custom-1" id="esg-grid-1-1-wrap">
                            <div id="esg-grid-1-1" class="esg-grid">
                                <ul>
                                    <!-- Grid item -->
                                    <li class="eg-custom-skin-1-wrapper" data-cobblesw="1" data-cobblesh="1">
                                        <div class="esg-media-cover-wrapper">
                                            <div class="esg-entry-media">
                                                <img src="{{ url('frontend/images/image-9-1024x683.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                    data-delay="0"></div>
                                                <div class="esg-center eg-custom-skin-1-element-10-a">
                                                    <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                        target="_self">Glacier National Park Backpacking Packing
                                                        List</a>
                                                </div>
                                                <div class="esg-center eg-custom-skin-1-element-12-a">
                                                    <a class="eg-custom-skin-1-element-12" href="#"
                                                        title="View all posts in Community and People">Community
                                                        and People</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- /Grid item -->
                                    <!-- Grid item -->
                                    <li class="eg-custom-skin-1-wrapper" data-cobblesw="2" data-cobblesh="1">
                                        <div class="esg-media-cover-wrapper">
                                            <div class="esg-entry-media">
                                                <img src="{{ url('frontend/images/image-10-1024x683.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                    data-delay="0"></div>
                                                <div class="esg-center eg-custom-skin-1-element-10-a">
                                                    <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                        target="_self">Downhill Skiing or Snowboarding: Training
                                                        Tips and Exercises</a>
                                                </div>
                                                <div class="esg-center eg-custom-skin-1-element-12-a">
                                                    <a class="eg-custom-skin-1-element-12" href="#"
                                                        title="View all posts in Competitions"
                                                        rel="category tag">Competitions</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- /Grid item -->
                                    <!-- Grid item -->
                                    <li class="eg-custom-skin-1-wrapper" data-cobblesw="1" data-cobblesh="1">
                                        <div class="esg-media-cover-wrapper">
                                            <div class="esg-entry-media">
                                                <img src="{{ url('frontend/images/image-8-1024x649.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                    data-delay="0"></div>
                                                <div class="esg-center eg-post-1 eg-custom-skin-1-element-10-a">
                                                    <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                        target="_self">Glide Waxing Your Skis or Snowboard</a>
                                                </div>
                                                <div class="esg-center eg-post-1 eg-custom-skin-1-element-12-a">
                                                    <a class="eg-custom-skin-1-element-12" href="#"
                                                        title="View all posts in Community and People">Community
                                                        and People</a>
                                                    <a class="eg-custom-skin-1-element-12" href="#"
                                                        title="View all posts in Mounthood">Mounthood</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- /Grid item -->
                                    <!-- Grid item -->
                                    <li class="eg-custom-skin-1-wrapper" data-cobblesw="1" data-cobblesh="1">
                                        <div class="esg-media-cover-wrapper">
                                            <div class="esg-entry-media">
                                                <img src="{{ url('frontend/images/image-7-1024x670.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                    data-delay="0"></div>
                                                <div class="esg-center eg-custom-skin-1-element-10-a">
                                                    <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                        target="_self">Avalanche Safety Gear: How to Choose</a>
                                                </div>
                                                <div class="esg-center eg-custom-skin-1-element-12-a">
                                                    <a class="eg-custom-skin-1-element-12" href="#"
                                                        title="View all posts in Competitions">Competitions</a>
                                                    <a class="eg-custom-skin-1-element-12" href="#"
                                                        title="View all posts in Places">Places</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- /Grid item -->
                                    <!-- Grid item -->
                                    <li class="eg-custom-skin-1-wrapper" data-cobblesw="1" data-cobblesh="1">
                                        <div class="esg-media-cover-wrapper">
                                            <div class="esg-entry-media">
                                                <img src="{{ url('frontend/images/image-6-1024x683.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                    data-delay="0"></div>
                                                <div class="esg-center eg-custom-skin-1-element-10-a">
                                                    <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                        target="_self">Snowboarding: Making Waves on the Slopes</a>
                                                </div>
                                                <div class="esg-center eg-custom-skin-1-element-12-a">
                                                    <a class="eg-custom-skin-1-element-12" href="#"
                                                        title="View all posts in Places">Places</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- /Grid item -->
                                    <!-- Grid item -->
                                    <li class="eg-custom-skin-1-wrapper" data-cobblesw="2" data-cobblesh="1">
                                        <div class="esg-media-cover-wrapper">
                                            <div class="esg-entry-media">
                                                <img src="{{ url('frontend/images/image-5-883x1024.jpg') }}"
                                                    alt="">
                                            </div>
                                            <div class="esg-entry-cover esg-fade" data-delay="0">
                                                <div class="esg-overlay esg-fade eg-custom-skin-1-container"
                                                    data-delay="0"></div>
                                                <div class="esg-center eg-custom-skin-1-element-10-a">
                                                    <a class="eg-custom-skin-1-element-10" href="post-single.html"
                                                        target="_self">A Perfect Day for Snowboarding in Venice</a>
                                                </div>
                                                <div class="esg-center eg-custom-skin-1-element-12-a">
                                                    <a class="eg-custom-skin-1-element-12" href="#"
                                                        title="View all posts in Mounthood">Mounthood</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- /Grid item -->

                                </ul>
                            </div>
                        </article>
                        <!-- School Info -->
                        {{-- <div class="hp_school_info">
                                <div class="content_wrap">
                                    <div class="sc_columns columns_wrap">
                                        <div class="column-9_12">
                                            <div class="custom_title_1 text_align_left">Ski and Snowboard India (SSI)
                                            </div>
                                            <div class="sc_section">
                                                <div class="sc_section_inner">
                                                    <h2
                                                        class="sc_section_title sc_item_title sc_item_title_without_descr">
                                                        Development</h2>
                                                </div>
                                            </div>
                                            <div class="sc_section margin_top_small-">
                                                <div class="sc_section_inner">
                                                    <div class="sc_section_descr sc_item_descr">Skiing and
                                                        snowboarding in India have increasingly become popular
                                                        activities for both domestic and international tourists seeking
                                                        winter sports experiences. The breath-taking landscapes of the
                                                        Indian Himalayas coupled with the thrill of skiing and
                                                        snowboarding have attracted adventurers and outdoor enthusiasts
                                                        from around the world.
                                                        <br /><br />
                                                        While skiing and snowboarding in India continue to grow in
                                                        popularity, there are challenges such as limited infrastructure,
                                                        funding constraints, and access to training facilities,
                                                        especially for athletes from regions with less snowfall.
                                                        However, the passion and dedication of Indian skiers and
                                                        snowboarders, coupled with increasing support from government
                                                        bodies and private organizations, present opportunities for the
                                                        further development and promotion of winter sports in India.
                                                        <br /><br />
                                                        Overall, the history of skiing and snowboarding in India is
                                                        characterized by a journey of exploration, passion, and
                                                        perseverance, with the potential to become a thriving part of
                                                        the country's sports and tourism landscape in the years to come.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sc_skills sc_skills_counter margin_top_6em"
                                                data-type="counter" data-caption="Skills">
                                                <div class="columns_wrap sc_skills_columns sc_skills_columns_3 row">
                                                    <div class="sc_skills_column col-lg-4">
                                                        <div class="sc_skills_item sc_skills_style_2 odd first">
                                                            <div class="sc_skills_total" data-start="0"
                                                                data-stop="2300" data-step="23" data-max="2300"
                                                                data-speed="13" data-duration="1300" data-ed="">0
                                                            </div>
                                                            <div class="sc_skills_count"></div>
                                                            <div class="sc_skills_info">
                                                                <div class="sc_skills_label">Happy Clients</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sc_skills_column col-lg-4">
                                                        <div class="sc_skills_item sc_skills_style_2 even">
                                                            <div class="sc_skills_total" data-start="0"
                                                                data-stop="26" data-step="23" data-max="2300"
                                                                data-speed="40" data-duration="45" data-ed="">
                                                                0</div>
                                                            <div class="sc_skills_count"></div>
                                                            <div class="sc_skills_info">
                                                                <div class="sc_skills_label">Professional Awards</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="sc_skills_column col-lg-4">
                                                        <div class="sc_skills_item sc_skills_style_2 odd">
                                                            <div class="sc_skills_total" data-start="0"
                                                                data-stop="319" data-step="23" data-max="2300"
                                                                data-speed="13" data-duration="180"
                                                                data-ed="">0</div>
                                                            <div class="sc_skills_count"></div>
                                                            <div class="sc_skills_info">
                                                                <div class="sc_skills_label">Reached Tops</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        <!-- /School Info -->
                        <!-- Equipment -->
                        @include('frontend.commonComponants.pricingPlan')
                        <!-- /Equipment -->
                        <!-- From the Blog -->
                        <div class="hp_blog_section">
                            <div class="content_wrap">
                                <div class="sc_section">
                                    <div class="sc_section_inner">
                                        <div class="sc_section_content_wrap">
                                            <div class="custom_title_1 text_align_center">FROM THE NEWS</div>
                                            <div
                                                class="sc_blogger layout_classic_alter_3 template_masonry sc_blogger_horizontal no_description title_center">
                                                <h2 class="sc_blogger_title sc_item_title sc_item_title_without_descr">
                                                    Breaking News</h2>
                                                <div class="isotope_wrap" data-columns="3">
                                                    <!-- Post item -->
                                                    <div
                                                        class="isotope_item isotope_item_classic isotope_item_classic_alter_3 isotope_column_3">
                                                        <div
                                                            class="post_item post_item_classic post_item_classic_alter_3 odd">
                                                            <div class="post_featured">
                                                                <div class="post_thumb" data-image=""
                                                                    data-title="Serving Cookies at Alpine Nationals">
                                                                    <a class="hover_icon hover_icon_link"
                                                                        href="post-single.html">
                                                                        <img alt="Serving Cookies at Alpine Nationals"
                                                                            src="{{ url('frontend/images/image-4-480x480.jpg') }}">
                                                                    </a>
                                                                </div>
                                                                <div class="post_content_overlay">
                                                                    <div class="post_content isotope_item_content">
                                                                        <div class="post_info">
                                                                            <span
                                                                                class="post_info_item post_info_posted">
                                                                                <a href="#"
                                                                                    class="post_info_date">August
                                                                                    8, 2016</a>
                                                                            </span>
                                                                            <span
                                                                                class="post_info_item post_info_counters">
                                                                                <a class="post_counters_item post_counters_comments icon-comment-1"
                                                                                    title="Comments - 0"
                                                                                    href="#">
                                                                                    <span
                                                                                        class="post_counters_number">0</span>
                                                                                </a>
                                                                                <a class="post_counters_item post_counters_likes icon-heart-1"
                                                                                    title="Like" href="#">
                                                                                    <span
                                                                                        class="post_counters_number">1</span>
                                                                                </a>
                                                                            </span>
                                                                        </div>
                                                                        <h5 class="post_title">
                                                                            <a href="post-single.html">Serving
                                                                                Cookies at Alpine Nationals</a>
                                                                        </h5>
                                                                        <div class="post_descr">
                                                                            <a href="post-single.html"
                                                                                class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">
                                                                                <span class="">Read
                                                                                    More</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- /Post item --><!-- Post item -->
                                                    <div
                                                        class="isotope_item isotope_item_classic isotope_item_classic_alter_3 isotope_column_3">
                                                        <div
                                                            class="post_item post_item_classic post_item_classic_alter_3 even">
                                                            <div class="post_featured">
                                                                <div class="post_thumb" data-image=""
                                                                    data-title="Easter Success on Top of MT Spokane">
                                                                    <a class="hover_icon hover_icon_link"
                                                                        href="post-single.html">
                                                                        <img alt="Easter Success on Top of MT Spokane"
                                                                            src="{{ url('frontend/images/image_2-480x480.jpg') }}">
                                                                    </a>
                                                                </div>
                                                                <div class="post_content_overlay">
                                                                    <div class="post_content isotope_item_content">
                                                                        <div class="post_info">
                                                                            <span
                                                                                class="post_info_item post_info_posted">
                                                                                <a href="post-single.html"
                                                                                    class="post_info_date">August
                                                                                    8, 2016</a>
                                                                            </span>
                                                                            <span
                                                                                class="post_info_item post_info_counters">
                                                                                <a class="post_counters_item post_counters_comments icon-comment-1"
                                                                                    title="Comments - 0"
                                                                                    href="#">
                                                                                    <span
                                                                                        class="post_counters_number">0</span>
                                                                                </a>
                                                                                <a class="post_counters_item post_counters_likes icon-heart-1"
                                                                                    title="Like" href="#">
                                                                                    <span
                                                                                        class="post_counters_number">0</span>
                                                                                </a>
                                                                            </span>
                                                                        </div>
                                                                        <h5 class="post_title">
                                                                            <a href="post-single.html">Easter
                                                                                Success on Top of MT Spokane</a>
                                                                        </h5>
                                                                        <div class="post_descr">
                                                                            <a href="post-single.html"
                                                                                class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">
                                                                                <span class="">Read
                                                                                    More</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- /Post item --><!-- Post item -->
                                                    <div
                                                        class="isotope_item isotope_item_classic isotope_item_classic_alter_3 isotope_column_3">
                                                        <div
                                                            class="post_item post_item_classic post_item_classic_alter_3 odd last">
                                                            <div class="post_featured">
                                                                <div class="post_thumb" data-image=""
                                                                    data-title="Avalanche Safety Gear: How to Choose">
                                                                    <a class="hover_icon hover_icon_link"
                                                                        href="post-single.html">
                                                                        <img alt="Avalanche Safety Gear: How to Choose"
                                                                            src="{{ url('frontend/images/image-7-480x480.jpg') }}">
                                                                    </a>
                                                                </div>
                                                                <div class="post_content_overlay">
                                                                    <div class="post_content isotope_item_content">
                                                                        <div class="post_info">
                                                                            <span
                                                                                class="post_info_item post_info_posted">
                                                                                <a href="#"
                                                                                    class="post_info_date">August
                                                                                    8, 2016</a>
                                                                            </span>
                                                                            <span
                                                                                class="post_info_item post_info_counters">
                                                                                <a class="post_counters_item post_counters_comments icon-comment-1"
                                                                                    title="Comments - 0"
                                                                                    href="#">
                                                                                    <span
                                                                                        class="post_counters_number">0</span>
                                                                                </a>
                                                                                <a class="post_counters_item post_counters_likes icon-heart-1"
                                                                                    title="Like" href="#">
                                                                                    <span
                                                                                        class="post_counters_number">0</span>
                                                                                </a>
                                                                            </span>
                                                                        </div>
                                                                        <h5 class="post_title">
                                                                            <a href="post-single.html">Avalanche
                                                                                Safety Gear: How to Choose</a>
                                                                        </h5>
                                                                        <div class="post_descr">
                                                                            <a href="post-single.html"
                                                                                class="sc_button sc_button_square sc_button_style_filled sc_button_size_small">
                                                                                <span class="">Read
                                                                                    More</span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /Post item -->
                                                </div>
                                            </div>
                                            <a href="{{ url('/news') }}"
                                                class="sc_button sc_button_square sc_button_style_simple_alter sc_button_size_large aligncenter margin_top_small margin_bottom_tiny sc_button_iconed none">View
                                                More News</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /From the Blog -->
                        @include('frontend.commonComponants.three_org_details')

                    </section>
                </article>
            </div>
            <!-- /Content -->
        </div>
        <!-- /Page content wrap -->
        <footer class="footer_wrap widget_area">
            <div class="footer_wrap_inner widget_area_inner">
                <div class="content_wrap">
                    <div class="columns_wrap row">
                        <!-- Widget: Weather -->
                        <aside class="column-1_3 widget widget_text">

                            <div class="textwidget">
                                <div class="wpc-weather-id">
                                    <img src="{{ url('frontend/images/logo.png') }}" class="footer_logo"
                                        alt="">
                                </div>


                            </div>
                        </aside><!-- /Widget: Weather --><!-- Widget: Quick Links -->
                        <aside class="column-1_3 widget widget_recent_reviews">
                            <h5 class="widget_title">Quick Links</h5>
                            <div class="recent_reviews">
                                <article class="post_item no_thumb first">

                                    <ul id="menu_footer" class="menu_footer_nav">
                                        <li class="menu-item">
                                            <span class="sc_list_icon icon-right-small"> <a
                                                    href="{{ url('/') }}"><span class="ms-1">Home</span></a>
                                        </li>

                                        <li class="menu-item">
                                            <span class="sc_list_icon icon-right-small"> <a
                                                    href="{{ url('/about') }}"><span
                                                        class="ms-1">About</span></a>
                                        </li>
                                        <li class="menu-item">
                                            <span class="sc_list_icon icon-right-small"> <a
                                                    href="{{ url('/teams') }}"><span
                                                        class="ms-1">Teams</span></a>
                                        </li>
                                        <!-- /Menu: Rent -->
                                        <li class="menu-item">
                                            <span class="sc_list_icon icon-right-small"> <a
                                                    href="{{ url('/services') }}"><span
                                                        class="ms-1">Services</span></a>
                                        </li>
                                        <!-- Menu: Store -->
                                        <li class="menu-item">
                                            <span class="sc_list_icon icon-right-small"> <a
                                                    href="{{ url('/announcement') }}"><span
                                                        class="ms-1">Programs</span></a>
                                        </li>
                                        <!-- /Menu: Store -->
                                        <!-- Menu: News -->
                                        <li class="menu-item ">
                                            <span class="sc_list_icon icon-right-small"> <a
                                                    href="{{ url('/registration') }}"><span
                                                        class="ms-1">Competition</span></a>

                                        </li>
                                        <!-- /Menu: News -->
                            
                                        <li class="menu-item">
                                            <span class="sc_list_icon icon-right-small"> <a
                                                    href="{{ url('/contact') }}"><span class="ms-1">Contact
                                                        Us</span></a>
                                        </li>
                                    </ul>
                                </article>

                            </div>
                        </aside><!-- /Widget: Quick Links --><!-- Widget: Contacts -->
                        <aside class="column-1_3 widget widget_contacts">
                            <h5 class="widget_title">Contact Us</h5>
                            <div class="widget_inner">
                                <ul class="contact_info">

                                    <li class="d-flex">
                                        <i class="icon icon-location"></i>
                                        <div>Olympic Bhawan, B-29, <br />Qutub Institutional Area, <br />New Delhi
                                            110016, INDIA.
                                        </div>
                                    </li>
                                    {{-- <li class="d-flex">

                                            <i class="icon icon-mobile"></i>
                                            <div>1 800 215 16 35</div>
                                        </li> --}}
                                    <li class="d-flex">
                                        <i class="icon icon-pencil"></i>
                                        <div>skiandsnowboardindia@outlook.com</div>
                                    </li>

                                </ul>
                                <div class="widget_area sc_widget_socials">
                                    <aside id="widget_socials" class="widget widget_socials">
                                        <div class="widget_inner">
                                            <div
                                                class="sc_socials sc_socials_type_icons sc_socials_shape_round sc_socials_size_tiny">
                                                <div class="sc_socials_item">
                                                    <a href="#" target="_blank"
                                                        class="social_icons social_facebook">
                                                        <span class="icon-facebook"></span>
                                                    </a>
                                                </div>
                                                <div class="sc_socials_item">
                                                    <a href="#" target="_blank"
                                                        class="social_icons social_twitter">
                                                        <span class="icon-twitter"></span>
                                                    </a>
                                                </div>
                                                <div class="sc_socials_item">
                                                    <a href="#" target="_blank"
                                                        class="social_icons social_instagram-3">
                                                        <span class="icon-instagram-3"></span>
                                                    </a>
                                                </div>
                                                <div class="sc_socials_item">
                                                    <a href="#" target="_blank"
                                                        class="social_icons social_foursquare">
                                                        <span class="icon-foursquare"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </aside>
                                </div>
                            </div>

                        </aside>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer -->
        <!-- Copyright -->
        <div class="copyright_wrap copyright_style_menu">
            <div class="copyright_wrap_inner">
                <div class="content_wrap">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright_text">
                                <p>
                                    <a href="#">Ski Snowboard India</a> © 2024 All
                                    Rights Reserved.
                                    <a href="#">Terms of Use</a> and
                                    <a href="#">Privacy Policy</a>
                                </p>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <!-- /Copyright -->
    </div>
    <!-- /Page wrap -->

    </div>
    <!-- /Body wrap -->

    @include('frontend.commonComponants.enquiryBtn')

    <script type="text/javascript" src="{{ url('frontend/js/jquery/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/_packed.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/_main.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/trx_utils.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/essential-grid/js/lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/vendor/essential-grid/js/jquery.themepunch.tools.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('frontend/js/vendor/essential-grid/js/jquery.themepunch.essential.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/eg-index-page.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/revslider/jquery.themepunch.revolution.min.js') }}">
    </script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/revslider/revolution.extension.slideanims.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ url('frontend/js/vendor/revslider/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/vendor/revslider/revolution.extension.navigation.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('frontend/js/vendor/revslider/revolution.extension.parallax.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('frontend/js/revslider-index-page.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/woocommerce/js/woocommerce.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/superfish.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/core.utils.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/core.init.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/tpl.init.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/shortcodes.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/photostack/modernizr.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/vendor/magnific/jquery.magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/core.messages/core.messages.js') }}"></script>

    <script type="text/javascript" src="{{ url('frontend/js/vendor/skrollr/dist/skrollr.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('frontend/js/vendor/isotope/dist/isotope.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAA8O_i6YWSOXQn1vd9SSiIriIqewvBFWk">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ url('frontend/js/collapse.js') }}"></script>
</body>

</html>
